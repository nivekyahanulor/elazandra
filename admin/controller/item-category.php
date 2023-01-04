<?php
include('../controller/database.php');


$category = $mysqli->query("SELECT * from pos_item_category");

if(isset($_POST['add-category'])){
	
	$name       = $_POST['category'];

	$mysqli->query("INSERT INTO pos_item_category (name) VALUES ('$name')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Category Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}

if(isset($_POST['delete-category'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_item_category where category_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Category is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}

if(isset($_POST['update-category'])){
	
	$id          = $_POST['id'];
	$name       = $_POST['category'];



	$mysqli->query("UPDATE  pos_item_category SET name ='$name' 
										 WHERE category_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Category is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}