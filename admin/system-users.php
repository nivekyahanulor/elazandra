  <?php include("header.php");?>
  <?php include("nav.php");?>
<?php include('controller/system-users.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-user"> <i class="bi bi-person-plus-fill"></i> Add User</button></h5>
              <div class="col-lg-12 col-md-12 order-1">
			  <div class="card">
                 <table class="table table-striped table-bordered" id="table_id">
                  <thead>
                  <tr>
                    <th scope="col"  class="text-center">Username</th>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Role</th>
                    <th scope="col"  class="text-center">Date Added</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $users->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->username;?></td>
                    <td class="text-center"><?php echo $val->firstname . ' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->role;?></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-user<?php echo $val->user_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-user<?php echo $val->user_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					 <div class="modal fade" id="edit-user<?php echo $val->user_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update User</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">First Name: </label>
							  <input type="text" class="form-control" name="fname" value="<?php echo $val->firstname;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Last Name: </label>
							  <input type="text" class="form-control" name="lname" value="<?php echo $val->lastname;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Role: </label>
							  <select class="form-control" name="role" value="<?php echo $val->role;?>">

							  	<option value="1" <?php echo ($val->role == 1) ? 'selected' : ''?>>Admin</option>
							  	<option value="2" <?php echo ($val->role == 2) ? 'selected' : ''?>>Client</option>
							  </select>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->user_id;?>" required>
							</div>

							<hr>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Username: </label>
							  <input type="text" class="form-control" name="username" value="<?php echo $val->username;?>" required>
							</div>
						
							</div>
							<div class="modal-footer">
							  <button type="submit" class="btn btn-primary" name="update-user">Update </button>
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
					  </div>
					</div>
					</div>
					 <div class="modal fade" id="delete-user<?php echo $val->user_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete User</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this User Data?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->user_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-user">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
                </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->
			<div class="modal fade" id="add-user" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">User Registration</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post" id="add-form" onsubmit="submitForm(event)">
					
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">First Name: </label>
						  <input type="text" class="form-control" name="fname" id="fname" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Last Name: </label>
						  <input type="text" class="form-control" id="lname" name="lname" required>
						</div>
						<div class="col-12">
							  <label for="inputNanme4" class="form-label">Role: </label>
							  <select class="form-control" id="role" name="role">

							  	<option value="1">Admin</option>
							  	<option value="2">Client</option>
							  </select>
							</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Username: </label>
						  <input type="text" class="form-control" id="username" name="username" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Password: </label>
						  <input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="col-12">
						  <label for="inputNanme4" class="form-label">Re-Password: </label>
						  <input type="password" class="form-control" id="repassword" name="repassword" required>
						</div>
				
                    <div class="modal-footer">
                      <button type="submit" onclick="addUser()" class="btn btn-primary" name="">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
			</div>
			</div>
    <?php include("footer.php");?>      
	<script type="text/javascript">

  	(function() {
	  "use strict";

	  /**
	   * Easy selector helper function
	   */
	  


	})();

	function addUser(e){
		validateUserName($('#username').val());
	}

	function submitForm(event){
	    event.preventDefault();
	}

	function validateUserName(username){
		$.ajax({
            url: 'controller/api.php',
            data: {
                'username': username,
                'validateuser': '1'
            },
            type: "POST",
            success: function (result) {
                if(result > 0){
                	Swal.fire({
							title: "Error! ",
							text: "Username Exist",
							icon: "error",
							}).then(function(){
								
							});
                }else{
                	if($('#password').val() != $('#repassword').val()){
                		Swal.fire({
							title: "Error! ",
							text: "password not matched",
							icon: "error",
							}).then(function(){
								
							});
                	}else{
                		$.ajax({
				            url: 'controller/api.php',
				            data: {
				                'fname': $('#fname').val(),
				                'lname': $('#lname').val(),
				                'role': $('#role').val(),
				                'username': $('#username').val(),
				                'password': $('#password').val(),
				                'adduser': '1'
				            },
				            type: "POST",
				            success: function (result) {
				                if(result){
				                	Swal.fire({
											title: "Success! ",
											text: "User has been added",
											icon: "success",
											}).then(function(){
												window.location.reload();
											});
				                }else{
			                		Swal.fire({
										title: "Error! ",
										text: "Please contact the Admin on this issue",
										icon: "error",
										}).then(function(){
											
										});
				                
				                }
				            }
				        });
                	}
                }
            }
        });
	}
  </script>