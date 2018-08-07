<?php

	include_once"../../../vendor/autoload.php";
	$pool = new App\admin\Pool\Pool();
	$pool->deletepool($_GET['id']);

?>