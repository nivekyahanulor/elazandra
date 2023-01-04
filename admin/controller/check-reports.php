<?php
include('../controller/database.php');


if(isset($_POST['check_status'])){
	$status = $_POST['check_status'];
	$pos_cheque = $mysqli->query("SELECT a.* , b.firstname , b.lastname from pos_cheque a left join pos_customer b on b.customer_id = a.customer_id where a.check_status='$status' and  (DATE(a.date_added) between '$datefrom' and '$dateend')");
} else {
	$pos_cheque = $mysqli->query("SELECT a.* , b.firstname , b.lastname from pos_cheque a left join pos_customer b on b.customer_id = a.customer_id");
}
