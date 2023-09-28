<?php
include "../include/db_conn.php";

$action = $_POST['submit'];

switch($action) {
	case 'billnow':
		$user = $_POST['user'];
		$empid = $_POST['empid'];
		$quantity = $_POST['amount'];
		if($quantity <= 5){
			$amount = $quantity * 50; 
		}
		else if($quantity <= 15){
			$amount = $quantity * 70; 
		}
		else if($quantity <= 30){
			$amount = $quantity * 100; 
		}
		else if($quantity <= 50){
			$amount = $quantity * 120; 
		}
		else{
			$amount = $quantity * 150;
		}
		$sql = $conn->query("INSERT INTO bills (customerid, amount, quantity, servedby)
			VALUES ('$empid', '$amount', '$quantity', '$user')");
		$conn = null;
		echo "
		<script>alert('Bill has been added successfully!')</script>
		<script>window.location = 'bills.php'</script>
		";
	break;
		
}//switch

?>