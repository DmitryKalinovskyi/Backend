<?php

session_start();

$current_page = 'My profile/update';

$messages = [];

if(empty($_SESSION['LOGGED_IN'])){
    header("Location: index.php");
    die();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_SESSION['USER_ID'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];

        $stmt = $pdo->prepare("UPDATE USERS Set Name = :name, Surname = :surname, Age = :age WHERE Id = :id");
        $stmt->execute(['name' => $name, 'surname' => $surname, 'age' => $age, 'id' => $id]);

        header("Location: myprofile.php");
        die();
    }
    catch(Exception $e){
        $msg = $e->getMessage();
        $messages[] = "<div style='color: white; background-color: red'>$msg</div>";
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // load data from database and render it for user.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_SESSION['USER_ID'];

        $stmt = $pdo->prepare("SELECT Name, Surname, Age FROM USERS WHERE Id = :id");
        $stmt->execute(['id' => $id]);

        $user = $stmt->fetch();
    }
    catch(Exception $e){
        $msg = $e->getMessage();
        $messages[] = "<div style='color: white; background-color: red'>$msg</div>";
    }
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
<?php include_once("header.php")?>

<?php foreach($messages as $message): ?>
    <div><?php echo $message?></div>
<?php endforeach;?>

<div class="container">

    <form action="updateUser.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="nameField">Name:</label>
                </td>
                <td>
                    <input id="nameField" name="name" value="<?php echo $user['Name']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="surnameField">Surname:</label>
                </td>
                <td>
                    <input id="surnameField" name="surname" value="<?php echo $user['Surname']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ageField">Age:</label>

                </td>
                <td>
                    <input id="ageField" name="age" value="<?php echo $user['Age']?>">
                </td>
            </tr>
        </table>
        <button class="btn btn-primary mt-4">Update</button>
        <a class="btn btn-danger  mt-4" href="myprofile.php">Don't change</a>

    </form>

    <form action="deleteAccount.php" method="post">
        <button class="btn btn-dark mt-5">Delete account</button>
    </form>

</div>

</body>
</html>
