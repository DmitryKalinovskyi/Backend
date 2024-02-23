<?php

function uploadIfExist(): int
{
    if($_SERVER['REQUEST_METHOD'] != "POST")
        return 0;

    if(empty($_FILES['img']))
        return 0;

    $location = 'uploads/' . basename($_FILES['img']['name']);
    $uploadOk = 1;
    if(file_exists($location)){
        echo "Sorry, file already exist.";
        $uploadOk = 0;
    }

    if($uploadOk){
        move_uploaded_file($_FILES['img']['tmp_name'], $location);
    }

    return $uploadOk;
}

uploadIfExist();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label> Select your image</label>
        <input name="img" type="file" accept="image">
        <button>submit</button>
    </form>
</body>
</html>