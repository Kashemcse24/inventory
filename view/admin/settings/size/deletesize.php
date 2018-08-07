<?php


include_once"../../../../vendor/autoload.php";
$size = new App\admin\Size\Size();
$size = $size->deletesize($_GET['id']);


?>