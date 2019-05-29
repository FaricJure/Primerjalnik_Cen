<?php
include "header.php";
require "dbh.inc.php";

if (isset($_POST['product-submit'])) {
    $productName = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];
    $image =$_POST['image'];
    $store=$_POST['store'];


    $query = "INSERT INTO product(name,category,price,barcode,image_url) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$productName,$category,$price,$barcode,$image]);
    $productId = $conn->lastInsertId();

    $selectStoreId=$conn->query("Select id from store where name='$store' LIMIT 1");
    $selectStoreId->execute();

    $selectStoreId->setFetchMode(PDO::FETCH_ASSOC);

    $idStore=null;

    while ($row = $selectStoreId->fetch()) {

    $idStore=$row['id'];

    }

    $insert=$conn->prepare("INSERT INTO  product_store(product_id,store_id) VALUES(?,?)");
    $insert->execute([$productId,$idStore]);

}
?>

<form method="post" >
    <label>Name</label>
    <input name="name" required>
    </br>
    <label>Category</label>
    <select name="category" required>
        <option value="Milk">Mleko</option>
        <option value="Chocolate">Chocolate</option>
        <option value="Bread">Bread</option>
        <option value="Fruit">Fruit</option>
        <option value="Vegetables">Vegetables</option>
    </select>
    </br>
    <label>Store</label>
    <select name="store" required>
        <option value="Tus">Tus</option>
        <option value="Spar">Spar</option>
        <option value="Merkator">Merkator</option>
        <option value="Hofer">Hofer</option>
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
