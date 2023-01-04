<?php
include('../controller/database.php');


$category = $mysqli->query("SELECT * from pos_voucher");

if(isset($_POST['add-category'])){
	
	$voucher    = $_POST['voucher'];
	$discount   = $_POST['discount'];

	$mysqli->query("INSERT INTO pos_voucher (voucher,discount) VALUES ('$voucher','$discount')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Voucher Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "voucher.php";
							});
			</script>';
	
}

if(isset($_POST['delete-category'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_voucher where voucher_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Voucher is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "voucher.php";
							});
			</script>';
	
}

if(isset($_POST['update-category'])){
	
	$id         = $_POST['id'];
	$voucher    = $_POST['voucher'];
	$discount   = $_POST['discount'];




	$mysqli->query("UPDATE  pos_voucher SET voucher ='$voucher',  discount ='$discount' 
										 WHERE voucher_id  ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Voucher is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "voucher.php";
							});
			</script>';
	
}