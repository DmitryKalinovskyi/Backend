<?php

/** @var User $user */

use MVCExample\models\User;

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

<div>
    <div>
        User id: <?php echo $user->id ?>
    </div>
    <div>
        User name: <?php echo $user->name ?>
    </div>
    <div>
        User surname: <?php echo $user->surname ?>
    </div>
</div>
</body>
</html>