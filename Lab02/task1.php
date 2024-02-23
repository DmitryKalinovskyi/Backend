<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="task">
        <div class="task-header">
            Task 1
        </div>

        <?php
            $text = $_POST["text"] ?? "";
            $find = $_POST["find"] ?? "";
            $change = $_POST["change"] ?? "";

            $result = str_replace($find, $change, $text);

            echo "
                <form method='post'>
                    <div>
                        <label >Text: </label>
                        <input name='text' value='{$text}'>
                    </div> 
                    <div>
                        <label >Find: </label>
                        <input name='find' value='{$find}'>
                    </div> 
                    <div>
                        <label >Change: </label>
                        <input name='change' value='{$change}'>
                    </div> 
                    <div>
                        <label >Result: </label>
                        <input readonly value='{$result}'>
                    </div> 
                    <button>
                        Replace
                    </button>
                </form>
            ";



        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 2
        </div>

        <?php
        $cities = $_POST["cityfield"] ?? "";

        if(isset($cities)){
            // replace with sorted strings

            $cities_array = explode(" ", $cities);

            sort($cities_array, SORT_STRING);

            $cities = join(" ", $cities_array);
        }

        // display form with value
        echo "
            <form method='post' action=''>
                <label for=\"cityfield1\">Enter cities</label>
                <input id=\"cityfield1\" name='cityfield' value='{$cities}'>
                <button>Enter</button>
            </form>
        ";
        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 3
        </div>

        <?php
        $file_location =  $_POST['file-location'] ?? "";



        echo "
            <form method='post'>
                <label for='file-location'>Enter file location: </label>
                <input id='file-location' name='file-location' value='{$file_location}'>
            </form>
        ";

        $filename = pathinfo($file_location, PATHINFO_FILENAME);

        echo $filename;

        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 4
        </div>

        <?php
        // display form

        $date1_field =  $_POST['date-1'] ?? "";
        $date2_field =  $_POST['date-2'] ?? "";

        echo "
            <form method='post'>
                <label for='date-1'>Date 1</label>
                <input id=\"date-1\" name='date-1' value='{$date1_field}'>
                <label for='date-2'>Date 2</label>
                <input id=\"date-2\" name='date-2' value='{$date2_field}'>
                <button>Submit</button>
            </form>
        ";

        function strToDate($str): DateTime{
            $vars = explode("-", $str);

            return date_create("{$vars[2]}-{$vars[1]}-{$vars[0]}");
        }

        if(isset($_POST['date-1']) and isset($_POST['date-2'])){
            $date1 = strToDate($_POST['date-1']);
            $date2 = strToDate($_POST['date-2']);
            $diff = date_diff($date2, $date1);
            echo "
                <div>
                    Difference in days: {$diff->days}
                </div>
            ";
        }

        ?>
    </div>

    <div class="task">
        <div class="task-header">
            Task 5
        </div>
        <?php
        const CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
        function generatePassword($len = 12): string{
            $bucket = "";
            for($i = 0; $i < $len; $i++){
                $bucket .= CHARS[rand(0, strlen(CHARS) - 1)];
            }

            return $bucket  ;
        }

        function haveUpper($str): bool{
            foreach(str_split($str) as $el){
                if(ctype_upper($el)) return true;
            }

            return false;
        }

        function haveLower($str): bool{
            foreach(str_split($str) as $el){
                if(ctype_lower($el)) return true;
            }

            return false;
        }

        function haveSpecial($str): bool{
            return (bool) preg_match('/[!@#$%\^&*()-_]/', $str);
        }

        function haveNumber($str): bool{
            return (bool) preg_match('/[1234567890]/', $str);
        }

        function getPasswordStrength($password): int{
            $points = 0;

            if(strlen($password) >= 8) $points++;

            if(haveUpper($password)) $points++;
            if(haveLower($password)) $points++;

            if(haveNumber($password)) $points++;
            if(haveSpecial($password)) $points++;
            return $points;
        }

        $generated_password = generatePassword();
        $strength = getPasswordStrength($generated_password);

        echo "
            <div>
                Password: {$generated_password}
                Strength: {$strength}/5
            </div>
        ";
        ?>
    </div>
</body>
</html>