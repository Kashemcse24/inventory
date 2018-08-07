<?php

include_once"../../../../vendor/autoload.php";
$color = new App\admin\Color\Color();
$colors = $color->deletecolor($_GET['id']);




?>
