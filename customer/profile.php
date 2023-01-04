	<?php include("header.php");?>
				<div class="row justify-content-center">
				<div class="col-lg-6">
							<?php if(isset($_GET['updated'])){?>
							<div class="alert alert-info">
								Profile Information Updated!
							</div>
							<?php } ?>
		                    <form method="post">
                             <?php while($val = $account->fetch_object()){	?>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="fname" value="<?php echo $val->firstname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" value="<?php echo $val->lastname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mobile Number</label> 
                                <div class="col-8">
                                  <input id="lastname" name="contact" value="<?php echo $val->contact;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                  <textarea name="address" value="" class="form-control here" type="text"><?php echo $val->address;?></textarea>
                                </div>
                              </div>
							  <br>
                             <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name </label> 
                                <div class="col-8">
                                  <input id="username" name="username" value="<?php echo $val->username;?>" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                             <br>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label"> Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="password" value="<?php echo $val->password;?>" class="form-control here" type="password">
                                </div>
                              </div> 
							    <br>
							 <?php } ?>
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="update-profile" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
               
            </div>
        </div>
     
    </div>
   
	<?php include("footer.php");?>