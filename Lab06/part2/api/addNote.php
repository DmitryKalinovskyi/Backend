<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // read name and password

    // Retrieve the JSON data sent from the frontend
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    $title = $data['title'];
    $description = $data['description'];

    $errors = [];

    // validate
    if(strlen($title) == 0){
        $errors[] = "Title cannot be empty!";
    }

    if(strlen($description) == 0){
        $errors[] = "Description cannot be empty!";
    }

    if(strlen($description) > 1024){
        $errors[] = "Description is too long!";
    }

    if(strlen($title) > 100){
        $errors[] = "Title is too long!";
    }

    if(count($errors) > 0){
        echo json_encode(['errors' => $errors]);
        die();
    }

    $pdo = new PDO("mysql:host=localhost;dbname=Lab05", "root", "");

    $sql = "INSERT INTO notes (Title, Description) VALUES (\"$title\", \"$description\")";

    try{
        $pdo->query($sql);
    }catch(Exception $e){
        echo json_encode(['errors' => "Internal server error"]);
        die();
    }

    echo json_encode([]);
}