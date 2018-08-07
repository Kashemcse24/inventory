<?php
 	session_start();
  include_once '../../../vendor/autoload.php';
  $product = new App\admin\Product\Product();
  $product->deleteproduct($_GET['id']);
 ?>