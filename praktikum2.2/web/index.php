<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 01.6.2019
 * Time: 14:32
 */
?>

<?php
require 'header.php';
$productQuery = "Select product.id as productId,product.name as productName ,store.name as sotreName,product.price as price ,product.image_url as image 
    from product 
    join product_store on product.id=product_store.product_id 
    join store on store.id=product_store.store_id
    group by product.name";
$products = $conn->query($productQuery)->fetchAll();

?>


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title">New Products</h3>
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- products -->
                                    <?php foreach ($products as $product): ?>
                                        <?php include 'product_item.php' ?>
                                    <?php endforeach; ?>
                                    <!-- /products -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title">Top products</h3>

                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- products -->
                                    <?php foreach ($products as $product): ?>
                                        <?php include 'product_item.php' ?>
                                    <?php endforeach; ?>
                                    <!-- /products -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


<?php require 'footer.php' ?>

