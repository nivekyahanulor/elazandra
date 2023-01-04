  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/profile.php');?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-12">
            
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
					  <?php while($val = $admins->fetch_object()){ ?>
                      <form method="post" enctype="multipart/form-data">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
					  <?php if($val->profile == ""){?>
                        <img
                          src="assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
					    <?php } else { ?>
						<img
                          src="assets/img/avatars/<?php echo $val->profile;?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
						<?php } ?>
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
							  name="image"
                              accept="image/png, image/jpeg"
                            />
							
							 <input
                              type="hidden"
							  name="image1"
							  value="<?php echo $val->profile;?>"
                            />
                          </label>
                         

                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name: </label>
                            <input
                              class="form-control"
                              type="text"
                              name="fname"
                              autofocus
							  value="<?php echo $val->firstname;?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name: </label>
                            <input class="form-control" type="text" name="lname"  value="<?php echo $val->lastname;?>"/>
                         </div> 
						 <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">User Name: </label>
                            <input class="form-control" type="text" name="username"  value="<?php echo $val->username;?>"/>
                         </div> 
						 <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Password: </label>
                            <input class="form-control" type="password" name="password"   value="<?php echo $val->password;?>"/>
                         </div>
						<?php } ?>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2" name="update-profile">Save changes</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                
                </div>
              </div>
            </div>
            <!-- / Content -->
    <?php include("footer.php");?>      