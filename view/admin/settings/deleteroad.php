<?php

include_once"../../../vendor/autoload.php";
$road = new App\admin\Road\Road();
$road->deleteroad($_GET['id']);


?>