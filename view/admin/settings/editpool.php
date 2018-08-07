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

$pool = new App\admin\Pool\Pool();
$pool = $pool->editpool($_GET['id']);



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
          
          <form action="view/admin/settings/updatepool.php.php" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
              
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Pool Name</label>
                <div class="col-sm-10">
                  <select name="area_name" class="form-control">
                      <option value="" hidden="hidden">Select Area</option>
                       <?php
                          foreach ($areas as $area){
                              echo "<option value='".$area['id']."'>".$area['area_name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Word Name</label>
                <div class="col-sm-10">
                  <select name="area_name" class="form-control">
                      <option value="" hidden="hidden">Select Word</option>
                       <?php
                          foreach ($words as $word){
                              echo "<option value='".$word['word_name']."'>".$word['id']."</option>";
                          }
                        ?> 
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Road Name</label>
                <div class="col-sm-10">
                  <select name="area_name" class="form-control">
                      <option value="" hidden="hidden">Select Road</option>
                       <?php
                          foreach ($roads as $road){
                              echo "<option value='".$road['road_name']."'>".$road['id']."</option>";
                          }
                        ?> 
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Pool Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pool_name" value="<?=$pool['pool_name']?>">
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
    


  <?php include_once"../../../view/admin/include/footer.php";?>