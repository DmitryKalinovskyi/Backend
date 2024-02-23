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
session_start();
?>
    <form enctype="multipart/form-data" method="post" action="profile.php">
        <table>
            <tr>
                <td>
                    <label for="login">Login: </label>
                </td>
                <td>
                    <input id="login" name="login" value="<?=$_SESSION["login"]?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password: </label>
                </td>
                <td>
                    <input id="password" name="password" type="password">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="password2">Password (again): </label>
                </td>
                <td>
                    <input id="password2" name="password2" type="password">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Sex: </label>
                </td>
                <td>
                    <?php
                    function Af($a){
                        if($a == ($_SESSION["sex"] ?? "")) return "checked";
                        return "";
                    }

                    ?>
                    <input id="sex1" name="sex" type="radio" value="male" <?=Af("male")?>>
                    <label for="sex1">male </label>
                    <input id="sex2" name="sex" type="radio" value="female" <?=Af("female")?>>
                    <label for="sex2">female </label>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="city">City: </label>
                </td>
                <td>
                    <?php
                    function Bf($a){
                        if($a == ($_SESSION['city'] ?? ""))return "selected";
                        return "";
                    }

                    ?>
                    <select id="city" name="city" >
                        <option value="Zhytomyr" <?=Bf("Zhytomyr")?>>Zhytomyr</option>
                        <option value="Kyiv" <?=Bf("Kyiv")?>>Kyiv</option>
                        <option value="Baranivka" <?=Bf("Baranivka")?>>Baranivka</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Favorite games: </label>
                </td>
                <td>
                    <?php
                    function isChecked($prop, $value): string{
                        print_r(($_SESSION[$prop] ?? ""));

                        if(empty($_SESSION[$prop])) return "";
                        if(in_array($value, $_SESSION[$prop]))
                            return "checked";
                        return "";
                    }

                    ?>

                    <div>
                        <input id="fav-game-1" name="fav-games[]" type="checkbox" value="football" <?=isChecked("checkbox", "Football")?>>
                        <label for="fav-game-1">Football</label>
                    </div>
                    <div>
                        <input id="fav-game-2" name="fav-games[]" type="checkbox" value="basketball" <?=isChecked("checkbox", "Basketball")?>>
                        <label for="fav-game-2">Basketball</label>
                    </div>
                    <div>
                        <input id="fav-game-3" name="fav-games[]" type="checkbox" value="volleyball" <?=isChecked("checkbox", "Volleyball")?>>
                        <label for="fav-game-3">Volleyball</label>
                    </div>
                    <div>
                        <input id="fav-game-4" name="fav-games[]" type="checkbox" value="chess" <?=isChecked("checkbox", "Chess")?>>
                        <label for="fav-game-4">Chess</label>
                    </div>
                    <div>
                        <input id="fav-game-5" name="fav-games[]" type="checkbox" value="world of tanks" <?=isChecked("checkbox", "World of tanks")?>>
                        <label for="fav-game-5">World of Tanks</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="about-yourself">About yourself: </label>
                </td>
                <td>
                    <textarea id="about-yourself" name="about-yourself" >
                        <?=$_SESSION["about-yourself"] ?? ''?>
                    </textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="picture">Picture: </label>
                </td>
                <td>
                    <input id="picture" name="picture" type="file">
                </td>
            </tr>
        </table>
        <button type="submit">
            Register
        </button>
    </form>

<a href="index.php?language=uk">
    ukrainian
</a>
<a href="index.php?language=de">
    deutch
</a>
<?php
    if(isset($_GET["language"])){
        $_SESSION["language"] = $_GET["language"];
    }

    $selected = $_SESSION["language"] ?? "en";

    echo "
        <div>
            Selected language: {$selected}
        </div>
    "
?>
</body>
</html>