<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];

        $stmt = $pdo->prepare("UPDATE employees Set Name = :name, Position = :position, Salary = :salary WHERE Id = :id");
        $stmt->execute(['name' => $name, 'position' => $position, 'salary' => $salary, 'id' => $id]);

        header("Location: ../employees.php");
        die();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}