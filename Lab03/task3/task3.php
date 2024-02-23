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
<?php

function sortFileContent($path): void{
    $data = "";
    $file = fopen($path, 'r+');

    while(!feof($file)){
        $data.=fgets($file);
    }

    rewind($file);


    // sort data and set
    $data = explode(" ", $data);
    sort($data, SORT_STRING);
    $data = join(" ", $data);

    fwrite($file, $data);

    fclose($file);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    sortFileContent('sortTest.txt');
}

?>

<form method="post">
    <button>Sort file </button>
</form>
</body>
</html>