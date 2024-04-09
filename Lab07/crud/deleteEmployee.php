<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];

    if(empty($id)){
        header("Location: ../employees.php");
        die();
    }

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM employees WHERE Id = :id");

        $stmt->execute(['id' => $id]);

        session_destroy();
        header("Location: ../employees.php");
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}
