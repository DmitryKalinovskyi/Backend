<?php

    function getFromJson($path): mixed{
        $file = fopen($path, 'r');

        $readed = '';
        while(!feof($file)){
            $readed .= fgets($file);
        }
        fclose($file);

        return json_decode($readed);
    }

    function saveToJson($path, $data): void{
        $file = fopen($path, 'w');

        $encoded = json_encode($data);

        fwrite($file, $encoded);
        fclose($file);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $comment = ['name' => ($_POST['name'] ?? '') , 'description' => ($_POST['description'])];

        $obj = getFromJson('data.json');
        $obj->comments[] = $comment;
        saveToJson('data.json', $obj);
    }

    function displayComments(){
        $data = getFromJson('data.json');

        echo "<ul>";
        foreach($data->comments as $comment){
            echo "<li>".$comment->name.":".$comment->description."</li>";
        }
        echo "</ul>";
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
    <form method="post">
        <div>
            <label for="name">Name </label>
            <input id="name" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Enter your comment description"></textarea>
        </div>
        <button>Submit</button>
    </form>

    <?php

        displayComments();
    ?>
</body>
</html>