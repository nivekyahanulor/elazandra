<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT * from pos_packages");


if(isset($_POST['search'])){
	$item_code = $_POST['item_code'];
	$mysqli->query("select *  FROM  pos_items where item_code ='$item_code' ");
    $row = $mysqli->fetch_row();
	echo json_encode($row);
}

if(isset($_POST['add-item'])){
	
	$name           = $_POST['name'];
	$price          = $_POST['price'];
	$content        = $_POST['content'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/package/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
	$mysqli->query("INSERT INTO pos_packages (item_name ,item_price, content,image) 
						VALUES ('$name','$price','$content','$location')");
		
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Package Data Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_packages where package_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Package Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id             = $_POST['id'];
	$name           = $_POST['name'];
	$price          = $_POST['price'];
	$content        = $_POST['content'];
	$letter  	    = $_POST['image1'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/package/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/package/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE pos_packages  SET item_name           = '$name',
										  item_price          = '$price',
										  content             = '$content',
										  image               = '$location'
					WHERE package_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Package Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}