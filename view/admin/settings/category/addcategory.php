<?php
session_start();
include_once"../../../../view/admin/include/header.php";
include_once"../../../../vendor/autoload.php";

$category = new App\admin\Category\Category();
$categorys = $category->index();




?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
      <div class="row">
        <div class="col-4">
          

          <form action="view/admin/settings/category/storecategory.php"  method="POST" enctype="multipart/form-data" >
              <!-- Page Title -->
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="category_name" placeholder="Enter category name" required="1">
                </div>
              </div>
              
              <div class="form-group form-actions">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" id="add" class="btn btn-primary">ADD</button>
                </div>
              </div>
            </form>
        </div>

    <div class="col-8">
  
    <div class="container-fluid">
  
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Category</div>
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
                  <th>Category name</th>
                  <th>Created time</th>
                  <th>Updated time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
              
             
                <tr>

                  

                  <th>Category name</th>
                  <th>Created time</th>
                  <th>Updated time</th>
                  <th>Action</th>


                </tr>

   

              </tfoot>
              <tbody>
             <?php foreach($categorys as $category){ ?>
                <tr>
                  <td><?php echo $category['category_name']?></td>
                  <td><?php echo $category['created_at']?></td>
                  <td><?php echo $category['updated_at']?></td>
                  <td>
                    <a href="view/admin/settings/category/editcategory.php?id=<?= $category['id'];?>">Edit</a>
                    <a href="view/admin/settings/category/deletecategory.php?id=<?= $category['id']?>">Delete</a>
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
      </div>
    </div>
   </div> 
    


  <?php include_once"../../../../view/admin/include/footer.php";?>