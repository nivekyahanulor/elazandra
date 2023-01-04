<?php
include('../controller/database.php');


if(isset($_POST['salesman'])){
	
	$salesman = $_POST['salesman'];
	$datefrom = $_POST['datefrom'];
	$dateend  = $_POST['dateend'];
	
	$customer = $mysqli->query("SELECT a.* , b.* , c.firstname , c.lastname , d.name from pos_order a 
							LEFT JOIN  pos_items b on b.item_code = a.item_code
							LEFT JOIN  pos_customer c on c.customer_id = a.customer_id
							LEFT JOIN  pos_salesman d on d.sm_id = c.sm_id
							WHERE a.status  =1 and c.sm_id = '$salesman' and (DATE(created_at) between '$datefrom' and '$dateend')
							");

} else {
$customer = $mysqli->query("SELECT a.* , b.* , c.firstname , c.lastname , d.name from pos_order a 
							LEFT JOIN  pos_items b on b.item_code = a.item_code
							LEFT JOIN  pos_customer c on c.customer_id = a.customer_id
							LEFT JOIN  pos_salesman d on d.sm_id = c.sm_id
							WHERE a.status  =1
							");

}