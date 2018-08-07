<?php 
include_once"../../../view/admin/include/header.php";
include_once"../../../vendor/autoload.php";
$user=new App\admin\User\User();
$users = $user->index();

$product = new App\admin\Product\Product();
$products = $product->index();


$editdistributor = new App\admin\Distributor\Distributor();
$editdistributor = $editdistributor->editdistributor($_GET['id']);

var_dump($editdistributor);


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
                  <select name="user_name" class="form-control" required="1">
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
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Available Product</label>
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
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Stock Out</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="stock_out" value="<?php echo $editdistributor['stock_out']?>">
                </div>
              </div>
              
              <div class="form-group form-actions">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" id="add" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
        </div>

      </div>
    </div>
   </div> 
    


  <?php include_once"../../../view/admin/include/footer.php";?>