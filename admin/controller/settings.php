<?php
include('../controller/database.php');


$settings = $mysqli->query("SELECT * from pos_settings");



if(isset($_POST['update-settings'])){
	
	$systemname    = $_POST['systemname'];
	$email         = $_POST['email'];
	$facebook      = $_POST['facebook'];
	$contact       = $_POST['contact'];
	$address       = $_POST['address'];
	$terms         = $_POST['terms'];
	$about         = $_POST['about'];
	$faq           = $_POST['faq'];

	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/logo/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/logo/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE  pos_settings SET 
						title ='$systemname' ,
						contact ='$contact' ,
						address ='$address' , 
						facebook = '$facebook' , 
						termscondition='$terms',
						faq='$faq',
						email='$email',
						about='$about',
						logo='$location'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Settings Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "settings.php";
							});
			</script>';
	
}