<?php
function tokenize($path): array
{
    $file = fopen($path, 'r');

    $data = fread($file, filesize($path));
    fclose($file);

    return explode(' ', $data);
}

function writeArray($path, $arr): void{
    $file = fopen($path, 'w');

    fwrite($file, join(' ', $arr));

    fclose($file);
}


function writeInfo(): void
{
    $a = tokenize("task2/input1.txt");
    $b = tokenize("task2/input2.txt");

    writeArray("task2/input3.txt", array_diff($a, $b));
    writeArray("task2/input4.txt", array_intersect($a, $b));

    $words = array_count_values(array_merge($a, $b));
    $words_res = [];

    foreach($words as $key => $value){
        if($value >= 2) $words_res[] = $key;
    }

    writeArray("task2/input5.txt", $words_res);
}


writeInfo();


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

</body>
</html>