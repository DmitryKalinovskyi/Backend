<?php

session_start();

if(isset($_SESSION['LOGGED_IN'])){
    echo "Logged";
    $userId = $_SESSION['USER_ID'];
    header("Location: user.php?id=$userId");
}