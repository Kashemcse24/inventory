<?php
	include_once "../../../view/admin/include/header.php";
	include_once '../../../vendor/autoload.php';
	$user= new App\admin\User\User();
	$users = $user->viewuser($_GET['id']);

?>


<div class="content-wrapper">

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User Information</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> User Information</div>
        <div class="card-body">

        	<h4>Name:<?php echo $users['name']?></h4> 
    		<p>User name: <?php echo $users['user_name']?></p> 
    		<p>Email Address:<?php echo $users['email']?></p> 
    		<p>Mobile:<?php echo $users['mobile']?></p> 
    		<p>User type:<?php echo $users['user_type']?></p> 
        </div>
        
      </div>
    </div>
  </div>




