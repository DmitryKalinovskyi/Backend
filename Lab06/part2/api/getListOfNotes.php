<?php

$pdo = new PDO("mysql:host=localhost;dbname=Lab05", "root", "");

$sql ="SELECT * FROM notes";
$sth = $pdo->query($sql);


$result = $sth->fetchAll();

$resultData = [];

foreach($result as $row){
    $item = [];
    $item['Id'] = $row['Id'];
    $item['Title'] = $row['Title'];
    $item['Description'] = $row['Description'];
    $resultData[] = $item;
}

echo json_encode($resultData);

