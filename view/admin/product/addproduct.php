<?php include_once"../../../view/admin/include/header.php";

include_once"../../../vendor/autoload.php";
$category=new App\admin\Category\Category();
$categorys = $category->index();

$color=new App\admin\Color\Color();
$colors = $color->index();


 $size=new App\admin\Size\Size();
 $sizes = $size->index();

var_dump($sizes);

?>


  <div class="content-wrapper">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Product</div>
      <div class="card-body">
        <form action="view/admin/product/store.php" method="post">
      
          <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="name" placeholder="Product Name" required="1">
          </div>
          
         <!-- <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="category" placeholder="product category">
          </div> -->


          
           <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
             <select name="category_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select Category</option>
                       <?php
                          foreach ($categorys as $category){
                              echo "<option value='".$category['category_name']."'>".$category['category_name']."</option>";
                          }
                        ?>
                  </select>
          </div>




         <div class="form-group">
              <label class="col-sm-4">Select Product Type</label>
                  <select name="product_type" class="form-control" required="1">
                      <option>Select Product type</option>
                      <option value="Cloth">Cloth</option>
                      <option value="jewelary">jewelary</option>
                  </select>
          </div>
<!--
          <div class="form-group">
              <label for="exampleInputPassword1">Product Color</label>
              <input class="form-control" id="exampleInputPassword1" type="text" name="product_color" placeholder="color">
          </div>-->
           <div class="form-group">
            <label for="exampleInputEmail1">Product Color</label>
             <select name="color_name" class="form-control" required="1">
                      <option value="" hidden="hidden">Select Color</option>
                       <?php
                          foreach ($colors as $color){
                              echo "<option value='".$color['color_name']."'>".$color['color_name']."</option>";
                          }
                        ?>
                  </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Product Size</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="product_size" placeholder="Product size" required="1">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input class="form-control" id="exampleInputEmail1" type="number" name="product_quentity" placeholder="Quantity" required="1">
          </div>

          <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <?php include_once"../../../view/admin/include/footer.php";?>