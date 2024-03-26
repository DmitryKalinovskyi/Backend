const msg = document.querySelector('.msg');

function renderMessage(msgText){
    msg.innerHTML = msgText;
}

function deleteUser(id){
    fetch("http://backend/lab06/api/deleteUser.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body":JSON.stringify({
            "id": id
        })
    }).then(response => {
        renderMessage("Deleted successfully!");
    });
}

const form = document.querySelector("#deleteForm");

form.onsubmit = e => {
    console.log(+form.id.value);
    deleteUser(+form.id.value);

    e.preventDefault();
}