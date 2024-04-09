<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $link = $_POST['link'];

        $stmt = $pdo->prepare("INSERT INTO  menus (Name, Link)
VALUES (:name, :link)");

        $stmt->execute(['name' => $name, 'link' => $link]);

        header("Location: ../menu.php");
    }
    catch(PDOException $e) {
    }
}