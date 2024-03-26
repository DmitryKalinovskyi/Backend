<?php

$pdo = new PDO("mysql:host=localhost;dbname=lab05", "root", "");

$sql ="SELECT * FROM users";
$sth = $pdo->query($sql);


$result = $sth->fetchAll();

$resultData = [];

foreach($result as $row){
    $item = [];
    $item['Id'] = $row['Id'];
    $item['Name'] = $row['Name'];
    $item['Email'] = $row['Email'];
    $resultData[] = $item;
}

echo json_encode($resultData);

