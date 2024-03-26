<?php

session_start();

$current_page = 'Products';

$messages = [];

// load data from database and render it for user.
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab05;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM products");
    $stmt->execute();

    $products = $stmt->fetchAll();
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
<?php include_once("header.php")?>

<?php foreach($messages as $message): ?>
    <div><?php echo $message?></div>
<?php endforeach;?>

<div class="container">

    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Count</th>
            <th scope="col">Relealization Date</th>
            <th scope="col">*</th>
        </tr>
        <?php foreach($products as $product): ?>
            <tr>
                <td> <?php echo $product['Id'] ?></td>
                <td> <?php echo $product['Name'] ?></td>
                <td> <?php echo $product['Price'] ?></td>
                <td> <?php echo $product['Count'] ?></td>
                <td> <?php echo $product['RelealizationDate'] ?></td>
                <td>
                    <form action="crud/deleteProduct.php" method="post">
                        <input value="<?php echo $product['Id']?>" name="id" hidden>
                        <button class="btn btn-primary">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach?>
        <tr>
            <td></td>
            <td> <input form="insertProductForm" class="form-control" placeholder="Name" name="name"></td>
            <td> <input form="insertProductForm" class="form-control" placeholder="Price" name="price"></td>
            <td> <input form="insertProductForm" class="form-control" placeholder="Count" name="count"></td>
            <td> <input form="insertProductForm" class="form-control" placeholder="Relealization Date" type="date" name="relealizationDate"></td>
            <td><button form="insertProductForm" class="btn btn-primary">Add</button></td>
        </tr>
    </table>
    <form id="insertProductForm" action="crud/insertProduct.php" method="post">
    </form>

    <form action="crud/updateProduct.php" method="post">
        <table>
            <tr>
                <td>
                    <label for="idField">Id: </label>
                </td>
                <td>
                    <input class="form-control" id="idField" name="id">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nameField">Name: </label>
                </td>
                <td>
                    <input class="form-control" id="nameField" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="priceField">Price: </label>
                </td>
                <td>
                    <input  class="form-control"id="priceField" name="price">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="countField">Count: </label>
                </td>
                <td>
                    <input class="form-control"  id="countField" name="count">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="relealizationDateField">Relealization Date: </label>
                </td>
                <td>
                    <input class="form-control" id="relealizationDateField" name="relealizationDate" type="date">
                </td>
            </tr>
        </table>
            <button class="btn btn-primary">Update</button>
        </form>
</div>
</body>
</html>
