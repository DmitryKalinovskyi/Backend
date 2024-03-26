<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // try to register user

    // load data from database and render it for user.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $relealizationDate = $_POST['relealizationDate'];

        $stmt = $pdo->prepare("INSERT INTO products (Name, Price, Count, RelealizationDate)
VALUES (:name, :price, :count, :relealizationDate)");

        $stmt->execute(['name' => $name, 'price' => $price, 'count' => $count,
            'relealizationDate' => $relealizationDate]);

        header("Location: ../products.php");
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}