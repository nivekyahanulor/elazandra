<?php
include('../controller/database.php');


$sales = $mysqli->query("SELECT a.* , b.* from pos_order a 
							LEFT JOIN  pos_items b on b.item_id = a.item_id
							");

while($valsales = $sales->fetch_object()){ 
		$totalsales =  $valsales->qty * $valsales->item_price;
}



// $preorders = $mysqli->query("SELECT count(*)preorders from pos_checkout_order where is_preorder =1");
// while($valpreorders = $preorders->fetch_object()){ 
		// $totalpreorders =  $valpreorders->preorders;
// }


$pendingorders = $mysqli->query("SELECT count(*)pendingorders from pos_checkout_order where status =1");
while($valpendingorders = $pendingorders->fetch_object()){ 
		$totalpendingorders =  $valpendingorders->pendingorders;
}

$ongoingorders = $mysqli->query("SELECT count(*)ongoingorders from pos_checkout_order where status =8");
while($valongoingorders = $ongoingorders->fetch_object()){ 
		$totalongoingorders =  $valongoingorders->ongoingorders;
}

$deliveryorders = $mysqli->query("SELECT count(*)deliveryorders from pos_checkout_order where status =7");
while($valdeliveryorders = $deliveryorders->fetch_object()){ 
		$totaldeliveryorders =  $valdeliveryorders->deliveryorders;
}

$completedorders = $mysqli->query("SELECT count(*)completedorders from pos_checkout_order where status =6");
while($valcompletedorders = $completedorders->fetch_object()){ 
		$totalcompletedorders =  $valcompletedorders->completedorders;
}

$cancelledorders = $mysqli->query("SELECT count(*)cancelledorders from pos_checkout_order where status =3");
while($valcancelledorders = $cancelledorders->fetch_object()){ 
		$totalcancelledorders =  $valcancelledorders->cancelledorders;
}


$orders = $mysqli->query("SELECT count(*)totalorders from pos_order where status =1");
while($valorders = $orders->fetch_object()){ 
		$totalorders =  $valorders->totalorders;
}


$customers = $mysqli->query("SELECT count(*)customers from pos_customer");
while($valcustomers = $customers->fetch_object()){ 
		$totalcustomers =  $valcustomers->customers;
}

$pos_users = $mysqli->query("SELECT count(*)pos_users from pos_users");
while($valpos_users = $pos_users->fetch_object()){ 
		$totalpos_users =  $valpos_users->pos_users;
}
