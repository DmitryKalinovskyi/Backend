<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/getNotes.js" defer></script>
    <title>Notes</title>
</head>
<body>
    <div>
        Table of notes
    </div>
    <div class="container">

    </div>
    <div>
        Create note
    </div>
<form id="noteCreate">
    <div>
        <label for="titleField">Title</label>
        <input name="title" id="titleField">
    </div>
    <div>
        <label for="descriptionField">Description</label>
        <input name="description" id="descriptionField">
    </div>
    <button>Submit</button>
</form>

    <div>
        Update note
    </div>
    <form id="noteUpdate">
        <div>
            <label for="id2">Id</label>
            <input name="id" id="id2">
        </div>
        <div>
            <label for="titleField2">Title</label>
            <input name="title" id="titleField2">
        </div>
        <div>
            <label for="descriptionField2">Description</label>
            <input name="description" id="descriptionField2">
        </div>
        <button>Update</button>
    </form>
<div class="msg"></div>
</body>
</html>