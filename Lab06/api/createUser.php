<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // read name and password

    // Retrieve the JSON data sent from the frontend
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    $name = $data['name'];
    $password = $data['password'];
    $email = $data['email'];

    $errors = [];

    // validate
    if(strlen($name) > 100){
        $errors[] = "Name is too long!";
    }

    if(strlen($password) > 100){
        $errors[] = "Password is too long!";
    }

    if(strlen($password) < 6){
        $errors[] = "Password is too short!";
    }

    if(count($errors) > 0){
        echo json_encode(['errors' => $errors]);
        die();
    }

    $pdo = new PDO("mysql:host=localhost;dbname=Lab05", "root", "");

    $sql = "INSERT INTO users (Name, Password, Email) VALUES (\"$name\", \"$password\", \"$email\")";

    try{
        $pdo->query($sql);
    }catch(Exception $e){
        echo json_encode(['errors' => "Internal server error"]);
        die();
    }

    echo json_encode([]);
}