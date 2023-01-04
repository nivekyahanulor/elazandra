<?php
	include('../controller/database.php');
	session_start();

	$transcode      = $_SESSION['transcode'];
	
	
	$mysqli->query("UPDATE pos_order set status='1'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='1' ,is_paid=1  where transcode='$transcode'");
	
	
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
	}
	
    $transcode1 =  implode($pass);
	$_SESSION['transcode']    = $transcode1;
		
	echo '<script>window.location.href="order-history.php?success"</script>';