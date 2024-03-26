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


function validate(name, password, email, passwordrepeat){
    if(name === ""){
        return ["Name should not be empty!"];
    }

    if(email === ""){
        return ["Email should not be empty!"];
    }

    if(password === "")
    {
        return["Password should not be empty!"];
    }

    if(passwordrepeat !== password){
        return ["Password don't match!"];
    }
}

form.onsubmit = e => {
    const name = form.name.value;
    const password = form.password.value;
    const email = form.email.value;
    const passwordrepeat = form['password-repeat'].value;

    let errors = validate(name, password, email, passwordrepeat);

    if(errors !== undefined){
        renderErrors(errors);

        e.preventDefault();
        return;
    }

    fetch("http://backend/lab06/api/createUser.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": JSON.stringify({
            name,
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
                    renderMessage("Successfully created user!");
                }
            });
        });

    e.preventDefault();
}