let login_username = document.getElementById('login_submit');

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


function sendLoginRequest(event){
    event.preventDefault();

    let username = document.getElementById('login_username').value;
    let password = document.getElementById('login_password').value;

    sendAjaxRequest('POST', '/api/login', {username : username, password : password}, loginRequestHandler);
}

function loginRequestHandler(){

    let response = JSON.parse(this.responseText);
    console.log(response['previous_url']);

    if(response['success'] === "false"){
        let error_message = document.querySelector("div.login-error-message");
        error_message.style.color = "red";
        error_message.innerHTML = "The provided credentials do not match our records.";
    }
    else{
        location.href = response['previous_url'];
    }

}

login_username.addEventListener('click', sendLoginRequest);
