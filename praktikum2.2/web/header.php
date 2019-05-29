<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is example">
    <meta name=viewport content="width=device-width" inital-scale="1">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="skripta.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <title></title>
</head>

<body class="container">
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['id'])) { ?>
                <?php if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']) { ?>
                    <li><a href="add_product.php">Add product</a></li>
                <?php } ?>
                <li><a href="products.php">Products</a></li>
                <li>
                    <form action="logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </li>
                <?php } else { ?>
                <li><a href="#" id="login">Login</a></li>
                <li><a href="signup.php">Register</a></li>
            <?php } ?>

                <ul style="display: block">
                    <li><a href="product_category.php?category=Milk">Milk</a></li>
                    <li><a href="product_category.php?category=Bread">Bread</a></li>
                    <li><a href="product_category.php?category=Chocolate">Chocolate</a></li>
                    <li><a href="product_category.php?category=Vegetables">Vegetables</a></li>
                    <li><a href="product_category.php?category=Fruit">Fruit</a></li>
                </ul>
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
