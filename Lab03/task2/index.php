<?php

    session_start();

    const IS_LOGGED = 'is_logged';


    if(isset($_SERVER['REQUEST_METHOD'])){
        if(($_POST['logout'] ?? "") == 'logout')
        {
            $_SESSION[IS_LOGGED] = false;
        }
        elseif(isset($_POST['login']) and isset($_POST['password'])){
            if($_POST['login'] == "Admin" and $_POST['password'] == "password"){
                $_SESSION[IS_LOGGED] = true;
            }
            else{
                echo "<div class='error'>Incorrect login information</div>";
            }
        }

    }
?>


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

if(isset($_SESSION[IS_LOGGED]) and $_SESSION[IS_LOGGED])
{
    echo "Hello, Admin!";

    echo "
    <form method='post'>
        <input name='logout' hidden='hidden' value='logout'>
        <button>Log out</button>
    </form>
    ";

}
else
{
    include "login.php";
}


?>

</body>
</html>