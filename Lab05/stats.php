<?php

session_start();

$current_page = 'My profile';

$messages = [];

$pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function averageProductPrice(){

    global $pdo;

    $stmt = $pdo->query("SELECT AVG(Price) as averagePrice FROM products");

    $rawAvg = $stmt->fetch();

    return $rawAvg['averagePrice'];
}

function minProductPrice(){

    global $pdo;

    $stmt = $pdo->query("SELECT MIN(Price) as minPrice FROM products");

    $ravValue = $stmt->fetch();

    return $ravValue['minPrice'];
}

function maxProductPrice(){

    global $pdo;

    $stmt = $pdo->query("SELECT MAX(Price) as maxPrice FROM products");

    $ravValue = $stmt->fetch();

    return $ravValue['maxPrice'];
}

function totalProductsCount(){
    global $pdo;

    $stmt = $pdo->query("SELECT SUM(Count) as countSum FROM products");

    $rawCount = $stmt->fetch();

    return $rawCount['countSum'];
}

function totalEmployeesCount(){
    global $pdo;

    $stmt = $pdo->query("SELECT Count(*) as count FROM employees");

    $rawCount = $stmt->fetch();

    return $rawCount['count'];
}

function averageEmployeeSalary(){

    global $pdo;

    $stmt = $pdo->query("SELECT AVG(Salary) as averageSalary FROM employees");

    $rawAvg = $stmt->fetch();

    return $rawAvg['averageSalary'];
}

function minEmployeeSalary(){

    global $pdo;

    $stmt = $pdo->query("SELECT MIN(Salary) as minSalary FROM employees");

    $ravValue = $stmt->fetch();

    return $ravValue['minSalary'];
}

function maxEmployeeSalary(){

    global $pdo;

    $stmt = $pdo->query("SELECT MAX(Salary) as maxSalary FROM employees");

    $ravValue = $stmt->fetch();

    return $ravValue['maxSalary'];
}

function listOfPositionPopularity(){
    global $pdo;

    $stmt = $pdo->query("SELECT Position as position, Count(*) as count FROM employees GROUP BY Position");

    return $stmt->fetchAll();
}

function registerUsersCount(){
    global $pdo;

    $stmt = $pdo->query("SELECT Count(*) as count FROM users");

    $ravValue = $stmt->fetch();

    return $ravValue['count'];
}

//// load data from database and render it for user.
//try {
//
//
//    $id = $_GET['id'];
//
//    if(empty($id))
//    {
//        header("Location: index.php");
//        die();
//    }
//
//    $stmt = $pdo->prepare("SELECT Name, Surname, Age FROM USERS WHERE Id = :id");
//    $stmt->execute(['id' => $id]);
//
//    $user = $stmt->fetch();
//
//    if(empty($user))
//    {
//        echo 404;
//        die();
//    }
//}
//catch(Exception $e){
//    $msg = $e->getMessage();
//    $messages[] = "<div style='color: white; background-color: red'>$msg</div>";
//}
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

<?php foreach($messages as $message): ?>
    <div><?php echo $message?></div>
<?php endforeach;?>

<div class="container">
    <div>
        <h2>Products:</h2>

        <div>
            Total products count: <?php echo totalProductsCount() ?>
        </div>
        <div>
            Average product price: <?php echo round(averageProductPrice(), 2) ?>$
        </div>
        <div>
            Lowest product price: <?php echo round(minProductPrice(), 2) ?>$
        </div>
        <div>
            Highest product price: <?php echo round(maxProductPrice(), 2) ?>$
        </div>
    </div>

    <div class="mt-4">
        <h2>Employees:</h2>

        <div>
            Total employees count: <?php echo totalEmployeesCount() ?>
        </div>
        <div>
            Average employee salary: <?php echo round(averageEmployeeSalary(), 2) ?>$
        </div>
        <div>
            Lowest employee salary: <?php echo round(minEmployeeSalary(), 2) ?>$
        </div>
        <div>
            Highest employee salary: <?php echo round(maxEmployeeSalary(), 2) ?>$
        </div>
        <div>
            <table>
            <tr>
                <th>
                    Position
                </th>
                <th>
                    Count
                </th>
            </tr>
            <?php foreach(listOfPositionPopularity() as $positionCount): ?>
                <tr>
                    <td><?php echo $positionCount['position']?></td>
                    <td><?php echo $positionCount['count']?></td>
                </tr>
            <?php endforeach; ?>
            </table>
        </div>
<!--        <div>-->
<!--            Most popular employee positions: --><?php //echo maxProductPrice(), 2) ?>
<!--        </div>-->
    </div>
    <div class="mt-4">
        <h2>Users:</h2>

        <div>Registered users count: <?php echo registerUsersCount() ?> </div>
    </div>
</div>

</body>
</html>
