<?php
include('controller/database.php');

$settings_val = $mysqli->query("SELECT * from pos_settings");
$sval = $settings_val->fetch_row();

$email = $_GET['email'];
$name  = $_GET['name'];

$mysqli->query("UPDATE pos_customer set is_active = 1 where email='$email'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $sval[1];?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	
	
    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
<body>

  <main>
    <div class="">

        <div class="">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 justify-content-center">

              <div class="d-flex justify-content-center py-4">
               <img src="admin/assets/logo/<?php echo $sval[7];?>" width="200px">
              </div><!-- End Logo -->

              <div class="card">

                <div class="card-body">
					<br><br>
					Your Account is confirmed!
					<br>
					<br>
					Login using your account details!
					<br>
					<br>
					
					Thank You!
					
					<br>
					<br>
					<a href="login.php"> LOGIN </a>
					<br>

                </div>
              </div>

             

            </div>
          </div>
        </div>


    </div>
  </main><!-- End #main -->

</body>

</html>