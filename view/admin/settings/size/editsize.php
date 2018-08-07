



<?php
session_start();
include_once"../../../../view/admin/include/header.php";
include_once"../../../../vendor/autoload.php";
$size = new App\admin\Size\Size();
$size = $size->editsize($_GET['id']);







?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Size</li>
      </ol>
      <div class="row">
        <div class="col-12">
          
          <style>
  
            .form-group{float: left;}
            .form-group-left {
              display: block;
              width: 1000px;}
             .form-group.form-actions {
                   margin-top: 88px;
                    margin-left: -830px;
               }
              
          </style>
     		
        	<form action="view/admin/settings/size/updatesize.php" method="Post" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
			 
              
                        <!-- Page Title -->
                        <div class="form-group form-group-left">
                          <label for="" class="col-sm-2 control-label">Size Code</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="size_code" value="<?=$size['size_code']?>" required>
						           <!--<a href="" class="btn btn-info" id="code_ganarate">Ganarate</a>-->
						
                          </div>
                        </div> 

				         <div class="form-group col-sm-2">
                          <label for="c0" class=" control-label">Size 0</label>
                          <div class="">
                            <input type="text" class="form-control" name="size0" value="<?=$size['size0']?>">
                          </div>
                        </div>

					    <div class="form-group col-sm-2">
                          <label for="c1" class=" control-label">Size 1</label>
                          <div class="">
                            <input type="text" class="form-control" name="size1" value="<?=$size['size1']?>">
                          </div>
                        </div>

					    <div class="form-group col-sm-2 ">
                          <label for="c2" class=" control-label">Size 2</label>
                          <div class="">
                            <input type="text" class="form-control" name="size2" value="<?=$size['size2']?>">
                          </div>
                        </div>

					    <div class="form-group col-sm-2">
                          <label for="c3" class=" control-label">Size 3</label>
                          <div class="">
                            <input type="text" class="form-control" name="size3" value="<?=$size['size3']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c4" class=" control-label">Size 4</label>
                          <div class="">
                            <input type="text" class="form-control" name="size4" value="<?=$size['size4']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c5" class=" control-label">Size 5</label>
                          <div class="">
                            <input type="text" class="form-control" name="size5" value="<?=$size['size5']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c6" class=" control-label">Size 6</label>
                          <div class="">
                            <input type="text" class="form-control" name="size6" value="<?=$size['size6']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c7" class=" control-label">Size 7</label>
                          <div class="">
                            <input type="text" class="form-control" name="size7" value="<?=$size['size7']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c8" class=" control-label">Size 8</label>
                          <div class="">
                            <input type="text" class="form-control" name="size8" value="<?=$size['size8']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c9" class=" control-label">Size 9</label>
                          <div class="">
                            <input type="text" class="form-control" name="size9" value="<?=$size['size9']?>">
                          </div>
                        </div>

					     <div class="form-group col-sm-2">
                          <label for="c10" class=" control-label">Size 10</label>
                          <div class="">
                            <input type="text" class="form-control" name="size10" value="<?=$size['size10']?>">
                          </div>
                        </div>
					
						<div class="form-group form-actions">
						  <div class="col-sm-10 col-sm-offset-2">
							<button type="submit" id="add" class="btn btn-info">ADD</button>
						  </div>
						</div> 
            </form>

        </div>
 
      </div>




    </div>
   </div> 


 







  <?php include_once"../../../../view/admin/include/footer.php";?>

