<?php

session_start();

if($_SESSION['LOGGED_IN']){
    header("Location: myprofile.php");
}
else{
    header("Location: login.php");
}