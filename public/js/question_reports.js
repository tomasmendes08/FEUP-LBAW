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

var question_reports_class = null;
if(questions != null){
    questions.addEventListener('click', function(event){
        question_reports_class = event.target.closest('.question-report-icon').parentElement;
        const question_id = question_reports_class.getAttribute('data-id');
        if(event.target.classList.contains('question-report-icon')){
            sendAjaxRequest('POST', '/api/question/' + question_id + '/report', {question_id : question_id, report : true}, reportRequestHandler, errorMessage);
        }
    });
}

let delete_reported_questions = document.querySelectorAll('.delete-question-button-reports')
if (delete_reported_questions != null) {
    for (let i = 0; i < delete_reported_questions.length; i++) {
        delete_reported_questions[i].addEventListener('click', function(event) {
            event.preventDefault()
            let question_id = event.target.getAttribute('data-id')
            sendAjaxRequest('DELETE', '/api/question/' + question_id + '/delete', {question_id : question_id}, deleteQuestionRequestHandler, errorMessage);
        })
    }
}

let unreport_reported_questions = document.querySelectorAll('.unreport-question-button-reports')
if (unreport_reported_questions != null) {
    for (let i = 0; i < unreport_reported_questions.length; i++) {
        unreport_reported_questions[i].addEventListener('click', function(event) {
            event.preventDefault()
            let question_id = event.target.getAttribute('data-id')
            console.log(question_id)
            sendAjaxRequest('DELETE', '/api/question/' + question_id + '/unreport', {question_id : question_id, report : true}, unreportQuestionRequestHandler, errorMessage);
        })
    }
}


function reportRequestHandler(){
    let response_json = JSON.parse(this.responseText);
    console.log(response_json)
    if (response_json['report'] === "added report") {
        let report_icon = question_reports_class.querySelector('.question-report-icon');

        report_icon.style.color = 'red';
    }
    else if (response_json['report'] === "deleted report") {
        let report_icon = question_reports_class.querySelector('.question-report-icon');

        report_icon.style.color = '#212529'; //remove report
    }
}

function unreportQuestionRequestHandler(){
    let response_json = JSON.parse(this.responseText);
    console.log(response_json)
    if (response_json['report'] === "deleted report") {
        console.log('.question-card-container-' + response_json['question_id'])
        let question_container = document.querySelector('.question-card-container-' + response_json['question_id']);
        console.log(question_container)
        question_container.remove();
    }
}

function deleteQuestionRequestHandler(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        let question_container = document.querySelector('.question-card-container-' + response_json['question_id']);
        question_container.remove();
    }
}


let delete_reported_answers = document.querySelectorAll('.delete-answer-button-reports')
if (delete_reported_answers != null) {
    for (let i = 0; i < delete_reported_answers.length; i++) {
        delete_reported_answers[i].addEventListener('click', function(event) {
            event.preventDefault()
            let answer_id = event.target.getAttribute('data-id')
            sendAjaxRequest('DELETE', '/api/answer/' + answer_id + '/delete', {answer_id : answer_id}, deleteAnswerRequestHandler, errorMessage);
        })
    }
}

let unreport_reported_answers = document.querySelectorAll('.unreport-answer-button-reports')
if (unreport_reported_answers != null) {
    for (let i = 0; i < unreport_reported_answers.length; i++) {
        unreport_reported_answers[i].addEventListener('click', function(event) {
            event.preventDefault()
            let answer_id = event.target.getAttribute('data-id')
            console.log(answer_id)
            sendAjaxRequest('POST', '/api/answer/' + answer_id + '/report', {answer_id : answer_id, report : true}, unreportAnswerRequestHandler, errorMessage);
        })
    }
}

function unreportAnswerRequestHandler(){
    console.log(this.responseText)
    let response_json = JSON.parse(this.responseText);
    console.log(response_json)
    if (response_json['report'] === "deleted report") {
        console.log('.answer-card-container-' + response_json['answer_id'])
        let answer_container = document.querySelector('.answer-card-container-' + response_json['answer_id']);
        console.log(answer_container)
        answer_container.remove();
    }
}

function deleteAnswerRequestHandler(){
    console.log(this.responseText)
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        let answer_container = document.querySelector('.answer-card-container-' + response_json['answer_id']);
        answer_container.remove();
    }
}
