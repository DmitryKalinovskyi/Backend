<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_SESSION['LOGGED_IN']) || empty($_SESSION['USER_ID'])){
        header('Location: index.php');
        die();
    }

    $userId = $_SESSION['USER_ID'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM USERS WHERE Id = :id");

        $stmt->execute(['id' => $userId]);

        session_destroy();
        header("Location: index.php");
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}
