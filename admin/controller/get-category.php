<?php
include('database.php');

$item_code       =  $_POST['item_category_id'];
$masterlist_item = $mysqli->query("select *  FROM  pos_item_category where category_id   ='$item_code' ");
$result          = $masterlist_item->fetch_object();
echo $result->name;
