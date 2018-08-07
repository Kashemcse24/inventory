<?php

include_once"../../../../view/admin/include/header.php";
include_once'../../../../vendor/autoload.php';
$producttype = new App\admin\Producttype\Producttype();
$producttype = $producttype->editproducttype($_GET['id']);


//var_dump($producttype);



?>




<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Product Type</li>
      </ol>
      <div class="row">
        <div class="col-4">
          

          <form action="view/admin/settings/producttype/updateproductproducttype.php"  method="POST" enctype="multipart/form-data" >
              <!-- Page Title -->
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Product type</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="product_type" value="<?= $producttype['product_type']?>" required="1">
                </div>
              </div>
              
              <div class="form-group form-actions">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" id="add" class="btn btn-primary">UPDATE</button>
                </div>
              </div>
            </form>
        </div>

      </div>
    </div>
   </div> 
    


  <?php include_once"../../../../view/admin/include/footer.php";?>