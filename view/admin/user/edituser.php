<?php 
include_once "../../../view/admin/include/header.php";
include_once '../../../vendor/autoload.php';
$user= new App\admin\User\User();
$users = $user->edituser($_GET['id']);


?>

    

    <div class="content-wrapper">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">User Registration</div>
      <div class="card-body">

        <?php var_dump($users) ?>

        <form action="view/admin/user/updateuser.php" method="post" enctype="">
      
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="<?= $users['name']?>" required/>
            <input class="form-control" type="hidden" name="id" value="<?= $users['id']?>" required/>
          </div>
      
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control"  type="email" name="email" value="<?= $users['email']?>" required/>
          </div>
      
          <div class="form-group">
      <label for="user_name">User name</label>
            <input class="form-control"  type="text" name="user_name" value="<?= $users['user_name']?>" required/>
          </div>
      
          <div class="form-group">
             <label for="password">Password</label>
              <input class="form-control" type="text" name="password" value="<?= $users['password']?>" required/>
          </div>
      
          <div class="form-group">
            <label for="mobile">Phone</label>
            <input class="form-control"  type="number" name="mobile" value="<?= $users['mobile']?>" required/>
          </div>
      
          <div class="form-group">
              <label class="col-sm-3">User Type</label>
          <select name="user_type" class="form-control" required>
            <?php 
              $userType = ['Distributor', 'Purchases'];
              //$accat = ['5', '6', '8'];
                foreach ($userType as $value) {
                    if($value == $users['user_type']){
                    //if(in_array($value, $accat)){
                          echo '<option value="'.$value.'" selected>'.$value.'</option>';
                    }else{
                          echo '<option value="'.$value.'">'.$value.'</option>';
                    }
                }
            ?> 
          </select>
          </div>

          
           <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
      </div>
    </div>
  </div>

    
     <?php include_once"../../../view/admin/include/footer.php";?>