<?php
 if(!isset($_SESSION)){
    session_start();
 }
 include_once "../../../vendor/autoload.php";
 $user = new App\admin\Product\Product();
 $user = $user->set($_POST)->store();

 // $customer = new App\Validation();
 // $customer = $customer->valid();


//var_dump($user);


?>