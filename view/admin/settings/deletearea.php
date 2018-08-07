<?php
session_start();
include_once"../../../vendor/autoload.php";
$area = new App\admin\Area\Area();
$area->deletearea($_GET['id']);

?>