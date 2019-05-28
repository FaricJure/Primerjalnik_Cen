<?php
include "header.php";
require "dbh.inc.php";

$storesQuery = "SELECT * FROM store";
$stores = $conn->query($storesQuery)->fetchAll();

$categoryQuery = "SELECT * FROM category";
$categories = $conn->query($categoryQuery)->fetchAll();

if (isset($_POST['product-submit'])) {
    $productName = $_POST['name'];
    $categoryId = $_POST['category'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];
    $image = $_POST['image'];
    $storeId = $_POST['store'];

    $insertProduct = $conn->prepare("INSERT INTO product(name,price,barcode,image_url,category_id) VALUES (?,?,?,?,?)");
    $insertProduct->execute([$productName,$price,$barcode,$image,$categoryId]);
    $productId = $conn->lastInsertId();

    $insertStore=$conn->prepare("INSERT INTO  product_store(product_id,store_id) VALUES(?,?)");
    $insertStore->execute([$productId,$storeId]);
}
?>

<form method="post" >
    <label>Name</label>
    <input name="name" required>
    </br>
    <label>Category</label>
    <select name="category" required>
        <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category['id'] ?>" selected><?php echo $category['name'] ?></option>
        <?php } ?>
    </select>
    </br>
    <label>Store</label>
    <select name="store" required>
        <?php foreach ($stores as $store) { ?>
            <option value="<?php echo $store['id'] ?>" selected><?php echo $store['name'] ?></option>
        <?php } ?>
    </select>
    <label>Price</label>
    <input name="price" type="number" required>
    </br>
    <label>Barcode</label>
    <input type="number" name="barcode">
    </br>
    <label>Image URL</label>
    <input type="file" name="image" id="image" >
    <input type="submit" name="product-submit">
</form>

<?php include "footer.php" ?>