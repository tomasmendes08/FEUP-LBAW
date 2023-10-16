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


var answer_cards = document.querySelector('#answer-cards');
var answer_container = null;
var answer = null;
var comment = null;
var comments = null;
if(answer_cards != null){
    answer_cards.addEventListener('click', function (event) { 
        event.preventDefault();
        
        answer_container = event.target.closest('.answer-container');
        answer = event.target.closest('.answer-box');
        comment = event.target.closest('.comment');
        comments = event.target.closest('.comments');
        console.log(event.target);

        
        if(answer != null){
            let answer_options = answer.querySelector('.answer-options-buttons');
            //console.log(answer_options);
            var answer_id = answer_options.getAttribute('data-id');
            console.log("answer");
        }

        if(comment != null){
            let comment_options = comment.querySelector('.comment-options-buttons');
            var comment_id = comment_options.getAttribute('data-id');
            console.log("comment");
        }

        if(comments != null){
            var comment_answer_id = comments.getAttribute('data-id');
            console.log("comment_answer_id");
        }
        
        if(event.target.classList.contains('edit-answer-button')){
            sendAjaxRequest('GET', '/api/answer/' + answer_id + '/edit', {answer_id : answer_id}, showEditAnswerArea);
        }
        else if(event.target.classList.contains('ajax-edit-answer' + answer_id)){
            let answer_body = answer.querySelector('#form-textarea-edit-answer' + answer_id).value;
            sendAjaxRequest('POST', '/api/answer/' + answer_id + '/edit', {answer_id : answer_id, answer_body : answer_body}, updateAnswerRequest);
        }
        else if(event.target.classList.contains('edit-cancel-answer' + answer_id)){
            cancelEditAnswer();
        }
        else if (event.target.classList.contains('delete-answer-button')){
            //console.log('ola');
            sendAjaxRequest('DELETE', '/api/answer/' + answer_id + '/delete', {answer_id : answer_id}, deleteAnswerRequest);
        }
        else if(event.target.classList.contains('highlight-answer-button')){
            //console.log('ola');
            sendAjaxRequest('PUT', '/api/answer/' + answer_id + '/highlight', {answer_id : answer_id}, highlightAnswerRequest);
        }
        else if(event.target.classList.contains('remove-highlight-answer-button')){
            //console.log('ola');
            sendAjaxRequest('DELETE', '/api/answer/' + answer_id + '/highlight', {answer_id : answer_id}, deleteHighlightAnswerRequest);
        }
        else if (event.target.classList.contains('answer-report-icon')){
            sendAjaxRequest('POST', '/api/answer/' + answer_id + '/report', {answer_id : answer_id, report : true}, reportAnswerRequestHandler, errorMessage);
        }
        else if (event.target.classList.contains('comment-report-icon')){
            sendAjaxRequest('POST', '/api/comment/' + comment_id + '/report', {comment_id : comment_id, report : true}, reportCommentRequestHandler, errorMessage);
        }
        else if(event.target.classList.contains('edit-comment-button')){
            sendAjaxRequest('GET', '/api/comment/' + comment_id + '/edit', {comment_id : comment_id}, showEditCommentArea);
        }
        else if(event.target.classList.contains('ajax-edit-comment' + comment_id)){
            let comment_body = comment.querySelector('#form-textarea-edit-comment' + comment_id).value;
            sendAjaxRequest('POST', '/api/comment/' + comment_id + '/edit', {comment_id : comment_id, comment_body : comment_body}, updateCommentRequest);
        }
        else if(event.target.classList.contains('edit-cancel-comment' + comment_id)){
            cancelEditComment();
        }
        else if (event.target.classList.contains('delete-comment-button')){
            //console.log('ola');
            sendAjaxRequest('DELETE', '/api/comment/' + comment_id + '/delete', {comment_id : comment_id}, deleteCommentRequest);
        }
        else if(event.target.classList.contains('ajax-submit-comment' + comment_answer_id)){
            let add_comment_body = comments.querySelector('#form-textarea-submit-comment' + comment_answer_id).value;
            console.log(comment_answer_id);
            sendAjaxRequest('POST', '/api/answer/' + answer_id + '/comment', {comment_body : add_comment_body, answer_id : comment_answer_id}, createNewCommentHandler);
        }
    });
}


function createNewCommentHandler(){
    let response_json = JSON.parse(this.responseText);
    //console.log(response_json['view']);
    comments.querySelector('#form-textarea-submit-comment' + response_json['answer_id']).value = "";
    comments.querySelector('.comment-cards').insertAdjacentHTML('beforeend', response_json['view']);
}

function cancelEditAnswer(){
    let answer_text = answer.querySelector('.answer-title-secondary-text');
    
    answer_text.querySelector('h5').hidden = false;
    answer_text.querySelector('.edit-answer-area').hidden = true;
}

function cancelEditComment(){
    let comment_text = comment.querySelector('.comment-text');
    
    comment_text.querySelector('h5').hidden = false;
    comment_text.querySelector('.edit-comment-area').hidden = true;
}

function showEditAnswerArea(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        //console.log(response_json);
        let answer_text = answer.querySelector('.answer-title-secondary-text');
        
        answer_text.querySelector('h5').hidden = true;
        answer_text.querySelector('.edit-answer-area').hidden = false;
    }
}

function highlightAnswerRequest(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        console.log(response_json);
        let answer_options = answer.querySelector('.answer-options-buttons');
        
        let div_best_answer = "<div class='answer-space-best-answer mt-md-2 mt-3 col-7 d-flex align-items-md-center justify-content-md-end align-items-start' style='font-weight:bolder; font-size:20px;'>Best Answer<span class='material-icons ms-1' style='font-size: 30px; color: #fd5d22;'>star</span></div>";
        answer.querySelector('.answer-header').insertAdjacentHTML('beforeend', div_best_answer);
        answer.style.boxShadow = "0em 0em 0em 0.4em #fd5d22";

        let remove_highlight_button = "<button type='button' class='btn d-flex mb-3 remove-highlight-answer-button' style='border: 0px;'><span class='material-icons highlight-icon me-1'>star</span>Remove</button>";
        answer_options.querySelector('.highlight-answer-button').remove();
        answer_options.insertAdjacentHTML('afterbegin', remove_highlight_button);
    }
}

function deleteHighlightAnswerRequest(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        console.log(response_json);
        let answer_options = answer.querySelector('.answer-options-buttons');

        answer.querySelector('.answer-space-best-answer').remove();
        answer.style.boxShadow = "";

        let add_highlight_button = "<button type='button' class='btn d-flex mb-3 highlight-answer-button' style='border: 0px;'><span class='material-icons highlight-icon me-1'>star</span>Highlight</button>";
        answer_options.querySelector('.remove-highlight-answer-button').remove();
        answer_options.insertAdjacentHTML('afterbegin', add_highlight_button);

    }
}

function updateAnswerRequest(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        //console.log(response_json);
        let answer_text = answer.querySelector('.answer-title-secondary-text');
        
        answer_text.querySelector('.edit-answer-area').hidden = true;
        answer_text.querySelector('h5').innerText = response_json['answer_body'];
        answer_text.querySelector('h5').hidden = false;

        console.log(response_json['view']);
    }
}

function deleteAnswerRequest(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        //console.log(response_json);
        answer_cards.querySelector('.answer-div-' + response_json['answer_id']).remove();
        answer_container.remove();
        let nmr_answers = parseInt(document.getElementById('question-nmr-answers' + response_json['question_id']).innerHTML) - 1;
        if(nmr_answers == 1)
            document.getElementById('question-nmr-answers' + response_json['question_id']).innerHTML = nmr_answers + " answer";
        else document.getElementById('question-nmr-answers' + response_json['question_id']).innerHTML = nmr_answers + " answers";
    }
}

function showEditCommentArea(){
    if(this.status == 200){

        let response_json = JSON.parse(this.responseText);
        //console.log(response_json);
        let comment_text = comment.querySelector('.comment-text');
        
        comment_text.querySelector('h5').hidden = true;
        comment_text.querySelector('.edit-comment-area').hidden = false;
    }
}

function updateCommentRequest(){
    if(this.status == 200){

        let response_json = JSON.parse(this.responseText);
        //console.log(response_json);
        let comment_text = comment.querySelector('.comment-text');
        
        comment_text.querySelector('.edit-comment-area').hidden = true;
        comment_text.querySelector('h5').innerText = response_json['comment_body'];
        comment_text.querySelector('h5').hidden = false;

        //console.log(response_json['view']);
    }
}


function deleteCommentRequest(){
    if(this.status == 200){
        let response_json = JSON.parse(this.responseText);
        console.log(response_json);
        comment.remove();
    }
}

function reportAnswerRequestHandler(){
    let response_json = JSON.parse(this.responseText);
    console.log(response_json);

    if (response_json['report'] === "added report") {
        comment.classList.remove('.answer-report-icon');
        comment.classList.add('.reported-answer-report-icon');
        let report_icon = comment.querySelector('.reported-answer-report-icon');

        report_icon.style.color = '#fd5d22';
    }
    else if (response_json['report'] === "deleted report") {
        comment.classList.add('.answer-report-icon');
        comment.classList.remove('.reported-answer-report-icon');
        let report_icon = comment.querySelector('.answer-report-icon');

        report_icon.style.color = '#212529'; //remove report
    }
}

function reportCommentRequestHandler(){
    let response_json = JSON.parse(this.responseText);
    console.log(response_json);

    if (response_json['report'] === "added report") {
        comment.classList.remove('.comment-report-icon');
        comment.classList.add('.reported-comment-report-icon');
        let report_icon = comment.querySelector('.reported-comment-report-icon');

        report_icon.style.color = '#fd5d22';
    }
    else if (response_json['report'] === "deleted report") {
        comment.classList.add('.comment-report-icon');
        comment.classList.remove('.reported-comment-report-icon');
        let report_icon = comment.querySelector('.comment-report-icon');

        report_icon.style.color = '#212529'; //remove report
    }
}
