<?php
 if(!isset($_SESSION)){
    session_start();
 }

 include_once "../../../vendor/autoload.php";
 $pool = new App\admin\Pool\Pool();
 $pools = $pool->set($_POST)->storepool();





?>