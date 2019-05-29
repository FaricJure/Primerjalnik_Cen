<?php
include "header.php";
require "dbh.inc.php";

if (isset($_POST['product-submit'])) {
    $productName = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $barcode = $_POST['barcode'];
    $image =$_POST['image'];

   // $target="images/".basename($_FILES['image']['name']);
  //  $imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    //Add product
    $query = "INSERT INTO product(name,category,price,barcode,image_url) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($query);

   /* if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
         echo "DODADENA SLIKA VO PODATOCNATA BAZA";
    } else {
        echo "SlIKATA NE E DODADENA";
    }
*/
    $stmt->execute([$productName,$category,$price,$barcode,$image]);
    $productId = $conn->lastInsertId();
}
?>

<form method="post" >
    <label>Name</label>
    <input name="name" required >
    </br>
    <label>Category</label>
    <input name="category" required>
    </br>
    <label>Price</label>
    <input name="price" type="number" required>
    </br>
    <label>Barcode</label>
    <input type="number" name="barcode" value="<?php echo $_GET["koda"]; ?>">
    </br>
    <label>Image URL</label>
    <input type="file" name="image" id="image" >
    <input type="submit" name="product-submit">
</form>
