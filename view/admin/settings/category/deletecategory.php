<?php
session_start();

include_once"../../../../vendor/autoload.php";

$category = new App\admin\Category\Category();
$categorys = $category->deletecategory($_GET['id']);




?>