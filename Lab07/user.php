<?php

session_start();

$current_page = 'My profile';

$messages = [];

// load data from database and render it for user.
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    if(empty($id))
    {
        header("Location: index.php");
        die();
    }

    $stmt = $pdo->prepare("SELECT Name, Surname, Age FROM USERS WHERE Id = :id");
    $stmt->execute(['id' => $id]);

    $user = $stmt->fetch();

    if(empty($user))
    {
        echo 404;
        die();
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    $messages[] = "<div style='color: white; background-color: red'>$msg</div>";
}
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

<?php echo $_SESSION['captured_messages'] ?>

<?php //foreach($messages as $message): ?>
<!--    <div>--><?php //echo $message?><!--</div>-->
<?php //endforeach;?>

<div class="container">

    <table>
        <tr>
            <td>
                <label for="nameField">Name:</label>
            </td>
            <td>
                <?php echo $user['Name'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="surnameField">Surname:</label>
            </td>
            <td>
                <?php echo $user['Surname'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="ageField">Age:</label>

            </td>
            <td>
                <?php echo $user['Age'] ?>

            </td>
        </tr>
    </table>

    <?php if(isset($_SESSION['LOGGED_IN']) && $_SESSION['USER_ID'] == $id): ?>
        <a class="btn btn-primary mt-4" href="updateUser.php">Update profile</a>
    <?php endif ?>
</div>

</body>
</html>
