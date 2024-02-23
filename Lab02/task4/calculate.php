<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="task4.css">
</head>
<body>
    <?php
    require_once("Functions/func.php");

    $x = $_POST["x"] ?? 0;
    $y = $_POST["y"] ?? 0;
     ?>

    <table>
        <tr>
            <td>
                sin(x):
            </td>
            <td>
                <?=my_sin($x);?>
            </td>
        </tr>
        <tr>
            <td>
                cos(x):
            </td>
            <td>
                <?=my_cos($x);?>
            </td>
        </tr>
        <tr>
            <td>
                tg(x):
            </td>
            <td>
                <?=my_tg($x);?>
            </td>
        </tr>
        <tr>
            <td>
                x!:
            </td>
            <td>
                <?=factorial($x);?>
            </td>
        </tr>

        <tr>
            <td>
                x^y:
            </td>
            <td>
                <?=my_pow($x, $y);?>
            </td>
        </tr>
    </table>
</body>
</html>