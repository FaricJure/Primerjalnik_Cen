<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is example">
    <meta name=viewport content="width=device-width" inital-scale="1">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="skripta.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <title></title>
</head>


<?php

//include "header.php";
require "dbh.inc.php";


if (isset($_GET['product']) && isset($_GET['id']) && isset($_GET['store'])) {

    $productName = $_GET['product'];
    $productId = $_GET['id'];
    $storeName = $_GET['store'];

//  echo $productName;

    $prodInfo = $conn->query("Select product.barcode as barcode , product.name as productName ,product.price as price
   from product where product.id='" . $productId . "' ");

    $prodInfo->execute();

    $prodInfo->setFetchMode(PDO::FETCH_OBJ);
    $infoss = [];

    while ($row = $prodInfo->fetchObject()) {
        $infoss[] = $row;
    }

    $otherStores = $conn->query("Select store.name as storeName , product.id as productId from store 
    join product_store on store.id=product_store.store_id 
     join product on product_store.product_id=product.id where product.name='" . $productName . "'");

    $otherStores->execute();
    $otherStores->setFetchMode(PDO::FETCH_OBJ);
    $stores = [];

    $storesCount = null;
    while ($row = $otherStores->fetchObject()) {
        $stores[] = $row;
        $stores++;
    }

    foreach ($infoss as $info):

        ?>
        <p>Store Name:<?php echo $storeName ?></p>
        <p>Name:<?php echo $info->productName ?></p>
        <p>Barcode:<?php echo $info->barcode ?></p>
        <p>Price:<?php echo $info->price ?></p>

    <?php
    endforeach;
//   if($storesCount>0) {
    ?>
    <p>In other stores:
    <?php
    foreach ($stores

             as $store):
        ?>

    <form action="#" method="post" >
        <button type="submit" name="s" value="<?php echo $store->storeName ?>" ><?php echo $store->storeName ?></button>
    </form>
    <?php

    endforeach;
//  }
    ?>
    </p>

    <?php

    $param = null;
    if (isset($_POST['s'])) {

        $param = $_POST['s'];

        $product = $conn->query("Select product.name as productName, store.name as storeName, product.price from store 
        join product_store on store.id=product_store.store_id 
        join product on product.id=product_store.product_id where product.name='$productName' and store.name='$param'");

        $product->execute();

        $product->setFetchMode(PDO::FETCH_OBJ);
        $productInfo = [];

        while ($row = $product->fetchObject()) {
            $productInfo[] = $row;

        }

        foreach ($productInfo as $info):

            ?>

            <p>Izbrana trgovina:<?php echo $info->storeName ?>
                Cena produkta:<?php echo $info->price ?>
            </p>

        <?php
        endforeach;

    } else {
        echo " ";
    }
} else {
    echo " ";
}

include "footer.php";

?>

</body>
</html>
