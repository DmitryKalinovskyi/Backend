const msg = document.querySelector('.msg');

async function getNotes(){
    const response = await fetch("http://backend/lab06/part2/api/getListOfNotes.php");

    return await response.json();
}

function renderNotes(notes){
    const container = document.querySelector('.container');

    let table = "<table>";
    table += "<tr> <th>Title</th><th>Description</th> <th>Delete</th></tr>"
    for(let note of notes){
        table += '<tr>';
        table += `<td>${note.Id}</td>`;
        table += `<td>${note.Title}</td>`;
        table += `<td>${note.Description}</td>`;
        table += `<td><button onclick="removeNote(${note.Id})">Remove</button></td>`;
        table += '</tr>';
    }

    table += '</table>'

    container.innerHTML = table;
}


function validateNoteData(title, description){
    if(title === ""){
        return ["Title should not be empty!"];
    }

    if(description === ""){
        return ['Description should not be empty!']
    }
}

function validateNoteUpdateData(id, title, description){
    if(isNaN(+id)){
        return ['Id should be number!'];
    }

    if(title === ""){
        return ["Title should not be empty!"];
    }

    if(description === ""){
        return ['Description should not be empty!']
    }
}

async function removeNote(id){
    const response = await fetch("http://backend/lab06/part2/api/removeNote.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": JSON.stringify({
            id
        })
    });

    const result = await response.json();

    if("errors" in result){
        renderErrors(result.errors);
    }
    else{
        clearErrors();
        renderMessage("Note removed!");
    }

    renderNotes(await getNotes());
}

async function addNewNote(title, description){
    const response = await fetch("http://backend/lab06/part2/api/addNote.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": JSON.stringify({
            title,
            description
        })
    });

    const result = await response.json();

    if("errors" in result){
        renderErrors(result.errors);
    }
    else{
        clearErrors();
        renderMessage("Note added!");
    }

    renderNotes(await getNotes());
}

async function updateNote(id, title, description){
    const response = await fetch("http://backend/lab06/part2/api/updateNote.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": JSON.stringify({
            id,
            title,
            description
        })
    });

    const result = await response.json();

    if("errors" in result){
        renderErrors(result.errors);
    }
    else{
        clearErrors();
        renderMessage("Note added!");
    }

    renderNotes(await getNotes());
}

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

async function start(){
    renderNotes(await getNotes());
}

start();

const noteCreateForm = document.querySelector('#noteCreate');
const noteUpdateForm = document.querySelector('#noteUpdate');

noteCreateForm.onsubmit = e => {
    e.preventDefault();

    const title = noteCreateForm.title.value;
    const description = noteCreateForm.description.value;

    const errors = validateNoteData(title.trim(), description.trim());

    if(errors !== undefined) {
        renderErrors(errors);
    }
    else{
        addNewNote(title.trim(), description.trim());
    }
}

noteUpdateForm.onsubmit = e => {
    e.preventDefault();

    const id = noteUpdateForm.id.value;
    const title = noteUpdateForm.title.value;
    const description = noteUpdateForm.description.value;

    const errors = validateNoteUpdateData(id.trim(), title.trim(), description.trim());

    if(errors !== undefined) {
        renderErrors(errors);
    }
    else{
        updateNote(+id.trim(), title.trim(), description.trim());
    }
}
