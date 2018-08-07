<?php
session_start();
include_once"../../../../view/admin/include/header.php";
include_once"../../../../vendor/autoload.php";
$size = new App\admin\Size\Size();
$sizes = $size->index();






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
     		
        	<form action="view/admin/settings/size/storesize.php" method="Post" name="add" enctype="multipart/form-data" class="form-horizontal form-bordered">
			 
              
                        <!-- Page Title -->
                        <div class="form-group form-group-left">
                          <label for="" class="col-sm-2 control-label">Size Code</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="size_code" placeholder="Size Code" required>
						           <!--<a href="" class="btn btn-info" id="code_ganarate">Ganarate</a>-->
						
                          </div>
                        </div> 

				              <div class="form-group col-sm-2">
                          <label for="c0" class=" control-label">Size 0</label>
                          <div class="">
                            <input type="text" class="form-control" name="size0" placeholder="Enter the Size 0">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c1" class=" control-label">Size 1</label>
                          <div class="">
                            <input type="text" class="form-control" name="size1" placeholder="Enter the Size 1">
                          </div>
                        </div>

					             <div class="form-group col-sm-2 ">
                          <label for="c2" class=" control-label">Size 2</label>
                          <div class="">
                            <input type="text" class="form-control" name="size2" placeholder="Enter the Size 2">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c3" class=" control-label">Size 3</label>
                          <div class="">
                            <input type="text" class="form-control" name="size3" placeholder="Enter the Size 3">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c4" class=" control-label">Size 4</label>
                          <div class="">
                            <input type="text" class="form-control" name="size4" placeholder="Enter the Size 4">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c5" class=" control-label">Size 5</label>
                          <div class="">
                            <input type="text" class="form-control" name="size5" placeholder="Enter the Size 5">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c6" class=" control-label">Size 6</label>
                          <div class="">
                            <input type="text" class="form-control" name="size6" placeholder="Enter the Size 6">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c7" class=" control-label">Size 7</label>
                          <div class="">
                            <input type="text" class="form-control" name="size7" placeholder="Enter the Size 7">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c8" class=" control-label">Size 8</label>
                          <div class="">
                            <input type="text" class="form-control" name="size8" placeholder="Enter the Size 8">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c9" class=" control-label">Size 9</label>
                          <div class="">
                            <input type="text" class="form-control" name="size9" placeholder="Enter the Size 9">
                          </div>
                        </div>

					             <div class="form-group col-sm-2">
                          <label for="c10" class=" control-label">Size 10</label>
                          <div class="">
                            <input type="text" class="form-control" name="size10" placeholder="Enter the Size 10">
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



       
    <div class="row">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Size code</th>
                  <th>Size0</th>
                  <th>Size1</th>
                  <th>Size2</th>
                  <th>Size3</th>
                  <th>Size4</th>
                  <th>Size5</th>
                  <th>Size6</th>
                  <th>Size7</th>
                  <th>Size8</th>
                  <th>Size9</th>
                  <th>Size10</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Size code</th>
                  <th>Size0</th>
                  <th>Size1</th>
                  <th>Size2</th>
                  <th>Size3</th>
                  <th>Size4</th>
                  <th>Size5</th>
                  <th>Size6</th>
                  <th>Size7</th>
                  <th>Size8</th>
                  <th>Size9</th>
                  <th>Size10</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody> 
                <?php
                    foreach ($sizes as $size) {
                   
                  ?>
                <tr>
                  
                  <td><?php echo $size['id']?></td>
                  <td><?php echo $size['size_code']?></td>
                  <td><?php echo $size['size0']?></td>
                  <td><?php echo $size['size1']?></td>
                  <td><?php echo $size['size2']?></td>
                  <td><?php echo $size['size3']?></td>
                  <td><?php echo $size['size4']?></td>
                  <td><?php echo $size['size5']?></td>
                  <td><?php echo $size['size6']?></td>
                  <td><?php echo $size['size7']?></td>
                  <td><?php echo $size['size8']?></td>
                  <td><?php echo $size['size9']?></td>
                  <td><?php echo $size['size10']?></td>
                  <td>
                      <a href="view/admin/settings/size/editsize.php?id=<?= $size['id']?>">Edit</a>
                      <a href="view/admin/settings/size/deletesize.php?id=<?= $size['id']?>">Delete</a>
                  </td>
                </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>


    </div>
   </div> 


  


  <?php include_once"../../../../view/admin/include/footer.php";?>

 