<?php
include "header.php";
require "dbh.inc.php";

//echo "<img src='showimage.php?id=40'>";

$storesQuery = "SELECT * FROM store";
$stores = $conn->query($storesQuery)->fetchAll();

$categoryQuery = "SELECT * FROM category";
$categories = $conn->query($categoryQuery)->fetchAll();


if (isset($_POST['product-submit'])) {
    $productName = $_POST['name'];
    $categoryId = $_POST['category'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];
    $image = $_FILES['image']['name'];
    $storeId = $_POST['store'];
    $description = $_POST['description'];
    $image2 =file_get_contents($_FILES['image']['tmp_name']);//podatki o sliki
    $subcategory = 1;
    $uid=$_SESSION['id'];

    $insertProduct = $conn->prepare("INSERT INTO product(name,price,barcode,image_url,category_id,description,subcategory_id,user_id,update_time,img) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $insertProduct->execute([$productName, $price, $barcode, $image, $categoryId, $description, $subcategory,$uid,'CURRENT_TIMESTAMP',$image2]);
    $productId = $conn->lastInsertId();

    $insertStore = $conn->prepare("INSERT INTO  product_store(product_id,store_id) VALUES(?,?)");
    $insertStore->execute([$productId, $storeId]);
}
?>
<div class="container">
    <!-- row -->
    <div class="row col-sm-6 product-details">
        <div class="section-title">
            <h3 class="title">Add Product</h3>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input class="input" type="text" name="name" placeholder="Name" required>
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
                        <select class="btn btn-primary dropdown-toggle" name="store" required>
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
                <input class="input" type="number" name="price" step="0.01" min="0" placeholder="Price" required>
            </div>
            <div class="form-group">
                <input class="input" type="number" name="barcode" value="<?php if (isset($_GET['koda'])) {
                    echo $_GET['koda'];
                } ?>" placeholder="Barcode" required>
            </div>
            <textarea id="subject" name="description" placeholder="Description"
                      style="height:200px;width:100%" ></textarea>
            <br><br>
            <input class="input" type="file" name="image" placeholder="Image URL" required>
            <br>
            <input class="primary-btn cta-btn" type="submit" name="product-submit">
            <br><br>
        </form>
    </div>
</div>


<?php require "footer.php" ?>
