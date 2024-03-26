<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/userRegister.js" defer></script>
    <title>User register</title>
</head>
<body>
    <form id="userForm">
        <div>
            <label for="nameField">Name: </label>
            <input name="name" id="nameField">
        </div>
        <div>
            <label for="emailField">Email: </label>
            <input name="email" id="emailField" type="email">
        </div>
        <div>
            <label for="passwordField">Password: </label>
            <input name="password" id="passwordField" type="password">
        </div>
        <div>
            <label for="passwordField2">Repeat Password: </label>
            <input name="password-repeat" id="passwordField2" type="password">
        </div>
        <button>
            Submit
        </button>
    </form>
    <div class="msg">

    </div>

    <?php include "links.php"?>

</body>
</html>