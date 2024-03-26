<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(empty($_POST['id'])){
        header('Location: ../products.php');
        die();
    }

    $id = $_POST['id'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM products WHERE Id = :id");

        $stmt->execute(['id' => $id]);

        header("Location: ../products.php");
        die();
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}
