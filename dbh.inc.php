<?php
$connString = "mysql:dbname=praktikum2;host=127.0.0.1;port=3307";
$dBUsername="root";
$dBPassword= "";
$conn = null;

try {
    $conn = new PDO($connString, $dBUsername, $dBPassword);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}