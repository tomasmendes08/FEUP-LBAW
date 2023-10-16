
function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
    let request = new XMLHttpRequest();
    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('load', handler);
    request.send(encodeForAjax(data));
}

var read_more_recent_button = document.getElementById('read-more-recent');
var page_recent = null;
if(read_more_recent_button != null)
    read_more_recent_button.addEventListener('click', readMoreRecentSpaceRequest);

var read_popular_button = document.getElementById('read-more-popular');
var page_popular = null;
if(read_popular_button != null)
    read_popular_button.addEventListener('click', readPopularSpaceRequest);

var read_more_upvotes_button = document.getElementById('read-more-upvotes');
var page_upvotes = null;
if(read_more_upvotes_button != null)
    read_more_upvotes_button.addEventListener('click', readMoreUpvotesSpaceRequest);

// Reports

var read_more_reported_questions_button = document.getElementById('read-more-reported-questions');
var page_reported_questions = null;
if(read_more_reported_questions_button != null)
    read_more_reported_questions_button.addEventListener('click', readMoreReportedQuestionsRequest);

var read_more_reported_answers_button = document.getElementById('read-more-reported-answers');
var page_reported_answers = null;
if(read_more_reported_answers_button != null)
    read_more_reported_answers_button.addEventListener('click', readMoreReportedAnswersRequest);

var read_more_reported_comments_button = document.getElementById('read-more-reported-comments');
var page_reported_comments = null;
if(read_more_reported_comments_button != null)
    read_more_reported_comments_button.addEventListener('click', readMoreReportedCommentsRequest);

//Question Feed
var read_more_question_feed = document.getElementById('read-more-question-feed');
var page_question_feed = null;
if(read_more_question_feed != null)
    read_more_question_feed.addEventListener('click', readMoreQuestionFeedRequest);

function readMoreRecentSpaceRequest (event) {
    event.preventDefault();
    let space_name = read_more_recent_button.getAttribute('data-id');
    //console.log(space_name);
    document.querySelector('.read-more-recent-div').style.display = 'none';
    //console.log(read_more_recent_button);
    document.querySelector('.loading-recent-div').style.display = 'flex';
    
    page_recent = document.querySelector('.recent-question-page').getAttribute('data-id');
    page_recent++;
    sendAjaxRequest('POST', '/api/' + space_name + '/read_more?page=' + page_recent, {space_name : space_name, type : "recent"}, readMoreRecentSpaceHandler);
}

function readPopularSpaceRequest (event) {
    event.preventDefault();
    let space_name = read_popular_button.getAttribute('data-id');
    //console.log(space_name);
    document.querySelector('.read-more-popular-div').style.display = 'none';
    //console.log(read_more_recent_button);
    document.querySelector('.loading-popular-div').style.display = 'flex';
    
    page_popular = document.querySelector('.popular-question-page').getAttribute('data-id');
    page_popular++;
    sendAjaxRequest('POST', '/api/' + space_name + '/read_more?page=' + page_popular, {space_name : space_name, type : "popular"}, readMorePopularSpaceHandler);
}

function readMoreUpvotesSpaceRequest(event){
    event.preventDefault();
    let space_name = read_more_upvotes_button.getAttribute('data-id');
    //console.log(space_name);
    document.querySelector('.read-more-upvotes-div').style.display = 'none';
    //console.log(read_more_upvotes_button);
    document.querySelector('.loading-upvotes-div').style.display = 'flex';
    
    page_upvotes = document.querySelector('.upvotes-question-page').getAttribute('data-id');
    page_upvotes++;
    sendAjaxRequest('POST', '/api/' + space_name + '/read_more?page=' + page_upvotes, {space_name : space_name, type : "upvotes"}, readMoreUpvotesSpaceHandler);
}

// Reports

function readMoreReportedQuestionsRequest (event) {
    event.preventDefault();
    
    document.querySelector('.read-more-reported-questions-div').style.display = 'none';
    //console.log(read_more_recent_button);
    document.querySelector('.loading-reported-questions-div').style.display = 'flex';
    
    console.log(document.querySelector('.reported-questions-page'))

    page_reported_questions = document.querySelector('.reported-questions-page').getAttribute('data-id');
    page_reported_questions++;
    sendAjaxRequest('POST', '/api/admin/read_more?page=' + page_reported_questions, {type : "reported_questions"}, readMoreReportedQuestionsHandler);
}

function readMoreReportedAnswersRequest (event) {
    event.preventDefault();
    
    document.querySelector('.read-more-reported-answers-div').style.display = 'none';
    //console.log(read_more_recent_button);
    document.querySelector('.loading-reported-answers-div').style.display = 'flex';
    
    console.log(document.querySelector('.reported-answers-page'))

    page_reported_answers = document.querySelector('.reported-answers-page').getAttribute('data-id');
    page_reported_answers++;
    sendAjaxRequest('POST', '/api/admin/read_more?page=' + page_reported_answers, {type : "reported_answers"}, readMoreReportedAnswersHandler);
}

function readMoreReportedCommentsRequest (event) {
    event.preventDefault();
    
    document.querySelector('.read-more-reported-comments-div').style.display = 'none';
    //console.log(read_more_recent_button);
    document.querySelector('.loading-reported-comments-div').style.display = 'flex';
    
    console.log(document.querySelector('.reported-comments-page'))

    page_reported_comments = document.querySelector('.reported-comments-page').getAttribute('data-id');
    page_reported_comments++;
    sendAjaxRequest('POST', '/api/admin/read_more?page=' + page_reported_comments, {type : "reported_comments"}, readMoreReportedCommentsHandler);
}

//Question Feed
function readMoreQuestionFeedRequest (event) {
    event.preventDefault();
    //console.log('ola');
    document.querySelector('.read-more-question-feed-div').style.display = 'none';
    //console.log(read_more_question_feed);
    document.querySelector('.loading-question-feed-div').style.display = 'flex';
    
    page_question_feed = document.querySelector('.question-feed-question-page').getAttribute('data-id');
    page_question_feed++;
    sendAjaxRequest('POST', 'api/question_feed/read_more?page=' + page_question_feed, {}, readMoreQuestionFeedHandler);
}

function readMoreRecentSpaceHandler(){
    let response_json = JSON.parse(this.responseText);
    let questions_class = document.querySelector('.questions-recent');
    
    document.querySelector('.read-more-recent-div').remove();
    document.querySelector('.loading-recent-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        questions_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_recent_button = '<div class="container justify-content-center read-more-recent-div my-5" style="display: flex;"><div class="recent-question-page" data-id=' + page_recent + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-recent" data-id=' + response_json['space']['space_name'] + '><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-recent-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-recent').insertAdjacentHTML('beforeend', new_read_more_recent_button);
    document.getElementById('read-more-recent').addEventListener('click', readMoreRecentSpaceRequest);    
}

function readMorePopularSpaceHandler(){
    let response_json = JSON.parse(this.responseText);
    let questions_class = document.querySelector('.questions-popular');
    
    document.querySelector('.read-more-popular-div').remove();
    document.querySelector('.loading-popular-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        questions_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_popular_button = '<div class="container justify-content-center read-more-popular-div my-5" style="display: flex;"><div class="popular-question-page" data-id=' + page_popular + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-popular" data-id=' + response_json['space']['space_name'] + '><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-popular-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-popular').insertAdjacentHTML('beforeend', new_read_more_popular_button);
    document.getElementById('read-more-popular').addEventListener('click', readPopularSpaceRequest);    
}

function readMoreUpvotesSpaceHandler(){
    let response_json = JSON.parse(this.responseText);
    let questions_class = document.querySelector('.questions-upvotes');
    
    document.querySelector('.read-more-upvotes-div').remove();
    document.querySelector('.loading-upvotes-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        questions_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_upvotes_button = '<div class="container justify-content-center read-more-upvotes-div my-5" style="display: flex;"><div class="upvotes-question-page" data-id=' + page_upvotes + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-upvotes" data-id=' + response_json['space']['space_name'] + '><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-upvotes-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-upvotes').insertAdjacentHTML('beforeend', new_read_more_upvotes_button);
    document.getElementById('read-more-upvotes').addEventListener('click', readMoreUpvotesSpaceRequest);
}

// Reports

function readMoreReportedQuestionsHandler(){
    let response_json = JSON.parse(this.responseText);
    let reported_questions_class = document.querySelector('.reported-questions');
    
    document.querySelector('.read-more-reported-questions-div').remove();
    document.querySelector('.loading-reported-questions-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        reported_questions_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_reported_questions_button = '<div class="container justify-content-center read-more-reported-questions-div my-5" style="display: flex;"><div class="reported-questions-page" data-id=' + page_reported_questions + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-reported-questions"><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-reported-questions-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-reported-questions').insertAdjacentHTML('beforeend', new_read_more_reported_questions_button);
    document.getElementById('read-more-reported-questions').addEventListener('click', readMoreReportedQuestionsRequest);    
}

function readMoreReportedAnswersHandler(){
    let response_json = JSON.parse(this.responseText);
    let reported_answers_class = document.querySelector('.reported-answers');
    
    document.querySelector('.read-more-reported-answers-div').remove();
    document.querySelector('.loading-reported-answers-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        reported_answers_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_reported_answers_button = '<div class="container justify-content-center read-more-reported-answers-div my-5" style="display: flex;"><div class="reported-answers-page" data-id=' + page_reported_answers + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-reported-answers"><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-reported-answers-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-reported-answers').insertAdjacentHTML('beforeend', new_read_more_reported_answers_button);
    document.getElementById('read-more-reported-answers').addEventListener('click', readMoreReportedAnswersRequest);    
}

function readMoreReportedCommentsHandler(){
    let response_json = JSON.parse(this.responseText);
    let reported_comments_class = document.querySelector('.reported-comments');
    
    document.querySelector('.read-more-reported-comments-div').remove();
    document.querySelector('.loading-reported-comments-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        reported_comments_class.insertAdjacentHTML('beforeend', response_json['views'][i]);
    }

    let new_read_more_reported_comments_button = '<div class="container justify-content-center read-more-reported-comments-div my-5" style="display: flex;"><div class="reported-comments-page" data-id=' + page_reported_comments + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-reported-comments"><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-reported-comments-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.feed-reported-comments').insertAdjacentHTML('beforeend', new_read_more_reported_comments_button);
    document.getElementById('read-more-reported-comments').addEventListener('click', readMoreReportedCommentsRequest);    
}

//Question Feed
function readMoreQuestionFeedHandler(){
    let response_json = JSON.parse(this.responseText);
    let questions_class = document.querySelector('.question-feed-questions');
    
    document.querySelector('.read-more-question-feed-div').remove();
    document.querySelector('.loading-question-feed-div').remove();

    for(let i = 0; i < response_json['views'].length; i++){
        let div = document.createElement("div");
        div.classList.add("my-5");
        div.insertAdjacentHTML('beforeend', response_json['views'][i]);
        questions_class.appendChild(div);
    }

    let new_read_more_question_feed_button = '<div class="container justify-content-center read-more-question-feed-div my-5" style="display: flex;"><div class="question-feed-question-page" data-id=' + page_question_feed + '></div><button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-question-feed"><span class="material-icons me-1">add_box</span>Read More</button></div><div class="justify-content-center loading-question-feed-div my-5" style="display: none;"><div class="spinner-border" role="status"></div></div>';
    document.querySelector('.question-feed-homepage').insertAdjacentHTML('beforeend', new_read_more_question_feed_button);
    document.getElementById('read-more-question-feed').addEventListener('click', readMoreQuestionFeedRequest);    
}