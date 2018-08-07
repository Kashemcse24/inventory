<?php
//start_session();
 include_once "../../../../vendor/autoload.php";
 $size = new App\admin\Size\Size();
$size->set($_POST)->storesize();



?>