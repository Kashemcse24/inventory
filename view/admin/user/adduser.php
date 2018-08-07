<?php include_once"../../../view/admin/include/header.php";?>


  <div class="content-wrapper">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">User Registration</div>
      <div class="card-body">
        <form action="view/admin/user/store.php" method="post" enctype="">
      
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter Name" required/>
          </div>
		  
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control"  type="email" name="email" placeholder="Enter email" required/>
          </div>
		  
          <div class="form-group">
			       <label for="user_name">User name</label>
            <input class="form-control"  type="text" name="user_name" placeholder="User name" required/>
          </div>
		  
          <div class="form-group">
             <label for="password">Password</label>
              <input class="form-control" type="text" name="password" placeholder="Password" required/>
          </div>
		  
          <div class="form-group">
            <label for="mobile">Phone</label>
            <input class="form-control"  type="number" name="mobile" placeholder="Phone number" required/>
          </div>
		  
          <div class="form-group">
              <label class="col-sm-3">User Type</label>
					<select name="user_type" class="form-control" required>
              <option>-Select your user type</option>
              <option value="Distributor">Distributor</option>
              <option value="Purchases">Purchases</option>	
					</select>
          </div>
           <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
      </div>
    </div>
  </div>

  <?php include_once"../../../view/admin/include/footer.php";?>