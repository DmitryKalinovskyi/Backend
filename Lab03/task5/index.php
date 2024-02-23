<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    Enter login information:
</div>
<?php

include_once "login.php";

function createLogin($login, $pass): void
{
    if(file_exists("data/$login")){
        echo "Someone already uses that login.";
        return;
    }

    mkdir("data/$login");
    mkdir("data/$login/video");
    mkdir("data/$login/music");


    $file = fopen("data/$login/pass.txt", 'w');
    fwrite($file, $pass);
    fclose($file);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    createLogin($_POST['login'], $_POST['password']);
}
?>
</body>

<a href="delete.php">Delete page</a>

</html>