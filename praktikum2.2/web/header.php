<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 01.6.2019
 * Time: 14:32
 */
session_start();
require 'dbh.inc.php';

$categoryQuery = "SELECT * FROM category";
$categories = $conn->query($categoryQuery)->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>PriceComparer</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">

                <li><a href="add_product.php"><i class="fa fa-plus"></i> Add new product</a></li>
                <li><a href="#"><i class="fa fa-list"></i> Your listed products</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>

                <li class="nav-item">
                    <form action="logout.inc.php" method="post">
                <li><a type="submit" href="logout.inc.php" name="logout-submit"><i class="fa fa-sign-out"></i>Logout</a></li>
                    </form>
                </li>

                <li class="nav-item"><a class="nav-link" href="login.php" id="login"><i class="fa fa-sign-in"></i>Login</a></li>
                <li><a href="signup.php"><i class="fa fa-user-plus"></i>Signup</a></li>
            </ul>

        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">

                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="img/slika.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="category_products.php" method="post">
                            <select name="selected" class="input-select">
                                <option value="0">All Categories</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="1"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button type="submit" name="category" class="search-btn">Search</button>

                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->


                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div>
                            <a href="#">
                                <i class="fa fa-barcode"></i>
                                <span>Scan barcode</span>
                            </a>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#">Categories</a></li>
                <?php "TUKA".$_SESSION['id']; ?>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->