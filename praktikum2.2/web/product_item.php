<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bojana
 * Date: 02.6.2019
 * Time: 13:32
 */

?>

<form action="wishlist.php" method="get">
    <div class="product">
        <div class="product-img">
            <img src="<?php echo("img/" . trim($product['image'])) ?>" alt="<?php echo $product['productName'] ?>">
        </div>
        <div class="product-body">
            <!--<p class="product-category"><?php echo $product['subcategory'] ?></p>-->
            <h3 class="product-name"><a
                        href="product.php?name=<?php echo $product['productName'] ?>&id=<?php echo $product['productId'] ?>&store=<?php echo $product['storeName'] ?>"><?php echo $product['productName'] ?></a>
            </h3>
            <h4 class="product-price"><?php echo $product['price'] ?><i class="fa fa-euro"></i></h4>
            <div class="product-rating">
                <!-- <?php for ($i = 0; $i < $product['rating']; $i++): ?>
                <i class="fa fa-star"></i>
            <?php endfor; ?> -->
                <input type="hidden" name="uid" value="<?php if (isset($_SESSION['id'])) {
                    echo $_SESSION['id'];
                } ?>"/>
            </div>
            <div class="product-btns">
                <?php if (isset($_SESSION['id'])) { ?><button class="add-to-wishlist" type="submit" name="pid" value="<?php echo $product['productId'] ?>" ><i
                            class="fa fa-he art-o"></i><span class="tooltipp">add to wishlist</span></button>
                <?php  } ?>
                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                            class="tooltipp">add to compare</span></button>
                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">view product</span></button>
            </div>
        </div>
    </div>
</form>
