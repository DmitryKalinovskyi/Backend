const container = document.querySelector('.container');

function renderUsers(users){
    let msg = "";
    msg += "<table>";
    msg += "<tr><th>Id</th><th>Name</th><th>Email</th></tr>"

    for(let user of users){
        msg += "<tr>";
        msg += `<td>${user.Id}</td>`;
        msg += `<td>${user.Name}</td>`;
        msg += `<td>${user.Email}</td>`;
        msg += "</tr>";
    }

    msg += "</table>";

    container.innerHTML = msg;
}

fetch("http://backend/lab06/api/getUsersList.php").then(response => {
    response.json().then(data => {
        renderUsers(data);
    });
});
