<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/userDelete.js" defer></script>
    <title>User removal</title>
</head>
<body>
    <form id="deleteForm">
        <div>
            <label for="idField">Enter user id</label>
            <input name="id" id="idField">
        </div>
        <button>Delete</button>
    </form>

    <div class="msg">

    </div>

    <?php include "links.php"?>
</body>
</html>