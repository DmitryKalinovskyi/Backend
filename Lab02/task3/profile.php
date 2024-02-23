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

<?php
session_start();
$_SESSION["login"] = $_POST["login"] ?? "";
$_SESSION["password"] = $_POST["password"] ?? "";
$_SESSION["sex"] =  $_POST["sex"] ?? "";
$_SESSION["city"] =  $_POST["city"] ?? "";
$_SESSION["fav-games"] =  $_POST["fav-games"] ?? "";
$_SESSION["about-yourself"] =  $_POST["about-yourself"] ?? "";
$_SESSION["photo"] =  $_POST["photo"] ?? "";

function getJoined($arr){
    return join(" ", $arr);
}
?>

    <form>
        <table>
            <tr>
                <td><label>Login:</label></td>
                <td><label><?= $_SESSION["login"] ?? "" ?></label></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><label><?= $_SESSION["password"] ?? "" ?></label></td>
            </tr>
            <tr>
                <td><label>Sex:</label></td>
                <td><label><?= $_SESSION["sex"] ?? "" ?></label></td>
            </tr>
            <tr>
                <td><label>City:</label></td>
                <td><label><?= $_SESSION["city"] ?? "" ?></label></td>
            </tr>
            <tr>
                <td><label>Favorite Game:</label></td>
                <td><label><?= getJoined($_SESSION["fav-games"] ?? []) ?></label></td>
            </tr>
            <tr>
                <td><label>About Yourself:</label></td>
                <td><label><?= $_SESSION["about-yourself"] ?? "" ?></label></td>
            </tr>
            <tr>
                <td><label>Photo:</label></td>
                <td><label><?= $_SESSION["photo"] ?? "" ?></label></td>
            </tr>
        </table>
    </form>

<a href="index.php">
    return to main page
</a>
</body>
</html>