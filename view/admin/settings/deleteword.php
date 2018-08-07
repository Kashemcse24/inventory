<?php
session_start();
include_once"../../../vendor/autoload.php";
$word = new App\admin\Word\Word();
$word->deleteword($_GET['id']);

?>