<?php
 if(!isset($_SESSION)){
    session_start();
 }
 include_once "../../../vendor/autoload.php";
 $area = new App\admin\Area\Area();
 $areas = $area->set($_POST)->storearea();

 // $customer = new App\Validation();
 // $customer = $customer->valid();





?>