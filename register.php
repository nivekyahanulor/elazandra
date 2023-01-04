
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="admin/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
	<?php
	include('controller/database.php');

	$settings_val = $mysqli->query("SELECT * from pos_settings");
     $sval = $settings_val->fetch_row();
	
	?>
    <title><?php echo $sval[1];?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="admin/assets/logo/<?php echo $sval[7];?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="admin/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="admin/assets/js/config.js"></script>
  </head>

  <body style="background-image: url('assets/bg1.png');">
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
			
            <div class="card-body">
			<?php 
			 if(isset($_GET['duplicate'])){
				echo '<br> <div class="alert alert-warning alert-dismissible fade show" role="alert"> <center><i class="bi  bi-exclamation-circle me-1"></i> EMAIL ALREADY REGISTERED! <br> LOGIN USING YOUR ACCOUNT!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
			} 
			?>
             <center>
              <h4 class="mb-2"> <img src="admin/assets/logo/<?php echo $sval[7];?>" width="200px"></h4>
              <h4 class="mb-2"> <?php echo $sval[1];?></h4>
              <p class="mb-4">Register your account</p>
			</center>
              <form id="formAuthentication" class="mb-3" method="post" action="controller/register.php">
                <div class="mb-3">
                  <label for="email" class="form-label">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="firstname"
                    placeholder="First Name"
                    autofocus
					required
                  />
                </div>  
				<div class="mb-3">
                  <label for="email" class="form-label">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="lastname"
                    placeholder="Last Name"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Email Address"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Contact Number</label>
                  <input
                    type="text"
                    class="form-control"
                    name="contact"
                    placeholder="Contact Number"
					required
                  />
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Address</label>
                  <textarea
                    type="text"
                    class="form-control"
                    name="address"
                    placeholder="Address"
					required
                  /> </textarea>
                </div> 
				<div class="mb-3">
                  <label for="email" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Enter username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                   
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="register">Sign in</button>
                </div>
              </form>

             
            </div>
          </div>
        </div>
      </div>
    </div>

   

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="admin/assets/vendor/js/bootstrap.js"></script>
    <script src="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="admin/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
