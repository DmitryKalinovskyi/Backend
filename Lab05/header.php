<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" <?php echo ariaCurrent("Products") ?> href="products.php">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" <?php echo ariaCurrent("Employees") ?> href="employees.php">Employees</a>
                </li>
                <?php
                function ariaCurrent($name){
                    global $current_page;
//                    var_dump([$name, $current_page]);
                    return $name === $current_page? 'aria-current="page"' : "";
                }
                ?>
                <?php if(isset($_SESSION['LOGGED_IN'])): ?>

                    <li class="nav-item">
                        <a class="nav-link active" <?php echo ariaCurrent("My profile") ?> href="myprofile.php">My profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  href="logout.php">Log Out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="login.php " <?php echo ariaCurrent("Log in") ?>class="nav-link active">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" <?php echo ariaCurrent("Register") ?>class="nav-link active">Register</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>