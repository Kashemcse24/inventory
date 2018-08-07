<?php 
include_once"../../../view/admin/include/header.php";
include_once"../../../vendor/autoload.php";
$area = new App\admin\Area\Area();
$areas = $area->index();

$word = new App\admin\Word\Word();
$words = $word->index();


$road = new App\admin\Road\Road();
$roads = $road->index();

$pool = new App\admin\Pool\Pool();
$pools = $pool->index();


?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pool</li>
      </ol>
      <div class="row">
        <div class="col-4">
          
          <form action="view/admin/settings/storepool.php" method="post" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
              
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Area Name</label>
                <div class="col-sm-10">
                  <select name="area_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select Area</option>
                       <?php
                          foreach ($areas as $area){
                              echo "<option value='".$area['area_name']."'>".$area['area_name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Word Name</label>
                <div class="col-sm-10">
                  <select name="word_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select Word</option>
                       <?php
                          foreach ($words as $word){
                              echo "<option value='".$word['word_name']."'>".$word['word_name']."</option>";
                          }
                        ?> 
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Road Name</label>
                <div class="col-sm-10">
                  <select name="road_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select Road</option>
                       <?php
                          foreach ($roads as $road){
                              echo "<option value='".$road['road_name']."'>".$road['road_name']."</option>";
                          }
                        ?> 
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Pool Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pool_name" placeholder="Enter Pool name" required="1">
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
          <i class="fa fa-table"></i> All Pool</div>
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
                  <th>Road name</th>
                  <th>Pool name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Area name</th>
                  <th>Word name</th>
                  <th>Road name</th>
                  <th>Pool name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                  <?php
                    foreach ($pools as $pool) {
                  ?>
                <tr>
                  <td><?= $pool['id']?></td>
                  <td><?= $pool['area_name']?></td>
                  <td><?= $pool['word_name']?></td>
                  <td><?= $pool['road_name']?></td>
                  <td><?= $pool['pool_name']?></td>

                  <td>
                      <a href="view/admin/settings/editpool.php?id=<?= $pool['id']?>">Edit</a>
                      <a href="view/admin/settings/deletepool.php?id=<?= $pool['id']?>">Delete</a>
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