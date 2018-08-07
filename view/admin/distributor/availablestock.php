
<?php 
include_once "../../../view/admin/include/header.php";
include_once '../../../vendor/autoload.php';


?>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Stock</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Available Stock</div>
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
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>User name</th>
                  <th>Available Quantity</th>
        
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>User name</th>
                  <th>Available Quantity</th>
           
                </tr>
              </tfoot>
              <tbody>
              
                <tr>
                 
                  <td>10</td>
                  <td>Energy light</td>
                  <td>Kashem khan</td>
                  <td>50</td>
                 

                  
                </tr>
            
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