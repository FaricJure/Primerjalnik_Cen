<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is example">
    <meta name=viewport content="width=device-width" inital-scale="1">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- END BOOTSTRAP -->

    <link rel="stylesheet" type="text/css" href="style.css"/>

    <title>Primerjalnik Cen</title>
</head>

<body class="container-fluid">
<header>
    <nav class="row navbar navbar-dark bg-dark">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <!-- If user is logged in -->
            <?php if (isset($_SESSION['id'])) { ?>
                <!-- If user is admin -->
                <?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']) { ?>
                <?php } ?>
                <!-- END -->
                <li class="nav-item"><a class="nav-link" href="add_product.php">Add product</a></li>
            <?php } ?>
            <!-- END -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="products.php" role="button"
                   aria-haspopup="true" aria-expanded="false">Products</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="product_category.php?category=Milk">Milk</a>
                    <a class="dropdown-item" href="product_category.php?category=Bread">Bread</a>
                    <a class="dropdown-item" href="product_category.php?category=Chocolate">Chocolate</a>
                    <a class="dropdown-item" href="product_category.php?category=Vegetables">Vegetables</a>
                    <a class="dropdown-item" href="product_category.php?category=Fruit">Fruit</a>
                </div>
            </li>
        </ul>

        <ul class="nav justify-content-end">
            <?php if (isset($_SESSION['id'])) { ?>
                <li class="nav-item">
                    <form class="nav-link" action="logout.inc.php" method="post">
                        <button class="btn btn-link" type="submit" name="logout-submit">Logout</button>
                    </form>
                </li>
            <?php } else { ?>
                <li class="nav-item"><a class="nav-link" href="#" id="login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="signup.php">Register</a></li>
            <?php } ?>
        </ul>


        <div id="loginModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-body">
                <form action="login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/E-mail..." class="row">
                    <input type="password" name="pwd" placeholder="Password..." class="row">
                    <button type="submit" name="login-submit">Login</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="container">