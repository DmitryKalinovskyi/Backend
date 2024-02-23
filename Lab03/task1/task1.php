<?php require_once "task1.cookies.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    header("Location: task1.php");
    exit();
}

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

    <a href="task1.2.php">Next page</a>

    <?php
        function isChecked($val): bool{
            return ($_COOKIE[FONT_SIZE_COOKIE] ?? '') === $val;
        }



    ?>
    <form method="post" style="margin-top: 200px">
        <div>
            <input id="fsmn" name="fs" type="radio" value="mn" <?php if(isChecked('mn')) echo "checked"?>>
            <label for="fsmn">Minimum size</label>
        </div>
        <div>
            <input id="fsmd" name="fs" type="radio" value="d" <?php if(isChecked('d')) echo "checked"?>>
            <label for="fsmd">Default size</label>
        </div>
        <div>
            <input id="fsmx" name="fs" type="radio" value="mx" <?php if(isChecked('mx')) echo "checked"?>>
            <label for="fsmx">Maximum size</label>
        </div>
        <button>update</button>
    </form>
</body>
</html>