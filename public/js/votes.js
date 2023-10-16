function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function sendAjaxRequest(method, url, data, successHandler, failHandler) {
    let request = new XMLHttpRequest();

    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            //console.log(request.status)
            if (request.status === 200) {
                successHandler.call(request.response, request.response);
            }
            else {
                failHandler.call(request.response, request.response);
            }
        }
    }

    request.send(encodeForAjax(data));
}

let questions = document.querySelector('.questions');
var question_votes_class = null;
if(questions != null){
    questions.addEventListener('click', function(event){
        question_votes_class = event.target.closest('.votes');
        if (question_votes_class != null) {
            const question_id = question_votes_class.getAttribute('data-id');

            if(event.target.classList.contains('upvote_question_icon')){
                sendAjaxRequest('POST', '/api/question/' + question_id + '/vote', {question_id : question_id, vote : true}, upvoteQuestionRequestHandler, errorMessage);
            }
            else if(event.target.classList.contains('downvote_question_icon')){
                sendAjaxRequest('POST', '/api/question/' + question_id + '/vote', {question_id : question_id, vote : false}, downvoteQuestionRequestHandler, errorMessage);
            }
        }
    });
}


function upvoteQuestionRequestHandler(){
    let response_json = JSON.parse(this.responseText);

    let upvote_icon = question_votes_class.querySelector('.upvote_question_icon');
    let downvote_icon = question_votes_class.querySelector('.downvote_question_icon');

    if(upvote_icon.style.color == 'rgb(253, 93, 34)') upvote_icon.style.color = '#212529'; //remove upvote
    else{
        downvote_icon.style.color = '#212529';
        upvote_icon.style.color = '#fd5d22';
    }

    question_votes_class.querySelector('.number-of-votes').innerText = response_json['nmr_votes'];

}


function downvoteQuestionRequestHandler(){
    let response_json = JSON.parse(this.responseText);
    //console.log(response_json);

    let upvote_icon = question_votes_class.querySelector('.upvote_question_icon');
    let downvote_icon = question_votes_class.querySelector('.downvote_question_icon');

    if(downvote_icon.style.color == 'rgb(253, 93, 34)') downvote_icon.style.color = '#212529'; //remove downvote
    else{
        upvote_icon.style.color = '#212529';
        downvote_icon.style.color = '#fd5d22';
    }

    question_votes_class.querySelector('.number-of-votes').innerText = response_json['nmr_votes'];
}


let answers = document.querySelector('#answer-cards');
var answer_votes_class = null;
if(answers != null) {
    answers.addEventListener('click', function(event){
        answer_votes_class = event.target.closest('.answer-votes');
        if (answer_votes_class != null) {
            const answer_id = answer_votes_class.getAttribute('data-id');

            if(event.target.classList.contains('upvote_answer_icon')) {
                sendAjaxRequest('POST', '/api/answer/' + answer_id + '/vote', {answer_id : answer_id, vote : true}, upvoteAnswerRequestHandler, errorMessage);
            }
            else if(event.target.classList.contains('downvote_answer_icon')) {
                sendAjaxRequest('POST', '/api/answer/' + answer_id + '/vote', {answer_id : answer_id, vote : false}, downvoteAnswerRequestHandler, errorMessage);
            }
        }
    });
}


function upvoteAnswerRequestHandler(){
    let response_json = JSON.parse(this.responseText);

    let upvote_icon = answer_votes_class.querySelector('.upvote_answer_icon');
    let downvote_icon = answer_votes_class.querySelector('.downvote_answer_icon');

    if(upvote_icon.style.color == 'rgb(253, 93, 34)') upvote_icon.style.color = '#212529'; //remove upvote
    else{
        downvote_icon.style.color = '#212529';
        upvote_icon.style.color = '#fd5d22';
    }

    answer_votes_class.querySelector('.answer-number-of-votes').innerText = response_json['nmr_votes'];

}


function downvoteAnswerRequestHandler(){
    let response_json = JSON.parse(this.responseText);

    let upvote_icon = answer_votes_class.querySelector('.upvote_answer_icon');
    let downvote_icon = answer_votes_class.querySelector('.downvote_answer_icon');

    if(downvote_icon.style.color == 'rgb(253, 93, 34)') downvote_icon.style.color = '#212529'; //remove downvote
    else{
        upvote_icon.style.color = '#212529';
        downvote_icon.style.color = '#fd5d22';
    }

    answer_votes_class.querySelector('.answer-number-of-votes').innerText = response_json['nmr_votes'];
}


function errorMessage(response){
    console.error(response);
}
