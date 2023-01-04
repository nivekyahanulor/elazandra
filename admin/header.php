<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />


    <meta name="description" content="" />
	<?php
		session_start();
		if(!isset($_SESSION['id'])){
			header("Location: ../index.php");
		}
		include('../controller/database.php');

		$settings_val = $mysqli->query("SELECT * from pos_settings");
        $sval = $settings_val->fetch_row();
		
		$adminsid  = $_SESSION['id'];
		$adminss   = $mysqli->query("SELECT * from pos_users where user_id='$adminsid'");
        $aval = $adminss->fetch_row();
		
		error_reporting(0);
		$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$uri_segments = explode('/', $uri_path);
		$page =  $uri_segments[3];
		if ( $page == 'index.php'  ) {
            $index = 'active';
        }else if ($page == 'order.php') {
			$order = 'active';
         }else if ($page == 'timetable.php' || $page == 'order-details.php' ) {
            $timetable = 'active';
        }else if ($page == 'customer.php' || $page=="customer-record.php") {
            $customer = 'active';
        }else if ($page == 'system-users.php' ) {
            $users = 'active';
        }else if ($page == 'reports.php' || $page == 'sales.php' ) {
            $reports = 'active';
        }else if ($page == 'products.php' ) {
            $products = 'active';
        }else if ($page == 'menu.php' ||$page == 'category.php' || $page == 'settings.php' ) {
            $settings = 'active';
        }
		?>
    <!-- Favicon -->
    <title><?php echo $sval[1];?></title>
    <link rel="icon" type="image/x-icon" href="assets/logo/<?php echo $sval[7];?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link href="assets/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/datatable/datatables.min.css" rel="stylesheet">
    <script src="assets/js/extensions/sweetalert2.js"></script>
    <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css">
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <script src="assets/js/config.js"></script>
  </head>
