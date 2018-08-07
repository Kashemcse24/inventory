<?php


include_once'../../../../vendor/autoload.php';
$producttype = new App\admin\Producttype\Producttype();
$producttype = $producttype->deleteproducttype($_GET['id']);



?>
