<?php

session_start();

function getAuthor($blog){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users where Id = :id");

        $stmt->execute(['id' => $blog['OwnerId']]);

        return $stmt->fetch();
    }
    catch(PDOException $e){
    }
    return null;
}
function renderBlogs(){
    // check if menu was updated after buffering, if was, then update buffer

    ob_start();
    echo "<div class='row gx-3 gy-3'>";
    foreach(getBlogs() as $blog){
        $id = $blog['Id'];
        $name = $blog['Name'];
        $contentJson = $blog['Content'];
        $content = json_decode($contentJson);
        $author = getAuthor($blog);

        $authorName = $author['Name'];
        echo "
            <div class='col-3'>
                <div class='card'>
                <div class='card-body'>
                    <h5>$name</h5>
                    <p>Author: $authorName</p>
                    <p class='mt-3'>$content</p>
                    <a class='btn btn-primary'>Check blog</a>
                </div>
                </div>
            </div>";
    }

    echo "</div>";

    return ob_get_contents();
}

function getBlogs(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM blogs");
        $stmt->execute();

        return $stmt->fetchAll();
    }
    catch(Exception $e){
    }

    return [];
}

?>

<?php

$current_page = 'Menu';


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<?php include_once("header.php") ?>

<div class="container">
    <h2>Menu:</h2>
    <?php renderBlogs()?>
</div>

<?php if(isset($_SESSION['LOGGED_IN'])): ?>
<div  class="container mt-5">
    <h2>Add new</h2>
    <form action="crud/insertBlog.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="nameField">Name:</label>
                </td>
                <td>
                    <input class="form-control" id="nameField" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contentField">Content:</label>
                </td>
                <td>
                    <input class="form-control" id="contentField" name="content">
                </td>
            </tr>
        </table>

        <button class="btn btn-primary mt-4">Add</button>
    </form>
</div>
<?php endif; ?>
</body>
</html>
