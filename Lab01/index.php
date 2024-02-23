<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="task">
        <div class="task-head">Завдання 1</div>

        <?php

        echo "
        Полину в мріях в купель океану, <br>
        Відчую <b>шовковистість</b> глибини, <br>
        &nbsp;Чарівні мушлі з дна собі дістану, <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Щоб <i><b>взимку</b></i> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>тішили</u>   <br>    
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;мене <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;вони…  ";


        ?>
    </div>

    <div class="task">
        <div class="task-head">Завдання 2</div>
        <?php
        $USDToUAH = 37.70;
        $UAHToUSD = 1 / $USDToUAH;

        $sumInUah = 1500;

        $ans = round($sumInUah * $UAHToUSD, 2);
        echo "<div>{$sumInUah}UAH Can be converted to: {$ans}$ </div>";
        ?>
    </div>

    <div class="task">
        <div class="task-head">Завдання 3</div>
        <?php
        $month = 10;

        function getMonthName($monthNum){
            if($monthNum == 1){
                return "January";
            } elseif($monthNum == 2) {
                return "February";
            } elseif($monthNum == 3) {
                return "March";
            } elseif($monthNum == 4) {
                return "April";
            } elseif($monthNum == 5) {
                return "May";
            } elseif($monthNum == 6) {
                return "June";
            } elseif($monthNum == 7) {
                return "July";
            } elseif($monthNum == 8) {
                return "August";
            } elseif($monthNum == 9) {
                return "September";
            } elseif($monthNum == 10) {
                return "October";
            } elseif($monthNum == 11) {
                return "November";
            } elseif($monthNum == 12) {
                return "December";
            } else {
                return "Invalid month number";
            }
        }

        echo "<div>month({$month}) - " . getMonthName($month) . "</div>";


        ?>
    </div>

    <div class="task">
        <div class="task-head">Завдання 4</div>

        <?php
            $letter = 'o';

            switch($letter){
                case 'a':
                case 'e':
                case 'o':
                case 'i':
                case 'u':
                case 'y':
                    echo "<div>letter {$letter} - is vowel </div>";
                    break;
                default:
                    echo "<div>letter {$letter} - is not vowel </div>";

            }

        ?>
    </div>

    <div class="task">
        <div class="task-head">Завдання 5</div>
        <?php
        $num = mt_rand (100, 300);

        $dig1 = floor($num / 100);
        $dig2 = floor($num / 10) % 10;
        $dig3 = $num % 10;

        echo "<div>dig1: {$dig1}</div>";
        echo "<div>dig2: {$dig2}</div>";
        echo "<div>dig3: {$dig3}</div>";


        $sum = $dig1 + $dig2 + $dig3;
        $rev = $dig3 * 100 + $dig2 * 10 + $dig1;

        function swap(&$a, &$b){
            $tmp = $a;
            $a = $b;
            $b = $tmp;
        }

        if($dig1 < $dig2)
            swap($dig1, $dig2);

        if($dig1 < $dig3)
            swap($dig1, $dig3);

        if($dig2 < $dig3)
            swap($dig2, $dig3);

        $sorted = $dig1 * 100 + $dig2 * 10 + $dig3;

        echo "<div>num: {$num}</div>";
        echo "<div>sum digits: {$sum}</div>";
        echo "<div>reverse: {$rev}</div>";
        echo "<div>max possible: {$sorted}</div>";
        ?>
    </div>

    <div class="task">
        <div class="task-head">Завдання 6</div>
        <?php
        function createTable($n){
            echo "<table>";

            for($i = 0; $i < $n; $i++){
                echo "<tr>";
                for($j = 0; $j < $n; $j++){
                    echo "<td><div class='cell'></div></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        createTable(6);

        $GLOBALS["MIN_WIDTH"] = 20;
        $GLOBALS["MAX_WIDTH"] = 50;
        $GLOBALS["CANVAS_WIDTH"] = 300;
        $GLOBALS["CANVAS_HEIGHT"] = 300;
        function createCell(){
            $a = mt_rand($GLOBALS["MIN_WIDTH"], $GLOBALS["MAX_WIDTH"]);

            $x = mt_rand(0, $GLOBALS["CANVAS_WIDTH"] - $a);
            $y = mt_rand(0, $GLOBALS["CANVAS_HEIGHT"] - $a);

            //create

            echo "<div class='canvas-cell' style='top: {$y}px; left: {$x}px; width: {$a}px; height: {$a}px;'></div>";
        }
        function createCanvasWithCells($n){
            echo "<div class='canvas'>";
            for($i = 0; $i < $n; $i++)
                createCell();
            echo "</div>";
        }
        createCanvasWithCells(10);
        ?>


    </div>



</body>
</html>