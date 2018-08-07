<?php
//start_session();
 include_once "../../../vendor/autoload.php";
 $user = new App\admin\User\User();
 $user = $user->set($_POST)->store();

 // $customer = new App\Validation();
 // $customer = $customer->valid();


//var_dump($user);


?>