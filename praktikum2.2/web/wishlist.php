<?php
/**
 * Created by IntelliJ IDEA.
 * User: eftimije
 * Date: 04.6.2019
 * Time: 13:24
 */

/*session_start();
include "dbh.inc.php";
*/
include "dbh.inc.php";
if (isset($_GET['pid'])) {
    if ($_GET['uid']) {

        $time = date_default_timezone_set("Europe/Ljubljana");
        $pid = $_GET['pid'];
        $uid = $_GET['uid'];

        $addInWishlist = $conn->prepare("INSERT INTO wishlist(product_id,user_id,date) VALUES(?,?,?)");
        $addInWishlist->execute([$pid, $uid, $time]);

       header("Location:index.php");

    } else {

    /*  $URL = "login.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';*/

       header('Location:login.php');

    }
}


include "header.php";


if(isset($_SESSION['id'])){

    $uid = $_SESSION['id'];

    $wishlist="Select product.id as productId,product.name as productName ,store.name as sotreName,product.price as price ,product.image_url as image 
               from user join wishlist on user.id=wishlist.user_id 
               join product on product.id=wishlist.product_id
               join product_store on product.id=product_store.product_id 
               join store on store.id=product_store.store_id
               where wishlist.user_id='$uid'";

    $products = $conn->query($wishlist)->fetchAll();


}

?>

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <h3 class="title">Products in your wishlist</h3>
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


<?php include "footer.php" ?>