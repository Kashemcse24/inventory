
<?php 
include_once "../../../view/admin/include/header.php";
include_once '../../../vendor/autoload.php';
$user=new App\admin\User\User();
$users = $user->index();


?>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All User Information</div>
        <div class="card-body">


           <div style="position: fixed; right: 35px; z-index: 111">
            <?php
            if(isset($_SESSION['msg'])){
                echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
                session_unset();
            }
            if(isset($_SESSION['delete'])){
                echo "<div class='alert alert-danger'>".$_SESSION['delete']."</div>";
                session_unset();
            }
            if(isset($_SESSION['update'])){
                echo "<div class='alert alert-info'>".$_SESSION['update']."</div>";
                session_unset();
            }

            ?>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>User name</th>
                  <th>Email</th>
                  <th>Mobile number</th>
                  <th>User type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>User name</th>
                  <th>Email</th>
                  <th>Mobile number</th>
                  <th>User type</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                 <?php foreach($users as $user){?>
                <tr>
                 
                  <td><?php echo $user['name']?></td>
                  <td><?php echo $user['user_name']?></td>
                  <td><?php echo $user['email']?></td>
                  <td><?php echo $user['mobile']?></td>
                  <td><?php echo $user['user_type']?></td>
                  <td>
                    <a class="text-info" href="view/admin/user/viewuser.php?id=<?php echo $user['id']?>">View</a> 
                    <a class="text-primary" href="view/admin/user/edituser.php?id=<?php echo $user['id']?>">Edit</a> 
                    <a class="text-primary" href="view/admin/user/deleteuser.php?id=<?php echo $user['id']?>">Delete</a> 
                  </td>
                  
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Bootstrap core JavaScript-->
     <?php include_once"../../../view/admin/include/footer.php";?>