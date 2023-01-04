<?php
include('../controller/database.php');

$transcode = $_GET['transcode'];
$pos_order = $mysqli->query("SELECT * from pos_order AS po 
left join pos_items as pi ON po.item_code = pi.item_code 
left join pos_customer as pc ON po.customer_id = pc.customer_id 
left join pos_salesman as sm ON sm.sm_id = pc.sm_id 
WHERE po.trans_code = '$transcode'");

$pos_payment = $mysqli->query("SELECT * from pos_payment WHERE trans_code = '$transcode'");




