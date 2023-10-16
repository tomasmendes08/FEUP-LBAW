
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
var comments = null;
if(answer_cards != null){
    answer_cards.addEventListener('submit', function (event) {
        event.preventDefault(); 
        comments = event.target.closest('.comments');
        //console.log(comments);
        const answer_id = comments.getAttribute('data-id');
        let comment_body = comments.querySelector('#form-textarea-comment' + answer_id).value;
        console.log(answer_id);
        //console.log(comment_body);

        sendAjaxRequest('POST', '/api/answer/' + answer_id + '/comment', {comment_body : comment_body, answer_id : answer_id}, createNewCommentHandler);
    });    
}


function createNewCommentHandler(){
    let response_json = JSON.parse(this.responseText);
    //console.log(response_json['view']);
    comments.querySelector('#form-textarea-comment' + response_json['answer_id']).value = "";
    comments.querySelector('.comment-cards').insertAdjacentHTML('beforeend', response_json['view']);
}


