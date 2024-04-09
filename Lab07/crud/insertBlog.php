<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_SESSION['USER_ID']))
    {
        header("Location: ../blog.php");
        die();
    }
    $userId = $_SESSION['USER_ID'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $rawContent = $_POST['content'];
        $content = json_encode($rawContent);

        $stmt = $pdo->prepare("INSERT INTO blogs (Name, Content, OwnerId)
VALUES (:name, :content, :ownerId)");

        $stmt->execute(['name' => $name, 'content' => $content, 'ownerId' => $userId]);

        header("Location: ../blog.php");
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}