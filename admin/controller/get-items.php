<?php
include('database.php');

$item_code       =  $_POST['item'];
$masterlist_item = $mysqli->query("select *  FROM  pos_items where item_code ='$item_code' ");
$result[]          = $masterlist_item->fetch_object();
echo json_encode($result);
