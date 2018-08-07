<?php
//start_session();
 include_once "../../../vendor/autoload.php";
 $distributor = new App\admin\Distributor\Distributor();
	$distributor->set($_POST)->storedistributor();



?>