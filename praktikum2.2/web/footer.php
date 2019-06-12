<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 01.6.2019
 * Time: 14:32
 */

require 'dbh.inc.php';

$categoryQuery = "SELECT * FROM category";
$categories = $conn->query($categoryQuery)->fetchAll();
?>

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Price Comparer is a free website for comparing prices of products in different markets</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>2000 Maribor</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+386-75-510-840</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>price_comparer@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <?php foreach ($categories as $category): ?>
                                <li><a href="product_category.php?selected=<?php echo $category['name'] ?>"><?php echo $category['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="wishlist.php">Wishlist</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
