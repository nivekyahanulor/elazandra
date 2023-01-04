<?php

$customerid = $_SESSION['id'];


$account     = $mysqli->query("SELECT * from pos_customer where customer_id ='$customerid' ");


if(isset($_POST['update-profile'])){
	
	
	$fname	 = $_POST['fname'];
	$lastname	 = $_POST['lastname'];
	$contact	 = $_POST['contact'];
	$username	 = $_POST['username'];
	$password	 = $_POST['password'];
	$address	 = $_POST['address'];
	
	$mysqli->query("UPDATE 
					pos_customer set 
					firstname='$fname' ,
					lastname='$lastname' ,
					contact='$contact' ,
					username='$username' ,
					password='$password',
					address='$address'
					where customer_id='$customerid'");
		
		
	echo '<script>window.location.href="profile.php?updated"</script>';
	
}
