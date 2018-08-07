<?php 
include_once"../../../view/admin/include/header.php";
include_once"../../../vendor/autoload.php";
$user=new App\admin\User\User();
$users = $user->index();


$distributor = new App\admin\Distributor\Distributor();
$distributors = $distributor->index();


$product = new App\admin\Product\Product();
$products = $product->index();


?>



<div class="content-wrapper">
    <div class="container-fluid">
 
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Distributor</li>
      </ol>
      <div class="row">
        <div class="col-4">
          
          <form action="view/admin/distributor/storedistributor.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
              
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">User</label>
                <div class="col-sm-10">
                  <select name="user_name" class="form-control">
                      <option value="" hidden="hidden">Select User</option>
                       <?php
                          foreach ($users as $user){
                              echo "<option value='".$user['user_name']."'>".$user['user_name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Product Name</label>
                <div class="col-sm-10">
                  <select name="name" class="form-control">
                      <option value="" hidden="hidden">Select Product</option>
                       <?php
                          foreach ($products as $product){
                              echo "<option value='".$product['name']."'>".$product['name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Product Quantity</label>
                <div class="col-sm-10">
                  <select name="product_quentity" class="form-control">
                      <option value="" hidden="hidden">Select Product Quantity</option>
                       <?php
                          foreach ($products as $product){
                              echo "<option value='".$product['product_quentity']."'>".$product['product_quentity']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>

              

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Stock Out</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="stock_out" placeholder="stock out">
                </div>
              </div>
              
              <div class="form-group form-actions">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" id="add" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
        </div>

    <div class="col-8">
  
    <div class="container-fluid">
  
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Distributor History</div>
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
                  <th>ID</th>
                  <th>User name</th>
                  <th>Product Quantity</th>
                  <th>Stock out</th>
                  <th>Available Stock</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>User name</th>
                  <th>Product Quantity</th>
                  <th>Stock out</th>
                  <th>Available Stock</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                  

                	<?php
                
                		foreach ($distributors as $distributor) {
                			
                		
                	?>

                	<tr>

                  <td><?php echo $distributor['id']?></td>
                  <td><?php echo $distributor['user_name']?></td>
                  <td><?php echo $distributor['name']?></td>
                  <td><?php echo $distributor['product_quentity']?></td>
                  <td><?php echo $distributor['stock_out']?></td>
               
                  <td>
                      <a href="view/admin/distributor/editdistributor.php?id=<?=  $distributor['id']?>">Edit</a>
                      <a href="view/admin/distributor/deletedistributor.php?id=<?= $distributor['id']?>">Delete</a>
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


 <?php

  $a = $distributor['name'];
  $b= $distributor['stock_out'];

  echo $a-$b;


 ?>

        </div>
      </div>
    </div>
   </div> 
    


  <?php include_once"../../../view/admin/include/footer.php";?>