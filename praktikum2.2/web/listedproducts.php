<?php
/**
 * Created by IntelliJ IDEA.
 * User: eftimije
 * Date: 05.6.2019
 * Time: 08:38
 */
include  "header.php";
if(isset($_SESSION['id'])){
    $uid=$_SESSION['id'];
    $sql="Select product.id as productId , product.name as productName ,store.name as sotreName,product.price as price ,product.image_url as image 
               from product join product_store on product.id=product_store.product_id 
               join store on store.id=product_store.store_id
               where product.user_id='$uid'";
    $products=$conn->query($sql)->fetchAll();
    ?>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title">Your products</h3>
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
    <?php
}
include "footer.php"
?>