<?php

include "header.php";
include "dbh.inc.php";

$products = $conn->query("Select * from product ");

$products->execute();
$products->setFetchMode(PDO::FETCH_OBJ);

$productsOutput = [];

while ($row = $products->fetchObject()) {
    $productsOutput[] = $row;

}

echo "<table><tr><th>Name</th><th>Category</th><th>Barcode</th><th>Price</th><th>Image</th></tr>";

foreach ($productsOutput as $product):


    //     echo "<tr><td>".$product->name."</td><td>".$product->category."</td><td>".$product->barcode."</td><td>".$product->price."</td><td><img src=""images/".trim($film->SLIKA)); " width=\"250px\" height=\"250px\"><</td></tr>";
    ?>

    <tr>
        <td><?php echo $product->name ?></td>
        <td><?php echo $product->category ?></td>
        <td><?php echo $product->barcode ?></td>
        <td><?php echo $product->price ?></td>
        <td> <img src="<?php echo ("images/".trim($product->image_url)) ?>" width="250px" height="250px"></td>
    </tr>


<?php

endforeach;

echo "</table>";

include "footer.php";
?>





