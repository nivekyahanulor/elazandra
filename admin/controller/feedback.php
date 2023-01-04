<?php
include('../controller/database.php');

$id       = $_GET['id'];
$customer = $mysqli->query("SELECT * from pos_feedback where product_id  = '$id'");
