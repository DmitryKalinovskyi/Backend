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
    Enter information to remove profile:
</div>
<?php

include_once "login.php";

function deleteDir($dirPath): void{
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (!str_ends_with($dirPath, '/')) {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function deleteLogin($login, $pass): void
{
    echo $login;
    if(!file_exists("data/$login")){
        echo "Such login don't present";
        return;
    }
    $file = fopen("data/$login/pass.txt", 'r');

    $data = fgets($file);

    fclose($file);

    if($data != $pass){
        echo "Incorrect password!";
        return;
    }

    deleteDir("data/$login");
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    deleteLogin($_POST['login'], $_POST['password']);
}
?>
</body>

<a href="index.php">Login page</a>
</html>