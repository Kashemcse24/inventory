<?php
//start_session();
 include_once"../../../view/admin/include/header.php";
 include_once "../../../vendor/autoload.php";
 $product = new App\admin\Product\Product();
 $product = $product->viewproduct($_GET['id']);

//var_dump($product);




?>


<div class="content-wrapper">

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>All Product List </div>
        <div class="card-body">

        <h4>Product Name:<?php echo $product['name']?></h4> 
    		<p>Product Category: <?php echo $product['category_name']?></p> 
    		<p>Product type:<?php echo $product['product_type']?></p> 
    		<p>Product color:<?php echo $product['color_name']?></p> 
    		<p>Product size:<?php echo $product['product_size']?></p> 
        <p>Product quanity:<?php echo $product['product_quentity']?></p> 
        </div>
        
      </div>
    </div>
  </div>



 
 	 <?php include_once"../../../view/admin/include/footer.php";?>
 