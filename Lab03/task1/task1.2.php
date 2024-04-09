<?php include_once "task1.cookies.php" ?>

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
function getFontSize(): int{
    return match ($_COOKIE[FONT_SIZE_COOKIE] ?? '') {
        "mn" => MINIMUM_FONT_SIZE,
        "mx" => MAXIMUM_FONT_SIZE,
        default => DEFAULT_FONT_SIZE,
    };
}
?>
<div style="font-size: <?php echo getFontSize()?>px">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci aperiam beatae consequatur cumque expedita illum ipsam non nulla recusandae. Consectetur dolore doloremque error explicabo magni maiores nulla optio vero!
</div>

<a href="task1.php">Prev page</a>
</body>
</html>