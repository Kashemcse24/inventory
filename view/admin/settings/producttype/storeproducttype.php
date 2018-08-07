<?php


include_once'../../../../vendor/autoload.php';
$producttype = new App\admin\producttype\producttype();
$producttype->set($_POST)->storeproducttype();








?>