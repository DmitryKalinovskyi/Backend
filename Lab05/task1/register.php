<?php

session_start();

$messages = [];
$current_page = 'Register';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // try to register user

    // load data from database and render it for user.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("INSERT INTO USERS(Name, Surname, Age, Email, Password)
VALUES (:name, :surname, :age, :email, :password)");

        $stmt->execute(['name' => $name, 'surname' => $surname, 'age' => $age,
            'email' => $email, 'password' => $password]);

        $messages[] = "Registered successfully";
    }
    catch(PDOException $e) {
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

    <form action="register.php" method="post" class="container">
        <table>
            <tr>
                <td>
                    <label for="nameField">Name:</label>

                </td>
                <td>
                    <input id="nameField" name="name">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="surnameField">Surname:</label>
                </td>
                <td>
                    <input id="surnameField" name="surname">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ageField">Age:</label>

                </td>
                <td>
                    <input id="ageField" name="age">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="emailField">Email:</label>

                </td>
                <td>
                    <input id="emailField" name="email" type="email">

                </td>
            </tr>
            <tr>
                <td>
                    <label for="passwordField">Password:</label>

                </td>
                <td>
                    <input id="passwordField" name="password" type="password">

                </td>
            </tr>
        </table>

        <button class="btn btn-primary mt-4">Register</button>

    </form>
</body>
</html>
