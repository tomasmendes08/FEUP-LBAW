-- Tables
DROP TABLE IF EXISTS "image_space" CASCADE;
DROP TABLE IF EXISTS "image_answer" CASCADE;
DROP TABLE IF EXISTS "image_question" CASCADE;
DROP TABLE IF EXISTS "image_user" CASCADE;
DROP TABLE IF EXISTS "report_comment" CASCADE;
DROP TABLE IF EXISTS "report_answer" CASCADE;
DROP TABLE IF EXISTS "report_question" CASCADE;
DROP TABLE IF EXISTS "report_user" CASCADE;
DROP TABLE IF EXISTS "contact_us" CASCADE;
DROP TABLE IF EXISTS "favourite" CASCADE;
DROP TABLE IF EXISTS "comment" CASCADE;
DROP TABLE IF EXISTS "answer_vote" CASCADE;
DROP TABLE IF EXISTS "answer" CASCADE;
DROP TABLE IF EXISTS "question_vote" CASCADE;
DROP TABLE IF EXISTS "question" CASCADE;
DROP TABLE IF EXISTS "space" CASCADE;
DROP TABLE IF EXISTS "admin" CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;

--Table: image_question
CREATE TABLE "image_question"(
	image_id SERIAL PRIMARY KEY,
	image_content BYTEA NOT NULL
);

--Table: image_answer
CREATE TABLE "image_answer"(
	image_id SERIAL PRIMARY KEY,
	image_content BYTEA NOT NULL
);

--Table: image_space
CREATE TABLE "image_space"(
	image_id SERIAL PRIMARY KEY,
	image_content BYTEA NOT NULL
);

--Table: user 
CREATE TABLE "user"(
	user_id SERIAL PRIMARY KEY,
	email TEXT NOT NULL UNIQUE,
	username TEXT NOT NULL UNIQUE,
	name TEXT,
	password TEXT NOT NULL,
	description TEXT,
	city TEXT,
	banned BOOLEAN DEFAULT FALSE
);

--Table: image_user
CREATE TABLE "image_user"(
	image_id SERIAL PRIMARY KEY,
	user_id INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	profile_image BOOLEAN NOT NULL,
	image_content BYTEA NOT NULL,
	UNIQUE(user_id, profile_image)
);

--Table: admin
CREATE TABLE "admin"(
	admin_id INTEGER NOT NULL REFERENCES "user"(user_id),
	PRIMARY KEY (admin_id)
);

--Table: space
CREATE TABLE "space"(
	space_id SERIAL PRIMARY KEY,
	space_name TEXT NOT NULL,
	space_image INTEGER NOT NULL REFERENCES "image_space"(image_id) UNIQUE
);

--Table: question
CREATE TABLE "question"(
	question_id SERIAL PRIMARY KEY,
	question_title TEXT NOT NULL,
	question_body TEXT,
	question_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL,
	question_image INTEGER REFERENCES "image_question"(image_id) UNIQUE,
	belongs INTEGER NOT NULL REFERENCES "space"(space_id),
	author INTEGER REFERENCES "user"(user_id) ON DELETE SET NULL,
	archived BOOLEAN NOT NULL DEFAULT FALSE
);

--Table: questionVote
CREATE TABLE "question_vote"(
	question_id INTEGER REFERENCES "question"(question_id),
	user_id INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	vote BOOLEAN NOT NULL,
	PRIMARY KEY (question_id, user_id)
);

--Table: answer
CREATE TABLE "answer"(
	answer_id SERIAL PRIMARY KEY,
	answer_body TEXT NOT NULL,
	answer_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL,
	misinformation BOOLEAN NOT NULL DEFAULT FALSE,
	author INTEGER REFERENCES "user"(user_id) ON DELETE SET NULL,
	answer_image INTEGER REFERENCES "image_answer"(image_id) UNIQUE,
	question_id INTEGER NOT NULL REFERENCES "question"(question_id),
	highlight BOOLEAN NOT NULL DEFAULT FALSE
);

--Table: answerVote
CREATE TABLE "answer_vote"(
	answer_id INTEGER REFERENCES "answer"(answer_id),
	user_id INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	vote BOOLEAN NOT NULL,
	PRIMARY KEY (answer_id, user_id)
);

--Table: comment
CREATE TABLE "comment"(
	comment_id SERIAL PRIMARY KEY,
	comment_body TEXT NOT NULL,
	comment_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL,
	author INTEGER REFERENCES "user"(user_id) ON DELETE SET NULL,
	answer_id INTEGER NOT NULL REFERENCES "answer"(answer_id)
);

--Table: favourite
CREATE TABLE "favourite"(
	space_id INTEGER REFERENCES "space"(space_id),
	user_id INTEGER REFERENCES "user"(user_id) ON DELETE CASCADE,
	PRIMARY KEY (space_id, user_id)
);

--Table: contactUs
CREATE TABLE "contact_us"(
	contactus_id SERIAL PRIMARY KEY,
	message_title TEXT NOT NULL,
	message_body TEXT NOT NULL,
	email TEXT NOT NULL UNIQUE,
	contact_us_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL,
	author INTEGER REFERENCES "user"(user_id) ON DELETE SET NULL
);

--Table: reportUser
CREATE TABLE "report_user"(
	report_id SERIAL PRIMARY KEY,
	reported_user INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	author INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	report_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL
);

--Table: reportQuestion
CREATE TABLE "report_question"(
	report_id SERIAL PRIMARY KEY,
	reported_question INTEGER NOT NULL REFERENCES "question"(question_id),
	author INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	report_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL
);

--Table: reportAnswer
CREATE TABLE "report_answer"(
	report_id SERIAL PRIMARY KEY,
	reported_answer INTEGER NOT NULL REFERENCES "answer"(answer_id),
	author INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	report_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL
);

--Table: reportComment
CREATE TABLE "report_comment"(
	report_id SERIAL PRIMARY KEY,
	reported_comment INTEGER NOT NULL REFERENCES "comment"(comment_id),
	author INTEGER NOT NULL REFERENCES "user"(user_id) ON DELETE CASCADE,
	report_date TIMESTAMP WITH TIME ZONE DEFAULT NOW() NOT NULL
);


