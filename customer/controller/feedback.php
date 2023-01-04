<?php
	include('../../controller/database.php');
	
	$feedback           = $_POST['feedback'];
	$id           = $_POST['id'];


	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "../../assets/feedback/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
	
	$mysqli->query("INSERT INTO pos_feedback (feedback ,image,product_id) 
						VALUES ('$feedback','$location','$id')");
	
	
	echo '<script>window.location.href="../product-details.php?id='.$id.'&feedback"</script>';
