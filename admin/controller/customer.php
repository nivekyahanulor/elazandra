<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT a.* from pos_customer a ");
$customer_record = $mysqli->query("SELECT a.* , count(b.customer_id)count_order , b.transcode from pos_customer a left join pos_checkout_order b on b.customer_id = a.customer_id where b.customer_id = a.customer_id and b.status = 6");

if(isset($_POST['add-customer'])){
	
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$area           = $_POST['area'];
	$salesman       = $_POST['salesman'];

	$mysqli->query("INSERT INTO pos_customer (firstname , lastname ,address,contact,sm_id,area ) VALUES ('$fname','$lname','$address','$contactnumber','$salesman','$area')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Customer Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}

if(isset($_POST['delete-customer'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_customer where customer_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Customer is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}

if(isset($_POST['update-customer'])){
	
	$id             = $_POST['id'];
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$address        = $_POST['address'];
	$contactnumber  = $_POST['contactnumber'];
	$area           = $_POST['area'];
	$salesman       = $_POST['salesman'];
	
	$mysqli->query("UPDATE  pos_customer set firstname  ='$fname' ,
										 lastname  ='$lname' ,
										 address  ='$address' ,
										 area  ='$area' ,
										 sm_id  ='$salesman' ,
										 contact  ='$contactnumber' 
										 WHERE customer_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Customer Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "customer.php";
							});
			</script>';
	
}