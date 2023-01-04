<?php
include('database.php');

$item_code       =  $_POST['item_supplier_id'];
$masterlist_item = $mysqli->query("select *  FROM  pos_supplier where supplier_id  ='$item_code' ");
$result          = $masterlist_item->fetch_object();
echo $result->name;
