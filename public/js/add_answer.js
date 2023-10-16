
let add_answer_button = document.getElementById('ajax-submit-answer');

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


function sendNewAnswerRequest(event){
    event.preventDefault();

    let question_id = document.getElementById('answer_question_id').value;
    let author = document.getElementById('answer_author').value;
    let answer_body = document.getElementById('form-textarea-answer').value;

    sendAjaxRequest('POST', '/api/question/'+ question_id + '/answer', {answer_body : answer_body, author : author, question_id : question_id}, createNewAnswerHandler);

}


function createNewAnswerHandler() {
    let response = JSON.parse(this.responseText);

    let answer_cards = document.getElementById('answer-cards');
    document.getElementById('form-textarea-answer').value = "";

    let nmr_answers = parseInt(document.getElementById('question-nmr-answers' + response['question_id']).innerHTML) + 1;
    //console.log(nmr_answers);
    answer_cards.insertAdjacentHTML('beforeend', response['view'] + '<hr class="my-5 answer-div-' + response['answer_id'] + '">');
    if(nmr_answers == 1)
        document.getElementById('question-nmr-answers' + response['question_id']).innerHTML = nmr_answers + " answer";
    else document.getElementById('question-nmr-answers' + response['question_id']).innerHTML = nmr_answers + " answers";

}

if(add_answer_button != null)
    add_answer_button.addEventListener('click', sendNewAnswerRequest);
