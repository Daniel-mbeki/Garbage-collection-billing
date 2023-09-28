<?php
include "../include/db_conn.php";

$action = $_POST['submit'];

switch($action) {
	case 'addregion':
		$status = "Active";
		$user = str_replace("'", "''",$_POST['user']);
		$region = str_replace("'", "''",$_POST['region']);
		$sql = $conn->query("INSERT INTO region (regionname, status, addedby)
			VALUES ('$region', '$status', '$user')");
		$conn = null;
		echo "
		<script>alert('Region has been created successfully!')</script>
		<script>window.location = 'region.php'</script>
		";
	break;
	
	case 'emp':
		$user = str_replace("'", "''",$_POST['user']);
		$fname = str_replace("'", "''",$_POST['fname']);
		$surname = str_replace("'", "''",$_POST['surname']);
		$phone = str_replace("'", "''",$_POST['phone']);
		$region = str_replace("'", "''",$_POST['region']);
		$position = str_replace("'", "''",$_POST['position']);
		$empno = str_replace("'", "''",$_POST['empno']);
		$password = str_replace("'", "''",$_POST['password']);
		$sql = $conn->query("INSERT INTO employees (fname, surname, phone, workstation, position, empno, password, addedby, status)
			VALUES ('$fname', '$surname', '$phone', '$region', '$position', '$empno', '$password' , '$user', 'Active')");
		$conn = null;
		echo "
		<script>alert('Employee added successfully!')</script>
		<script>window.location = 'employees.php'</script>
		";
	break;
	
	case 'paynow':
		$user = $_POST['user'];
		$id = $_POST['uid'];
		$refno = $_POST['refno'];
		$amount = $_POST['amount'];
		$sql = $conn->query("INSERT INTO payment (customerid, refno, amount, serverby)
			VALUES ('$id', '$refno', '$amount', '$user')");
		$conn = null;
		echo "
		<script>alert('Payment added successfully!')</script>
		<script>window.location = 'payment.php'</script>
		";
	break;
	
	case 'Change':
		$email = $_POST['email'];
		$new_password = md5($_POST['new_password']);
		$sql = $conn->query("UPDATE tutors SET password = '$new_password' WHERE email = '$email' ");
		$conn = null;
		echo "
		<script>alert('Your password has been changed successfully!')</script>
		<script>window.location = '../teachers/index.php'</script>
		";
	break;
	case 'updateregion':
		$user = $_POST['user'];
		$id = $_POST['uid'];
		$status = $_POST['status'];
		$sql = $conn->query("UPDATE region SET status = '$status', addedby = '$user' WHERE regionname = '$id' ");
		$conn = null;
		echo "
		<script>alert('Region updated successfully!')</script>
		<script>window.location = 'region.php'</script>
		";
	break;
	case 'empupdate':
		$user = $_POST['user'];
		$id = $_POST['uid'];
		$status = $_POST['status'];
		$sql = $conn->query("UPDATE employees SET status = '$status', addedby = '$user' WHERE empno = '$id' ");
		$conn = null;
		echo "
		<script>alert('Employee record updated successfully!')</script>
		<script>window.location = 'employees.php'</script>
		";
	break;

}//switch
