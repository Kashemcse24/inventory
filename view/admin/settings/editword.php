<?php 
include_once"../../../view/admin/include/header.php";
include_once"../../../vendor/autoload.php";

$word = new App\admin\Word\Word();
$words = $word->editword($_GET['id']);
$area = $word->editword($_GET['area_name']);

var_dump($area);

$area = new App\admin\Area\Area();
$areas = $area->index();



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
          
          <form action="view/admin/settings/updateword.php" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
              
              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Area Name</label>
                <div class="col-sm-10"> 
                  
                 
                   <?php echo $_GET['area_name'] ?>

                  <select name="area_name" class="form-control" required="1">

                     <option value="" hidden="hidden">Select Area</option>
                       <?php

                          foreach ($areas as $area){
                              echo "<option value='".$area['area_name']."' >".$area['area_name']."</option>";
                          }
                        ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="area name" class=" control-label" style="display: block; width: 100%; text-align: left; margin-bottom: 20px; font-weight: bold; margin-left: 15px;">Word Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="word_name" value="<?php echo $words['word_name']?>" required>
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


  //($area['area_name'] == $_GET['area_name']) ? 'selected' : "";

  <?php echo ($results['gender']=='male')? 'checked':'';?>