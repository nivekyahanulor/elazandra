<?php
include('../controller/database.php');


$pos_cheque = $mysqli->query("SELECT a.* , b.firstname , b.lastname from pos_cheque a left join pos_customer b on b.customer_id = a.customer_id");

if(isset($_POST['add-check'])){
	
	$customer_id    = $_POST['customer_id'];
	$bank           = $_POST['bank'];
	$branch         = $_POST['branch'];
	$check_number   = $_POST['check_number'];
	$check_date     = $_POST['check_date'];
	$amount         = $_POST['amount'];
	$deposit_bank   = $_POST['deposit_bank'];
	$check_status   = $_POST['check_status'];
	$move_date      = $_POST['move_date'];
	$remarks        = $_POST['remarks'];

	$mysqli->query("INSERT INTO pos_cheque (customer_id , bank, branch, check_number, check_date, amount, deposit_bank, check_status, move_date, remarks ) 
								VALUES ('$customer_id','$bank','$branch','$check_number','$check_date','$amount','$deposit_bank','$check_status','$move_date','$remarks')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Cheque Record Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "check.php";
							});
			</script>';
	
}

if(isset($_POST['delete-check'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_cheque where check_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Cheque is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "check.php";
							});
			</script>';
	
}

if(isset($_POST['update-check'])){
	
	$customer_id    = $_POST['customer_id'];
	$bank           = $_POST['bank'];
	$branch         = $_POST['branch'];
	$check_number   = $_POST['check_number'];
	$check_date     = $_POST['check_date'];
	$amount         = $_POST['amount'];
	$deposit_bank   = $_POST['deposit_bank'];
	$check_status   = $_POST['check_status'];
	$move_date      = $_POST['move_date'];
	$remarks        = $_POST['remarks'];
	$check_id       = $_POST['check_id'];


	
	$mysqli->query("UPDATE  pos_cheque SET customer_id = '$customer_id',
										   bank = '$bank', 
										   branch = '$branch', 
										   check_number = '$check_number', 
										   check_date = '$check_date', 
										   amount='$amount',
										   deposit_bank='$deposit_bank',
										   check_status = '$check_status', 
										   move_date = '$move_date', 
										   remarks = '$remarks' 
										   where check_id = '$check_id' 
								");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Cheque Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "check.php";
							});
			</script>';
	
}