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

// var search_page = document.querySelector('.search-page');
// if(search_page != null){
//     search_page.addEventListener('load', searchPageRequest);
// }

// function searchPageRequest(event){
//     event.preventDefault();
//     console.log('20');
//     console.log(search_page);
//     sendAjaxRequest('POST', '/api/search/questions', {}, searchPageRequestHandler);
// }

// function searchPageRequestHandler(){
//     let response = JSON.parse(this.responseText);
//     console.log(response);
// }


