<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // read name and password

    // Retrieve the JSON data sent from the frontend
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    $id = $data['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=lab05", "root", "");

    $sql = "DELETE FROM users WHERE Id = $id";

    try{
        $pdo->query($sql);
    }catch(Exception $e){
        echo json_encode(['errors' => "Internal server error"]);
        die();
    }

    echo json_encode([]);
}