<?php

include "header.php";
require "dbh.inc.php";

if (isset($_GET['category'])) {

    $category = $_GET['category'];

    $products = $conn->query("Select product.id as productId,product.name as productName ,product.price as price ,store.name as storeName,product.image_url as image 
    from product 
    join product_store on product.id=product_store.product_id 
    join store on store.id=product_store.id 
    where category='$category' 
    group by product.name ");

    $products->execute();
    $products->setFetchMode(PDO::FETCH_OBJ);
    $prod = [];


    while ($row = $products->fetchObject()) {
        $prod[] = $row;
    }

    foreach ($prod as $product):

        ?>
        <!--<form action="product_more_info.php?product=produkt" method="get"enctype="multipart/form-data"> -->
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <tr>
                <td><?php echo $product->productName ?></td>
                <td><?php echo $product->price ?></td>
                <td><?php echo $product->storeName ?></td>
                <td><img src="<?php echo("images/" . trim($product->image)) ?>" width="250px" height="250px"></td>
                <td><a href="product_more_info.php?product=<?php echo $product->productName ?>&id=<?php echo $product->productId ?>&store=<?php echo $product->storeName ?>">About product</a></td>
            </tr>
        </table>
        <!--</form> -->
    <?php

    endforeach;

}

include "footer.php";

?>
