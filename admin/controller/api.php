<?php
include('../../controller/database.php');
error_reporting(0);


if(isset($_POST['validateuser'])){
	$username = $_POST['username'];
	$users = $mysqli->query("SELECT * from pos_users WHERE username = '$username'");
	echo json_encode($users->num_rows);
}

if(isset($_POST['adduser'])){
	$fname          = $_POST['fname'];
	$lname          = $_POST['lname'];
	$role        	= $_POST['role'];
	$username       = $_POST['username'];
	$password       = $_POST['password'];

	$result = $mysqli->query("INSERT INTO pos_users (firstname , lastname ,role, username, password ) VALUES ('$fname','$lname','$role','$username','$password')");
	echo json_encode($result);
}

if(isset($_POST['save_close_order'])){
	$transcode         = $_POST['transcode'];
	$orders            = $_POST['orders'];
	$paymenttranscode  = $_POST['paymenttranscode'];
	$paymenttotal      = $_POST['paymenttotal'];
	$discount1         = $_POST['discount1'];
	$discount2         = $_POST['discount2'];
	$totalnet          = $_POST['totalnet'];
	
	foreach ($orders as $key => $value) {
		$item_code = $value['item_code'];
		$item_qty = $value['item_qty'];

		$mysqli->query("UPDATE  pos_items 
			SET item_qty = item_qty - '$item_qty'
			WHERE item_code ='$item_code'
		");


	}
	
	$result = $mysqli->query("INSERT INTO pos_payment (trans_code , total_amount,discounted_amount ,discount_1, discount_2 ) VALUES ('$paymenttranscode','$paymenttotal','$totalnet','$discount1','$discount2')");
}


if(isset($_POST['getCustomerByID'])){
	$id          = $_POST['id'];
	$result = $mysqli->query("SELECT * from pos_customer WHERE customer_id = '$id'");
	echo json_encode($result-> fetch_array(MYSQLI_ASSOC));
}

if(isset($_POST['get_item_code'])){
	$item_code  = $_POST['item_code'];
	$result = $mysqli->query("SELECT * from pos_items WHERE item_code = '$item_code'");
	echo json_encode($result-> fetch_array(MYSQLI_ASSOC));
}
if(isset($_POST['get_total_amount'])){
	$item_code  = $_POST['item_code'];
	$result = $mysqli->query(
							"SELECT 
							(IF(po.discounted_amount = '', po.total_amount, po.discounted_amount)) as amount from pos_payment AS po 
							WHERE po.trans_code = '$item_code'
							");
	echo json_encode($result-> fetch_array(MYSQLI_ASSOC));
}

if(isset($_POST['getOrderByID'])){
	$id          = $_POST['id'];
	$result = $mysqli->query("SELECT po.order_id as order_id,po.trans_code as transcode,
							CONCAT(pc.firstname,' ',pc.lastname) as cname,
							pi.item_code,
							pi.item_name,
							po.qty qty ,
							pi.item_qty,
                            IF(po.item_price_change = '1', po.update_price, pi.item_price) as item_price,
							(po.qty * IF(po.item_price_change = '1', po.update_price, pi.item_price)) as amount 
                            from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							WHERE po.trans_code = '$id'
							ORDER BY po.order_id DESC
							");
	echo json_encode($result-> fetch_all(MYSQLI_ASSOC));
}

if(isset($_POST['submitPayment'])){
	$transcode          = $_POST['transcode'];
	$orders          	= $_POST['orders'];
	$customer          	= $_POST['customer'];
	$total_amount      	= $_POST['total_amount'];
	$cash          		= $_POST['cash'];
	$customer_id		= $customer['customer_id'];
	$discount1			= $_POST['discount1'];
	$discount2		    = $_POST['discount2'];
	$total		        = $_POST['total'];
	foreach ($orders as $key => $value) {
		
		// echo json_encode($value['item_code']);
		$item_code = $value['item_code'];
		$item_qty = $value['item_qty'];
		$result = $mysqli->query("UPDATE  pos_order 
			SET status = 1
			WHERE trans_code ='$transcode'
		");

		$mysqli->query("UPDATE  pos_items 
			SET item_qty = item_qty - '$item_qty'
			WHERE item_code ='$item_code'
		");


	}
	
	$total_discount =  ($total_amount * (($discount1 + $discount2) /100));

	$result = $mysqli->query("UPDATE  pos_payment set  total_amount = '$total',cash = '$cash',discount_1 = '$discount1',discount_2 = '$discount2',discounted_amount = '$total_discount' where trans_code = '$transcode'");
}

if(isset($_POST['save_add_item'])){
	$order_id      = $_POST['order_id'];
	$item_qty      = $_POST['item_qty'];
	$result = $mysqli->query("UPDATE pos_order set qty = '$item_qty' where order_id='$order_id'");
	
}
if(isset($_POST['save_add_item_1'])){
	$transcode      = $_POST['item_transcode'];
	$orders         = $_POST['item_code_select'];
	$customer       = $_POST['item_customer_id'];
	$total			= $_POST['total'];
	$item_qty		= $_POST['item_qty'];
	$result = $mysqli->query("INSERT INTO pos_order (customer_id , trans_code ,item_code, qty, status ) VALUES ('$customer','$transcode','$orders','$item_qty','0')");
}
if(isset($_POST['delete_item'])){
	$order_id      = $_POST['order_id'];
	$result = $mysqli->query("DELETE FROM pos_order where order_id='$order_id'");
	
}
if(isset($_POST['updateOrder'])){
	
	$qty      = $_POST['qty'];
	$id       = $_POST['id'];
	
	$result = $mysqli->query("UPDATE pos_order set qty='$qty' where order_id  = '$id'");
	
}

if(isset($_POST['submitOrder'])){
	$transcode          = $_POST['transcode'];
	$orders          	= $_POST['orders'];
	$customer          	= $_POST['customer'];
	// $total_amount      	= $_POST['total_amount'];
	// $cash          		= $_POST['cash'];
	$customer_id		= $customer['customer_id'];
	foreach ($orders as $key => $value) {
		
		// echo json_encode($value['item_code']);
		$item_code = $value['item_code'];
		$item_qty = $value['item_qty'];
		$item_price = $value['item_price'];
		$item_price_change = $value['item_price_change'];
		$result = $mysqli->query("INSERT INTO pos_order (customer_id , trans_code ,item_code, qty, status , item_price_change,update_price ) VALUES ('$customer_id','$transcode','$item_code','$item_qty','0','$item_price_change','$item_price')");

		// $mysqli->query("UPDATE  pos_items 
		// 	SET item_qty = item_qty - '$item_qty'
		// 	WHERE item_code ='$item_code'
		// ");


	}

	
}

if(isset($_POST['deleteOrder'])){
	
	$itemcode          	= $_POST['itemcode'];

		$result = $mysqli->query("DELETE FROM pos_order WHERE order_id = '$itemcode'");

		if($result){
			echo json_decode($result->affected_rows);
		}else{
			echo json_decode($result->affected_rows);
		}

	
}