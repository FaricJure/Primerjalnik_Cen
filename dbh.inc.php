<?php
$connString = "mysql:dbname=praktikum";
$dBUsername="root";
$dBPassword= "";
$conn = null;

try {
    $conn = new PDO($connString, $dBUsername, $dBPassword);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}