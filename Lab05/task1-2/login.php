<?php

session_start();

$messages = [];
$current_page = 'Log in';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // handle login
    // select (id, password) from database with that email from users

    // load data from database and render it for user.
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT Id, Password FROM USERS WHERE Email = :email");

        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if($user !== false && $user['Password'] === $password){
            $_SESSION['LOGGED_IN'] = true;
            $_SESSION['USER_ID'] = $user["Id"];
            header("Location: myprofile.php");
        }
        else{
            $messages[] = "<div style='color: white; background-color: red'>Invalid login information.</div>";
        }
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
<form class="container" action="login.php" method="post">
    <table>
        <tr>
            <td>
                <label for="emailField">Email:</label>

            </td>
            <td>
                <input class="form-control" id="emailField" name="email" type="email">
            </td>
        </tr>
        <tr>
            <td>
                <label for="passwordField">Password:</label>

            </td>
            <td>
                <input class="form-control" id="passwordField" name="password" type="password">

            </td>
        </tr>
    </table>
    <button class="btn btn-primary mt-4">
        Log in
    </button>
</form>

</body>
</html>