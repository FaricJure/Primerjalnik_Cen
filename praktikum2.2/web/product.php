<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 01.6.2019
 * Time: 14:32
 */
?>



<?php

include "dbh.inc.php";

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productQuery = $conn->query("SELECT * FROM product WHERE id='$productId'");
    $product = $productQuery->fetch();
    $storeName = $_GET['store'];
    $productName = $_GET['name'];
    $a="select min(price) as 'pri' from product where name='$productName' ";
    $b="select max(price) as 'pri2' from product where name='$productName' ";

    // Get product visits from database, and update.
    $visitsUpdated = $product['visits'] + 1;
    $conn->query("UPDATE product SET visits = '$visitsUpdated' WHERE id = '$productId'")->execute();

    $otherStores = $conn->query("Select store.name as storeName ,product.price as productPrice, product.id as productId , store.img_url as slika from store 
     join product_store on store.id=product_store.store_id 
     join product on product_store.product_id=product.id where product.name='" . $productName . "' ");

    $otherStores->execute();
    $otherStores->setFetchMode(PDO::FETCH_OBJ);
    $stores = [];

    $storesCount = null;
    while ($row = $otherStores->fetchObject()) {
        $stores[] = $row;
        $stores++;
    }
}
$result=$conn->query($a);
$result->execute();
$vrednosti=array();

foreach ($result as $nekaj):
    array_push($vrednosti,$nekaj['pri']);
endforeach;

$d=$conn->query($b);
$d->execute();
foreach ($d as $nekaj):
    array_push($vrednosti,$nekaj['pri2']);
endforeach;

$vrednosti[2]=$vrednosti[1]-$vrednosti[0];
$vrednosti[3]=($vrednosti[2]/$vrednosti[1])*100;
//print_r($vrednosti);



if (isset($_POST['delete'])) {
    $productId = $_POST['id'];
    $sql = $conn->query("DELETE FROM product WHERE id ='$productId'");
    $sql->execute();
    header("Location: index.php");
    exit();
}

include "header.php";
?>

    <!-- SECTION -->
    <div class="section">
    <!-- container -->



    <div class="container">
    <!-- row -->
    <div class="row">
    <!-- Product main img -->
    <div class="col-md-5">
        <div id="product-main-img">
            <div class="product-preview">
                <?php $id=$product['id']; ?>
                <img src="<?php echo "showimage.php?id=$id";    $product['id'];?>" alt="">

            </div>
        </div>
    </div>


    <!-- Product details -->
    <div class="col-md-5">
        <div class="product-details">
            <h2 class="product-name"><?php echo $product['name'] ?></h2>
            <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1)  { ?>

            <div class="buttons-manage">
                <div class="row">
                    <div class="col-md-2">
                        <form method="get" action="product_update.php">
                            <input type="hidden" name="id" value="<?php echo $productId ?>" />
                            <button class="btn btn-sm btn-primary" name="edit"><i class="fa fa-pencil" ></i> Edit</button>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $productId ?>" />
                            <button class="btn btn-sm btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div>
                <h3 class="product-price">Price differential: <?php echo round($vrednosti[3],2)?> %</h3>
<!--                <span class="product-available">In Stock</span>-->
            </div>

            <ul class="product-btns">
                <li><a href="wishlist.php?pid=<?php  ?>&uid=<?php echo $_SESSION['id']?>"><i class="fa fa-heart-o"></i> add to wishlist</a></li>

            </ul>

            <ul class="product-shops">
                <?php
                foreach ($stores as $store):

                    if($store->$storeName='Merkator'){

                        ?>


                        <li>

                            <a href="map.php?store=<?php echo $store->storeName; ?>"><img src="<?php echo $store->slika ?>"><?php echo $store->storeName ?></a>
                            <b class="product-price pull-right" style="margin-top: 35px"><i class="fa fa-euro"></i> <?php echo $store->productPrice ?></b>
                        </li>
                        <hr>
                        <?php
                        continue;

                    }
                    elseif ($store->storeName='Tus'){
                        ?>

                        <li>
                            <a href="href="map.php?store=<?php echo $store->storeName; ?>""><img src="<?php echo $store->slika ?>"><?php echo $store->storeName ?></a>
                            <b class="product-price pull-right"><i class="fa fa-euro"></i> <?php echo $store->productPrice ?></b>
                        </li>



                        <?php

                        break;
                    }
                    elseif ($store->storeName='Hofer'){
                        ?>

                        <li>
                            <a href="href="map.php?store=<?php echo $store->storeName; ?>""><img src="<?php echo $store->slika ?>"><?php echo $store->storeName ?></a>
                            <b class="product-price pull-right"><i class="fa fa-euro"></i> <?php echo $store->productPrice ?></b>
                        </li>



                        <?php

                        break;
                    }
                    elseif ($store->storeName='Spar'){
                        ?>

                        <li>
                            <a href="href="map.php?store=<?php echo $store->storeName; ?>""><img src="<?php echo $store->slika ?>"><?php echo $store->storeName ?></a>
                            <b class="product-price pull-right"><i class="fa fa-euro"></i> <?php echo $store->productPrice ?></b>
                        </li>



                        <?php

                        break;
                    }
                endforeach;
                ?>

            </ul>





        </div>
    </div>
    <!-- /Product details -->

    <!-- Product tab -->
    <div class="col-md-12">
        <div id="product-tab">
            <!-- product tab nav -->
            <ul class="tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

                <li><a data-toggle="tab" href="#tab3"></a></li>
            </ul>
            <!-- /product tab nav -->

            <!-- product tab content -->
            <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php echo $product['description'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- /tab1  -->

                <!-- tab2  -->

                <!-- /tab2  -->
<!---->
<!--                <!-- tab3  -->
<!--                <div id="tab3" class="tab-pane fade in">-->
<!--                    <div class="row">-->
<!--                        <!-- Rating -->
<!--                        <div class="col-md-3">-->
<!--                            <div id="rating">-->
<!--                                <div class="rating-avg">-->
<!--                                    <span>4.5</span>-->
<!--                                    <div class="rating-stars">-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star"></i>-->
<!--                                        <i class="fa fa-star-o"></i>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <ul class="rating">-->
<!--                                    <li>-->
<!--                                        <div class="rating-stars">-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                        </div>-->
<!--                                        <div class="rating-progress">-->
<!--                                            <div style="width: 80%;"></div>-->
<!--                                        </div>-->
<!--                                        <span class="sum">3</span>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="rating-stars">-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                        </div>-->
<!--                                        <div class="rating-progress">-->
<!--                                            <div style="width: 60%;"></div>-->
<!--                                        </div>-->
<!--                                        <span class="sum">2</span>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="rating-stars">-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                        </div>-->
<!--                                        <div class="rating-progress">-->
<!--                                            <div></div>-->
<!--                                        </div>-->
<!--                                        <span class="sum">0</span>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="rating-stars">-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                        </div>-->
<!--                                        <div class="rating-progress">-->
<!--                                            <div></div>-->
<!--                                        </div>-->
<!--                                        <span class="sum">0</span>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="rating-stars">-->
<!--                                            <i class="fa fa-star"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                            <i class="fa fa-star-o"></i>-->
<!--                                        </div>-->
<!--                                        <div class="rating-progress">-->
<!--                                            <div></div>-->
<!--                                        </div>-->
<!--                                        <span class="sum">0</span>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <!-- /Rating -->

<!--                        <!-- Reviews -->
<!--                        <div class="col-md-6">-->
<!--                            <div id="reviews">-->
<!--                                <ul class="reviews">-->
<!--                                    <li>-->
<!--                                        <div class="review-heading">-->
<!--                                            <h5 class="name">John</h5>-->
<!--                                            <p class="date">27 DEC 2018, 8:0 PM</p>-->
<!--                                            <div class="review-rating">-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star-o empty"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="review-body">-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
<!--                                                do eiusmod tempor incididunt ut labore et dolore magna-->
<!--                                                aliqua</p>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="review-heading">-->
<!--                                            <h5 class="name">John</h5>-->
<!--                                            <p class="date">27 DEC 2018, 8:0 PM</p>-->
<!--                                            <div class="review-rating">-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star-o empty"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="review-body">-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
<!--                                                do eiusmod tempor incididunt ut labore et dolore magna-->
<!--                                                aliqua</p>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <div class="review-heading">-->
<!--                                            <h5 class="name">John</h5>-->
<!--                                            <p class="date">27 DEC 2018, 8:0 PM</p>-->
<!--                                            <div class="review-rating">-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star"></i>-->
<!--                                                <i class="fa fa-star-o empty"></i>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="review-body">-->
<!--                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
<!--                                                do eiusmod tempor incididunt ut labore et dolore magna-->
<!--                                                aliqua</p>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                                <ul class="reviews-pagination">-->
<!--                                    <li class="active">1</li>-->
<!--                                    <li><a href="#">2</a></li>-->
<!--                                    <li><a href="#">3</a></li>-->
<!--                                    <li><a href="#">4</a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- /Reviews -->

                        <!-- Review Form -->
<!--                        <div class="col-md-3">-->
<!--                            <div id="review-form">-->
<!--                                <form class="review-form">-->
<!--                                    <input class="input" type="text" placeholder="Your Name">-->
<!--                                    <input class="input" type="email" placeholder="Your Email">-->
<!--                                    <textarea class="input" placeholder="Your Review"></textarea>-->
<!--                                    <div class="input-rating">-->
<!--                                        <span>Your Rating: </span>-->
<!--                                        <div class="stars">-->
<!--                                            <input id="star5" name="rating" value="5" type="radio"><label-->
<!--                                                    for="star5"></label>-->
<!--                                            <input id="star4" name="rating" value="4" type="radio"><label-->
<!--                                                    for="star4"></label>-->
<!--                                            <input id="star3" name="rating" value="3" type="radio"><label-->
<!--                                                    for="star3"></label>-->
<!--                                            <input id="star2" name="rating" value="2" type="radio"><label-->
<!--                                                    for="star2"></label>-->
<!--                                            <input id="star1" name="rating" value="1" type="radio"><label-->
<!--                                                    for="star1"></label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <button class="primary-btn">Submit</button>-->
<!--                                </form>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- /Review Form -->
<!--                    </div>-->
<!--                </div>-->
<!--                <!-- /tab3  -->
            </div>
            <!-- /product tab content  -->
        </div>
    </div>
    <!-- /product tab -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <!--<div class="section">
        <!-- container -->
    <!--<div class="container">
        <!-- row -->
    <!--<div class="row">

        <div class="col-md-12">
            <div class="section-title text-center">
                <h3 class="title">Related Products</h3>
            </div>
        </div>

        <!-- products -->
<?php //include 'product_item.php' ?>
    <!-- /products -->

    <!--</div>
    <!-- /row -->
    <!--</div>
    <!-- /container -->
    <!--</div>
    <!-- /Section -->

<?php require 'footer.php' ?>