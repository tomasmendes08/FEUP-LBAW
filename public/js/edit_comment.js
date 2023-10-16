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


var comment_cards = document.querySelector('.comment-cards');
var comment = null;
if(comment_cards != null){
    comment_cards.addEventListener('click', function (event) { 
        event.preventDefault();
        comment = event.target.closest('.comment');
        let comment_options = comment.querySelector('.comment-options-buttons');
        const comment_id = comment_options.getAttribute('data-id');
        //console.log(comment_id);
        
        if(event.target.classList.contains('edit-comment-button')){
            sendAjaxRequest('GET', '/api/comment/' + comment_id + '/edit', {comment_id : comment_id}, showEditCommentArea);
        }
        else if(event.target.classList.contains('ajax-edit-comment' + comment_id)){
            let comment_body = comment.querySelector('#form-textarea-edit-comment' + comment_id).value;
            //console.log(comment_body);
            sendAjaxRequest('POST', '/api/comment/' + comment_id + '/edit', {comment_id : comment_id, comment_body : comment_body}, updateCommentRequest);
        }
    });
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

        console.log(response_json['view']);
    }
}

