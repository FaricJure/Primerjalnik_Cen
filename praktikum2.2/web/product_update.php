<?php

include "dbh.inc.php";
$storesQuery = "SELECT * FROM store";
$stores = $conn->query($storesQuery)->fetchAll();

$categoryQuery = "SELECT * FROM category";
$categories = $conn->query($categoryQuery)->fetchAll();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $editQuery = $conn->query("Select * from product where id='$productId'");
    $product = $editQuery->fetch();
    //print_r($product);
}
if (isset($_POST['edit'])) {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $categoryId = $_POST['category'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $storeId = $_POST['store'];
    $description = $_POST['description'];
    $query = $conn->query("Update product SET name = '$productName', category_id = '$categoryId', price = '$price', image_url = '$image',description = '$description',update_time=CURRENT_TIMESTAMP where  id = '$productId'");
    //print_r ($query);
    $query->execute();

    $izberiUporabnike="SELECT `user_id` FROM `wishlist` WHERE `product_id`=$productId";
    $izberiUporabnike2=$conn->query($izberiUporabnike)->fetchAll();
    foreach ($izberiUporabnike2 as $uporabnik):
        $u=$uporabnik["user_id"];
        $addAlert=$conn->prepare("UPDATE `user` SET `alert` = '1' WHERE `user`.`id` =  $u");
        $addAlert->execute();
    endforeach;


    header("Location:index.php");
    exit();
}
include "header.php";
?>

    <div class="container">
        <!-- row -->
        <div class="row col-sm-6 product-details">
            <div class="section-title">
                <h3 class="title">Edit Product</h3>
            </div>
            <form method="post">
                <div class="form-group">
                    <input class="input" type="text" name="name" value="<?php echo $product['name'] ?>">
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <div class="dropdown">
                            <label>Category</label>
                            <select class="btn btn-primary dropdown-toggle" name="category" required>
                                <span class="caret"></span>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category['id'] ?>"
                                            selected><?php echo $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <div class="dropdown">
                            <label>Store</label>
                            <select class="btn btn-primary dropdown-toggle" name="store">
                                <?php foreach ($stores as $store) { ?>
                                    <option value="<?php echo $store['id'] ?>"
                                            selected><?php echo $store['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <div class="form-group">
                    <input class="input" type="number" name="price" step="0.01" min="0" placeholder="Price" value="<?php echo $product['price'] ?>">
                </div>
                <div class="form-group">
                    <input class="input" type="number" name="barcode" value="<?php echo $product['barcode'] ?>" placeholder="Barcode">
                </div>
                <textarea id="subject" name="description" placeholder="Description" value="<?php echo $product['description'] ?>"
                          style="height:200px;width:100%"></textarea>
                <br><br>

                <br>
                <input type="hidden" name="id" value="<?php echo $productId ?>" />
                <input class="primary-btn cta-btn" type="submit" name="edit">
                <br><br>
            </form>
        </div>
    </div>

<?php
include "footer.php";
?>