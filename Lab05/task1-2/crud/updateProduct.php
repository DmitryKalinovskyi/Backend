<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $relealizationDate = $_POST['relealizationDate'];

        $stmt = $pdo->prepare("UPDATE products Set Name = :name, Price = :price, Count = :count, RelealizationDate = :relealizationDate WHERE Id = :id");
        $stmt->execute(['name' => $name, 'price' => $price, 'count' => $count, 'relealizationDate' => $relealizationDate, 'id' => $id]);

        header("Location: ../products.php");
        die();
    }
    catch(Exception $e){
        $msg = $e->getMessage();
    }
}