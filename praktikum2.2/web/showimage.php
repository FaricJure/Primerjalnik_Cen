<?php
include "dbh.inc.php";
//header("content-type :image/jpeg");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $galerija="SELECT product.img as img FROM product WHERE id=". $id;
    $a = $conn->query($galerija)->fetchAll();

    foreach ($a as $b):

        //echo $b["img"];
        $imageData=$b["img"];

    endforeach;
    header("Content-Type: image/jpeg");
    echo $imageData;
}

