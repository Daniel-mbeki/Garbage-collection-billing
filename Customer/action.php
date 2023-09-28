<?php
include "../include/db_conn.php";

$action = $_POST['submit'];

switch($action) {
	case 'billnow':
		$user = $_POST['user'];
		$empid = $_POST['empid'];
		$quantity = $_POST['amount'];
		if($quantity <= 5){
			$amount = $quantity * 20000; 
		}
		else if($quantity <= 10){
			$amount = $quantity * 37000; 
		}
		else if($quantity <= 15){
			$amount = $quantity * 55000; 
		}
		else if($quantity <= 30){
			$amount = $quantity * 95000; 
		}
		else{
			$amount = $quantity * 125000;
		}
		$sql = $conn->query("INSERT INTO bills (customerid, amount, quantity, servedby)
			VALUES ('$empid', '$amount', '$quantity', '$user')");
		$conn = null;
		echo "
		<script>alert('Bill has been added successfully!')</script>
		<script>window.location = 'bills.php'</script>
		";
	break;
	case 'register':
		$fname = $_POST['fname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$region = $_POST['region'];
		$password = $_POST['password'];
		$sql = $conn->query("INSERT INTO customer (customername, phone, email, region, password)
			VALUES ('$fname', '$phone', '$email', '$region', '$password')");
		$conn = null;
		echo "
		<script>alert('Account created successfully!')</script>
		<script>window.location = '../index.php'</script>
		";
	break;
		
}//switch

?>