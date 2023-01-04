<?php
include('../controller/database.php');


$salesman = $mysqli->query("SELECT * from pos_salesman");

if(isset($_POST['add-salesman'])){
	
	$name       = $_POST['salesman'];

	$mysqli->query("INSERT INTO pos_salesman (name , is_active ) VALUES ('$name','1')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Salesman Record Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "salesman.php";
							});
			</script>';
	
}

if(isset($_POST['delete-salesman'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_salesman where sm_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Salesman is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "salesman.php";
							});
			</script>';
	
}

if(isset($_POST['update-salesman'])){
	
	$id          = $_POST['id'];
	$name       = $_POST['salesman'];



	$mysqli->query("UPDATE  pos_salesman SET name ='$name' 
										 WHERE sm_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Salesman Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "salesman.php";
							});
			</script>';
	
}