  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/settings.php');?>

          <!-- Content wrapper -->
                    <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">System Logo</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" enctype="multipart/form-data">
					  <?php while($val = $settings->fetch_object()){ ?>
					      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="assets/logo/<?php echo $val->logo;?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new logo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
							  hidden
                              class="account-file-input"
							  name="image"
                              accept="image/png, image/jpeg"
                            />
							 <input
                              type="hidden"
							  name="image1"
							  value="<?php echo $val->logo;?>"
                            />
                          </label>
                       
                        </div>
                      </div>
					  <hr>
					  <h5 class="mb-3">System Information <h5>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">System Name: </label>
                          <input type="text" class="form-control" name="systemname" value="<?php echo $val->title;?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Email Address:</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $val->email;?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Facebook Link:</label>
                          <input type="text" class="form-control" name="facebook" value="<?php echo $val->facebook;?>"/>
                        </div>
                       <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Contact Number:</label>
                          <input type="text" class="form-control" name="contact" value="<?php echo $val->contact;?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Address:</label>
                          <textarea class="form-control" name="address" /><?php echo $val->address;?></textarea>
                        </div>
                      
                     
                    </div>
                  </div>
                </div>
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Contents</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Us:</label>
                          <textarea class="form-control"name="about" rows="6"/><?php echo $val->about;?></textarea>
                        </div> 
						<div class="mb-3">
                          <label class="form-label" for="basic-default-company">Terms and Condition:</label>
                          <textarea class="form-control"name="terms" rows="5"/><?php echo $val->termscondition;?></textarea>
                        </div>
						<div class="mb-3">
                          <label class="form-label" for="basic-default-company">Frequently Ask Question:</label>
                          <textarea class="form-control"name="faq" rows="5"/><?php echo $val->faq;?></textarea>
                        </div>
						<?php } ?>  
                      
                       
                        <button type="submit" class="btn btn-primary" name="update-settings">UPDATE</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
		
    <?php include("footer.php");?>      