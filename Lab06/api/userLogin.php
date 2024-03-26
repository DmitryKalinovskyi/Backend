<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // read name and password

    // Retrieve the JSON data sent from the frontend
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    $email = $data['email'];
    $password = $data['password'];

    $errors = [];
    $message = [];

    $pdo = new PDO("mysql:host=localhost;dbname=Lab05", "root", "");

    $sql = "SELECT * FROM users WHERE Email = \"$email\"";

    try{
        $sth = $pdo->query($sql);

        $match = $sth->fetch();

        if($match == null){
            $errors[] = "Login failed!";
        }
        else {
            if($password !== $match['Password']){
                $errors[] = "Login failed!";
            }
            else{
                $message[] = "Logged in!";
                $_SESSION['logged_in'] = true;
            }

        }


    }catch(Exception $e){
        $errors[] = "Internal server error.";
    }

    if(count($errors) > 0){
        echo json_encode(["errors" => $errors]);
    }
    else{
        echo json_encode(["message" => $message]);
    }
}