
<?php
include_once "../../../view/admin/include/header.php";
include_once "../../../vendor/autoload.php";
$product = new App\admin\Product\Product();
$products = $product->index();


$total = new App\admin\Product\Product();
$total = $total->total();


var_dump($total);




?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage product</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Product</div>
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

        <div>

    

    </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Product type</th>
                  <th>Product color</th>
                  <th>Product size</th>
                  <th>Product quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Product type</th>
                  <th>Product color</th>
                  <th>Product size</th>
                  <th>Product quantity</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($products as $product) { ?>
                <tr>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['category_name'];?></td>
                  <td><?php echo $product['product_type'];?></td>
                  <td><?php echo $product['color_name'];?></td>
                  <td><?php echo $product['product_size'];?></td>
                  <td><?php echo $product['product_quentity'];?></td>
                  <td>
                    <a class="text-info" href="view/admin/product/viewproduct.php?id=<?php echo $product['id']?>">View</a> 
                    <a class="text-primary" href="view/admin/product/editproduct.php?id=<?php echo $product['id']?>">Edit</a> 
                    <a class="text-primary" href="view/admin/product/deleteproduct.php?id=<?php echo $product['id']?>">Delete</a>
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
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Bootstrap core JavaScript-->
     <?php include_once"../../../view/admin/include/footer.php";?>