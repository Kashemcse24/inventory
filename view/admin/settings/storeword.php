<?php
 if(!isset($_SESSION)){
    session_start();
 }
 include_once "../../../vendor/autoload.php";
 $word = new App\admin\Word\Word();
 $word = $word->set($_POST)->storeword();


//var_dump($word);


?>