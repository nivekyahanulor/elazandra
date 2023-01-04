<?php
include('../controller/database.php');


$users = $mysqli->query("SELECT * from pos_users");


if(isset($_POST['delete-user'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_users where user_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " User is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	
}

if(isset($_POST['update-user'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$role        	= $_POST['role'];


	$result = $mysqli->query("UPDATE pos_users set firstname  ='$fname' ,
										 lastname  ='$lname' ,
										 role  ='$role'
										 WHERE user_id = '$id' 
					");

	if($result){
		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}else{
		echo '  <script>
					Swal.fire({
							title: "Error! ",
							text: "Something Wrong!",
							icon: "error",
							type: "error"
							}).then(function(){
								window.location = "system-users.php";
							});
			</script>';
	}
		
	
}
	




