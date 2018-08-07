<?php 

include_once"../../../vendor/autoload.php";
$distributor=new App\admin\Distributor\Distributor();
$distributor = $distributor->deletedistributor($_GET['id']);



?>