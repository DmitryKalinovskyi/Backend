<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // try to register user

    // load data from database and render it for user.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $stmt = $pdo->prepare("INSERT INTO employees (Name, Position, Salary)
VALUES (:name, :position, :salary)");

        $stmt->execute(['name' => $name, 'position' => $position, 'salary' => $salary]);

        header("Location: ../employees.php");
    }
    catch(PDOException $e) {
        $msg = $e->getMessage();
    }
}