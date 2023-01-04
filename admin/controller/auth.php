<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql      = "SELECT * FROM pos_users WHERE username='$username' AND BINARY password='$password'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
		$_SESSION['id']    = $row['user_id'];
		header("location:../accounts/index.php");
	} else { 
		header("location:../index.php?error");
	}
