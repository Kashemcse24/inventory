<?php
//start_session();
 include_once "../../../../vendor/autoload.php";
 $color = new App\admin\Color\Color();
$color->set($_POST)->storecolor();



?>