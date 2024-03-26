const form = document.querySelector('#userForm')
const msg = document.querySelector(".msg");

function renderErrors(errors){
    msg.innerHTML = "";
    for(let error of errors){
        msg.innerHTML += `<div class="error">${error}</div>`;
    }
}

function clearErrors(){
    msg.innerHTML = "";
}

function renderMessage(msgText){
    msg.innerHTML = `<div class='msg'>${msgText}</div>`;
}

form.onsubmit = e => {
    const password = form.password.value;
    const email = form.email.value;

    fetch("http://backend/lab06/api/userLogin.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": JSON.stringify({
            email,
            password
        })
    }).then(response =>
    {
        response.json().then(res => {
            if("errors" in res){
                renderErrors(res.errors);
            }
            else{
                clearErrors();
                renderMessage("Successfully logged in!");
            }
        });
    });

    e.preventDefault();
}