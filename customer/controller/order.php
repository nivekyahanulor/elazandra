<?php

$customerid = $_SESSION['id'];
$transcodes = $_SESSION['transcode'];

$ordercnt   = $mysqli->query("select count(*)count_val from pos_order where status = 0 and customer_id='$customerid'");
$cntrow     = $ordercnt->fetch_assoc();

$orders     = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 0 and a.customer_id='$customerid'");
$checkout   = $mysqli->query("SELECT * from pos_checkout_order where status = 0 and transcode='$transcodes' and customer_id='$customerid'");


if(isset($_POST['payment-order'])){
	
	$total	     = $_POST['total'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://g.payx.ph/payment_request',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array(
		'x-public-key' => 'pk_f51984d00df2ad862d120c5049eb3c1a',
		'amount' =>  $total,
		'description' => 'Payment for Order',
		'merchantlogourl' => 'https://liberalitybrand.shop/assets/img/logo.png',
		'webhooksuccessurl' => 'https://liberalitybrand.shop/customer/success.php',
		'redirectsuccessurl' => 'https://liberalitybrand.shop/customer/success.php'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	// echo $response;
	$data = json_decode($response, true);
	echo $data['data']['checkouturl'];
	echo "<script> window.location.href='".$data['data']['checkouturl']."';</script>";
		
}

if(isset($_POST['checkout-order'])){
	
	if(isset($_POST['checkbox'])){
		$is_preorder = 1;
		$checkdate	 = $_POST['checkdate'];
	} else {
		$is_preorder = 0;
		$checkdate	 = '';
	}
	$transcode	     = $_POST['transcode'];
	$customerid      = $_POST['customerid'];
	$delivery_option = $_POST['delivery_option'];
	$name    		 = $_POST['name'];
	$email           = $_POST['email'];
	$contact         = $_POST['contact'];
	$address         = $_POST['address'];
	$voucher         = $_POST['voucher'];
	
	
	$mysqli->query("INSERT INTO pos_checkout_order (customer_id ,transcode, delivery_option,name,email,contact,address,voucher) 
						VALUES ('$customerid','$transcode','$delivery_option','$name','$email','$contact','$address','$voucher')");
		
		
	echo '<script>window.location.href="checkout.php?method='.$delivery_option.'"</script>';
	
}


if(isset($_POST['add-order'])){
	
	
	$item_id		= $_POST['item_id'];
	$customer_id    = $_POST['customer_id'];
	$id             = $_POST['id'];
	$size           = $_POST['size'];
	$transcode      = $_SESSION['transcode'];
	
	$mysqli->query("INSERT INTO pos_order (customer_id ,trans_code, item_id,qty,size) 
						VALUES ('$customer_id','$transcode','$item_id',1,'$size')");
		
		
	echo '<script>window.location.href="product-details.php?id='.$id.'&added"</script>';
	
}

if(isset($_POST['confirm-order'])){
	
	
	
	$transcode             = $_SESSION['transcode'];
	$bank_transaction_code = $_POST['bank_transaction_code'];

	
	$mysqli->query("UPDATE pos_order set status='1'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='1' , bank_transaction_code = '$bank_transaction_code'  where transcode='$transcode'");
	
	
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
	
}

if(isset($_POST['update-cart'])){
	
	
	$order_id	 = $_POST['order_id'];
	$cnt		 = $_POST['cnt'];
	
	$mysqli->query("UPDATE pos_order set qty='$cnt' where order_id='$order_id'");
		
		
	echo '<script>window.location.href="cart.php?updated"</script>';
	
}

if(isset($_POST['delete-cart'])){
	
	$order_id	 = $_POST['order_id'];

	$mysqli->query("DELETE FROM  pos_order where order_id ='$order_id' ");
	
	
	echo '<script>window.location.href="cart.php?deleted"</script>';

}
