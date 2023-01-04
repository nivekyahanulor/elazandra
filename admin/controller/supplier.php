<?php
include('../controller/database.php');


$pos_supplier = $mysqli->query("SELECT * from pos_supplier");

if(isset($_POST['add-supplier'])){
	
	$name       = $_POST['name'];
	$contact    = $_POST['contact'];
	$address    = $_POST['address'];

	$mysqli->query("INSERT INTO pos_supplier (name ,contact ,address , is_active ) VALUES ('$name','$contact','$address','1')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Supplier Record Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "supplier.php";
							});
			</script>';
	
}

if(isset($_POST['delete-supplier'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_supplier where supplier_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Supplier is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "supplier.php";
							});
			</script>';
	
}

if(isset($_POST['update-supplier'])){
	
	$id          = $_POST['id'];
	$name       = $_POST['supplier'];



	$mysqli->query("UPDATE  pos_supplier SET name ='$name' 
										 WHERE supplier_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Supplier Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "supplier.php";
							});
			</script>';
	
}