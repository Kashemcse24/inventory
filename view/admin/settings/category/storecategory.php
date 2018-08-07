<?php
//start_session();
 include_once "../../../../vendor/autoload.php";
 $category = new App\admin\Category\Category();
$category->set($_POST)->storecategory();



?>