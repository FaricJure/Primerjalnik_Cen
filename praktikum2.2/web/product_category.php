<?php
/**
 * Created by IntelliJ IDEA.
 * User: eftimije
 * Date: 02.6.2019
 * Time: 23:21
 */

include "header.php";

// echo $_GET['selected'];

$selected=$_GET['selected'];


$productQuery = "Select product.id as productId,product.name as productName ,store.name as sotreName,product.price as price ,product.image_url as image 
    from product 
    join product_store on product.id=product_store.product_id 
    join store on store.id=product_store.store_id 
    join category on category.id=product.category_id
    where category.name='$selected'
    group by product.name";
$products = $conn->query($productQuery)->fetchAll();


?>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title"><?php echo $selected ?></h3>
                <!-- section title -->
                <!-- <div class="col-md-12">
                     <div class="section-title">
                         <h3 class="title">New Products</h3>
                         <div class="section-nav">
                             <ul class="section-tab-nav tab-nav">
                                 <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                 <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                 <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                 <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- /section title -->

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

<?php include  "footer.php"; ?>