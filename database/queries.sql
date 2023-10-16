/*************************************\
*           SELECT QUERIES            *
\*************************************/

/*   USER QUERIES    */

--Select id, username and password FROM a certain user
SELECT user_id, username, "password" FROM "user"
WHERE username = $username;

--Select user's answers
SELECT * FROM "user"
JOIN "answer"
ON "user".user_id = answer.author
WHERE username = $username;

--Select user's questions
SELECT * FROM "user"
JOIN "question"
ON "user".user_id = question.author
WHERE username = $username;

--Select user comments
SELECT * FROM "user"
JOIN "comment"
ON "user".user_id = comment.author
WHERE username = $username;

--Get user profile page
SELECT U.username, U.name, U.description, U.city,
    CASE WHEN EXISTS (SELECT * FROM favourite F WHERE F.space_id = 1 AND F.user_id = U.user_id) THEN TRUE ELSE FALSE END AS is_science_favourite,
    CASE WHEN EXISTS (SELECT * FROM favourite F WHERE F.space_id = 2 AND F.user_id = U.user_id) THEN TRUE ELSE FALSE END AS is_tech_favourite,
    CASE WHEN EXISTS (SELECT * FROM favourite F WHERE F.space_id = 3 AND F.user_id = U.user_id) THEN TRUE ELSE FALSE END AS is_engineering_favourite,
    CASE WHEN EXISTS (SELECT * FROM favourite F WHERE F.space_id = 4 AND F.user_id = U.user_id) THEN TRUE ELSE FALSE END AS is_maths_favourite,
    (
        SELECT image_content
        FROM "image_user"
        WHERE user_id = $user_id AND profile_image = TRUE
    ) AS profile_image,
    (
        SELECT image_content
        FROM "image_user"
        WHERE user_id = $user_id AND profile_image = FALSE
    ) AS header_image
FROM "user" AS U
WHERE U.user_id = $user_id;


/*   POSTS QUERIES   */

--Select questions' NUMBER of answers
DROP VIEW IF EXISTS question_num_of_answers CASCADE;
CREATE VIEW question_num_of_answers AS
SELECT question.question_id, COUNT(answer.answer_id) AS NumOfAnswers FROM question
FULL OUTER JOIN answer
ON question.question_id = answer.question_id
GROUP BY question.question_id
ORDER BY question_id;

--Select answers' NUMBER of comments
DROP VIEW IF EXISTS answer_num_of_comments CASCADE;
CREATE VIEW answer_num_of_comments AS
SELECT answer.question_id, answer.answer_id, COUNT("comment".comment_id) AS NumOfComments FROM answer
FULL OUTER JOIN "comment"
ON answer.answer_id = "comment".answer_id
GROUP BY answer.answer_id
ORDER BY answer.answer_id;

--Select questions' NUMBER of comments
DROP VIEW IF EXISTS question_num_of_comments CASCADE;
CREATE VIEW question_num_of_comments AS
SELECT question.question_id, SUM(COALESCE(answer_num_of_comments.numofcomments, 0)) AS NumOfComments FROM answer_num_of_comments
FULL OUTER JOIN question ON answer_num_of_comments.question_id = question.question_id
GROUP BY question.question_id
ORDER BY question.question_id;

--Downvotes for a certain question
DROP VIEW IF EXISTS question_downvotes CASCADE;
CREATE VIEW question_downvotes AS
SELECT question.question_id, COUNT(CASE WHEN question_vote.vote = FALSE THEN 1 ELSE null END) AS Downvotes FROM question_vote
FULL OUTER JOIN question ON question_vote.question_id = question.question_id
GROUP BY question.question_id;

--Upvotes for a certain question
DROP VIEW IF EXISTS question_upvotes CASCADE;
CREATE VIEW question_upvotes AS
SELECT question.question_id, COUNT(CASE WHEN question_vote.vote = TRUE THEN 1 ELSE null END) AS Upvotes FROM question_vote
FULL OUTER JOIN question ON question_vote.question_id = question.question_id
GROUP BY question.question_id;

--Votes for a certain question
DROP VIEW IF EXISTS question_votes CASCADE;
CREATE VIEW question_votes AS
SELECT question_upvotes.question_id AS question_id, COALESCE(upvotes - downvotes, 0) AS Votes FROM question_upvotes
FULL OUTER JOIN question_downvotes ON question_upvotes.question_id = question_downvotes.question_id;

--Downvotes for a certain answer
DROP VIEW IF EXISTS answer_downvotes CASCADE;
CREATE VIEW answer_downvotes AS
SELECT answer.answer_id, COUNT(CASE WHEN answer_vote.vote = FALSE THEN 1 ELSE null END) AS Downvotes FROM answer_vote
FULL OUTER JOIN answer ON answer_vote.answer_id = answer.answer_id
GROUP BY answer.answer_id;

--Upvotes for a certain answer
DROP VIEW IF EXISTS answer_upvotes CASCADE;
CREATE VIEW answer_upvotes AS
SELECT answer.answer_id, COUNT(CASE WHEN answer_vote.vote = TRUE THEN 1 ELSE null END) AS Upvotes FROM answer_vote
FULL OUTER JOIN answer ON answer_vote.answer_id = answer.answer_id
GROUP BY answer.answer_id;

--Votes for a certain answer
SELECT answer_upvotes.answer_id AS answer_id, upvotes - downvotes AS Votes FROM answer_upvotes
natural JOIN answer_downvotes;

--Select questions, sorted BY recent
SELECT question_id, question_title FROM question
ORDER BY question.question_date DESC;

--Select questions, sorted BY upvotes
SELECT question.question_id, question_title, question_votes.votes FROM question
NATURAL JOIN question_votes
ORDER BY question_votes.votes DESC;

--Select question, sorted BY popular (most answers, comments AND votes)
SELECT question.question_id, question_upvotes.upvotes + question_downvotes.downvotes + question_num_of_answers.numofanswers + question_num_of_comments.NumOfComments AS Interactions FROM question
NATURAL JOIN question_upvotes
NATURAL JOIN question_downvotes
NATURAL JOIN question_num_of_answers
NATURAL JOIN question_num_of_comments
ORDER BY interactions DESC;

--Select question, sorted BY popular (most answers, comments AND votes) for a certain space
SELECT question.question_id, question_upvotes.upvotes + question_downvotes.downvotes + question_num_of_answers.numofanswers + question_num_of_comments.NumOfComments AS Interactions FROM question
NATURAL JOIN question_upvotes
NATURAL JOIN question_downvotes
NATURAL JOIN question_num_of_answers
NATURAL JOIN question_num_of_comments
WHERE question.belongs = $space_id
ORDER BY interactions DESC

--Select question BY space
SELECT question.question_id, space.space_id FROM question
INNER JOIN space
ON question.belongs = space.space_id
WHERE space.space_id = $space_id;


/*   REPORT QUERIES   */

--Get reports BY num of reports
SELECT reported_$type, MAX(report_date) AS last_report_date, COUNT(*) AS num_reports
FROM "report_$type" 
GROUP BY reported_$type
ORDER BY COUNT(*) DESC;

--Get reports BY DATE
SELECT reported_$type, MAX(report_date) AS last_report_date, COUNT(*) AS num_reports
FROM "report_$type"
GROUP BY reported_$type
ORDER BY MAX(report_date) DESC;


/*   SEARCH QUERY   */

-- Search
--      Returns ids
DROP VIEW search_return;
CREATE VIEW search_return AS
SELECT question_id AS info_id, 'question' AS info_type
FROM "question"
WHERE to_tsvector('english', question_title || ' ' || question_body) @@ plainto_tsquery('english', $search_input)
UNION
SELECT space_id AS info_id, 'space' AS info_type
FROM "space"
WHERE to_tsvector('english', space_name) @@ plainto_tsquery('english', $search_input)
UNION
SELECT user_id AS info_id, 'user' AS info_type
FROM "user"
WHERE to_tsvector('english', username || ' ' || "user".name || ' ' || city || ' ' || description) @@ plainto_tsquery('english', $search_input);

--      Returns questions
SELECT * 
FROM (
        SELECT info_id
        FROM search_return
        WHERE info_type = 'question'
    ) AS question_search JOIN "question" ON question_search.info_id = question_id;

--      Returns spaces
SELECT * 
FROM (
        SELECT info_id
        FROM search_return
        WHERE info_type = 'space'
    ) AS space_search JOIN "space" ON space_search.info_id = space_id;

--      Returns users
SELECT * 
FROM (
        SELECT info_id
        FROM search_return
        WHERE info_type = 'user'
    ) AS user_search JOIN "user" ON user_search.info_id = user_id;


/*************************************\
*           UPDATE QUERIES            *
\*************************************/

--Update user information
UPDATE "user" SET username = $username, name = $name, description = $description, city = $city
WHERE user_id = $user_id;

--Update user profile image
UPDATE image_user SET image_content = $image_content
WHERE profile_image = TRUE AND user_id = $user_id AND image_id = $image_id;

--Update user profile header
UPDATE image_user SET image_content = $image_content
WHERE profile_image = FALSE AND user_id = $user_id AND image_id = $image_id;

--Update user password AND email
UPDATE "user" SET password = $hash_password, email = $email
WHERE user_id = $user_id;

--Update question
UPDATE question SET question_body = $question_body
WHERE question_id = $question_id;

--Update answer
UPDATE answer SET answer_body = $answer_body
WHERE answer_id = $answer_id;

--Update comment
UPDATE comment SET comment_body = $comment_body
WHERE comment_id = $comment_id;

--Update question vote
UPDATE question_vote SET vote = $vote
WHERE question_id = $question_id AND user_id = $user_id;

--Update answer vote
UPDATE answer_vote SET vote = $vote
WHERE answer_id = $answer_id AND user_id = $user_id;


/*************************************\
*           INSERTS QUERIES           *
\*************************************/

--Insert user
INSERT INTO "user" (email, username, password, name, description, city, banned) VALUES ($email, $username, $password, $name, $description, $city, $banned);

--Insert admin
INSERT INTO "admin" (admin_id) VALUES ($admin_id);

--Insert user image
INSERT INTO image_user (user_id, profile_image, image_content) VALUES ($user_id, $profile_image, $image_content);

--Insert question (TRANSACTION)
--Insert answer (TRANSACTION)

--Insert comment
INSERT INTO "comment" (comment_body, comment_date, author, answer_id) VALUES ($comment_body, $comment_date, $author, $answer_id);

--Insert favourite space
INSERT INTO favourite (space_id, user_id) VALUES ($space_id, $user_id);

--Insert reports
INSERT INTO report_user (reported_user, author, report_date) VALUES ($reported_user, $author, $report_date);

INSERT INTO report_question (reported_question, author, report_date) VALUES ($reported_question, $author, $report_date);

INSERT INTO report_answer (reported_answer, author, report_date) VALUES ($reported_answer, $author, $report_date);

INSERT INTO report_comment (reported_comment, author, report_date) VALUES ($reported_comment, $author, $report_date);


/*************************************\
*           DELETE QUERIES            *
\*************************************/

--Delete user
DELETE FROM "user"
WHERE user_id = $user_id;

--Delete favourite space
DELETE FROM favourite
WHERE space_id = $space_id AND user_id = $user_id;

--Delete question
DELETE FROM question
WHERE question_id = $question_id;

--Delete answer
DELETE FROM answer
WHERE answer_id = $answer_id;

--Delete comment
DELETE FROM comment
WHERE comment_id = $comment_id;

--Delete question vote
DELETE FROM question_vote
WHERE question_id = $question_id AND user_id = $user_id;

--Delete answer vote
DELETE FROM answer_vote
WHERE answer_id = $answer_id AND user_id = $user_id;

--Delete reports
DELETE FROM report_user
WHERE report_id = $report_id;

DELETE FROM report_question
WHERE report_id = $report_id;

DELETE FROM report_answer
WHERE report_id = $report_id;

DELETE FROM report_comment
WHERE report_id = $report_id;


/*******************************\
*           TRIGGERS            *
\*******************************/

--User can't vote his own question
DROP FUNCTION IF EXISTS question_owner_vote CASCADE;
CREATE FUNCTION question_owner_vote() returns TRIGGER AS
$BODY$
DECLARE owner INTEGER;
BEGIN
    SELECT INTO owner author
    FROM question
    WHERE question.question_id = NEW.question_id;
    IF owner = NEW.user_id THEN
        raise EXCEPTION 'Author cant rate his own question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS question_owner_vote ON question_vote CASCADE;
CREATE TRIGGER question_owner_vote
    BEFORE INSERT ON question_vote
    FOR EACH ROW 
    EXECUTE PROCEDURE question_owner_vote();

--User can't vote his own answer
DROP FUNCTION IF EXISTS answer_owner_vote CASCADE;
CREATE FUNCTION answer_owner_vote() returns TRIGGER AS
$BODY$
DECLARE owner INTEGER;
BEGIN
    SELECT INTO owner author
    FROM answer
    WHERE answer.answer_id = NEW.answer_id;
    IF owner = NEW.user_id THEN
        raise EXCEPTION 'Author cant rate his own answer';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS answer_owner_vote ON answer_vote CASCADE;
CREATE TRIGGER answer_owner_vote
    BEFORE INSERT ON answer_vote
    FOR EACH ROW 
    EXECUTE PROCEDURE answer_owner_vote();

--Check IF answer DATE > question DATE
DROP FUNCTION IF EXISTS check_answer_date CASCADE;
CREATE FUNCTION check_answer_date() RETURNS TRIGGER AS
$BODY$
DECLARE parent_date TIMESTAMP;
BEGIN
    SELECT INTO parent_date question.question_date 
    FROM question
    WHERE question.question_id = NEW.question_id;
    IF parent_date >= NEW.answer_date THEN
        raise EXCEPTION 'Answer has an older DATE than his question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS check_answer_date ON answer CASCADE;
CREATE TRIGGER check_answer_date
    BEFORE INSERT ON answer
    FOR EACH ROW
    EXECUTE PROCEDURE check_answer_date();


--Check IF comment DATE > answer DATE
DROP FUNCTION IF EXISTS check_comment_date CASCADE;
CREATE FUNCTION check_comment_date() RETURNS TRIGGER AS
$BODY$
DECLARE parent_date TIMESTAMP;
BEGIN
    SELECT INTO parent_date answer.answer_date 
    FROM answer
    WHERE answer.answer_id = NEW.answer_id;
    IF parent_date >= NEW.comment_date THEN
        raise EXCEPTION 'Comment has an older DATE than his answer';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS check_comment_date ON comment CASCADE;
CREATE TRIGGER check_comment_date
    BEFORE INSERT ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE check_comment_date();


/***********************************\
*           TRANSACTIONS            *
\***********************************/

--Insert question AND image at the same TIME
BEGIN;
SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
 
INSERT INTO question (question_title, question_body, question_date, question_image, belongs, author, archived) VALUES ($question_title, $question_body, $question_date, $question_image, $belongs, $author, $archived);
INSERT INTO image_question (image_content) VALUES ($image_content);
 
COMMIT;


--Insert answer AND image at the same TIME
BEGIN;
SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
 
INSERT INTO answer (answer_body, answer_date, misinformation, author, answer_image, question_id, highlight) VALUES ($answer_body, $answer_date, $misinformation, $author, $answer_image, $question_id, $highlight);
INSERT INTO image_answer (image_content) VALUES ($image_content);
 
COMMIT;


/***********************************\
*              INDEXES              *
\***********************************/

-- Select user's answers
DROP INDEX IF EXISTS answer_author;
CREATE INDEX answer_author ON answer USING hash (author);

-- Full Text Search
DROP INDEX IF EXISTS question_search_title;
CREATE INDEX question_search_title ON "question" USING GIST (to_tsvector('english', question_title));
DROP INDEX IF EXISTS question_search_body;
CREATE INDEX question_search_body ON "question" USING GIST (to_tsvector('english', question_body));

DROP INDEX IF EXISTS space_search_name;
CREATE INDEX space_search_name on "space" USING GIN (to_tsvector('english', space_name));

DROP INDEX IF EXISTS user_search_username;
 CREATE INDEX user_search_username on "user" USING GIST (to_tsvector('english', username));
DROP INDEX IF EXISTS user_search_username;
 CREATE INDEX user_search_username on "user" USING GIST (to_tsvector('english', name));
DROP INDEX IF EXISTS user_search_username;
 CREATE INDEX user_search_username on "user" USING GIST (to_tsvector('english', city));
DROP INDEX IF EXISTS user_search_username;
 CREATE INDEX user_search_username on "user" USING GIST (to_tsvector('english', description));


-- Report dates
DROP INDEX IF EXISTS report_user_date_search;
CREATE INDEX report_user_date_search ON "report_user" (report_date);
DROP INDEX IF EXISTS report_question_date_search;
CREATE INDEX report_question_date_search ON "report_question" (report_date);
DROP INDEX IF EXISTS report_answer_date_search;
CREATE INDEX report_answer_date_search ON "report_answer" (report_date);
DROP INDEX IF EXISTS report_comment_date_search;
CREATE INDEX report_comment_date_search ON "report_comment" (report_date);

-- Select question by space
DROP INDEX IF EXISTS question_belongs;
CREATE INDEX question_belongs ON question (belongs);