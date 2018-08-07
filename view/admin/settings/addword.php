<?php 
include_once"../../../view/admin/include/header.php";
include_once"../../../vendor/autoload.php";
$area = new App\admin\Area\Area();
$areas = $area->index();

$word = new App\admin\Word\Word();
$words = $word->index();

//var_dump($words);


?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Word</li>
      </ol>
      <div class="row">
        <div class="col-4">
          
          <form action="view/admin/settings/storeword.php" method="post" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
              
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Area Name</label>
                <div class="col-sm-10">
                  <select name="area_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select User</option>
                       <?php
                          foreach ($areas as $area){
                              echo "<option value='".$area['area_name']."'>".$area['area_name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label for="word name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Word Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="word_name" placeholder="Enter word name" required="1">
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
          <i class="fa fa-table"></i> All Word</div>
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
                  <th>Area name</th>
                  <th>Word name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Area name</th>
                  <th>Word name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                  <?php
                    foreach ($words as $word) {
                  ?>
                <tr>
                  <td><?= $word['id']?></td>
                  <td><?= $word['area_name']?></td>
                  <td><?= $word['word_name']?></td>
                  <td>
                      <a href="view/admin/settings/editword.php?id=<?= $word['id']?>&area_name=<?= $word['area_name']?>">Edit</a>
                       <a href="view/admin/settings/deleteword.php?id=<?= $word['id']?>">Delete</a>
                  </td>
                </tr>

                <?php       } ?>
                
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
    


  <?php include_once"../../../view/admin/include/footer.php";?>