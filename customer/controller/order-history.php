<?php

			
$customerid = $_SESSION['id'];


$orders     = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.item_id = b.item_id where a.status = 1 and a.customer_id='$customerid' group by a.transcode ");

$checkout   = $mysqli->query("	SELECT a.* ,b.*, c.* , sum(b.item_price * a.qty)price,c.status as order_status from pos_order a 
								left join pos_items b on a.item_id = b.item_id 
								left join pos_checkout_order c on c.transcode =a.trans_code 
								where a.status = 1 and a.customer_id='$customerid' group by a.trans_code");

$checkout1   = $mysqli->query("	SELECT a.* ,b.*, c.* , sum(b.item_price * a.qty)price,c.status as order_status from pos_order a 
								left join pos_items b on a.item_id = b.item_id 
								left join pos_checkout_order c on c.transcode =a.trans_code 
								where  a.customer_id='$customerid' group by a.trans_code");



if(isset($_POST['cancel-order'])){
	
	
	$transcode	 = $_POST['transcode'];
	
	$mysqli->query("UPDATE pos_order set status='5'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='5'  where transcode='$transcode'");
		
		
	echo '<script>window.location.href="orders.php?cancelled"</script>';
	
}
