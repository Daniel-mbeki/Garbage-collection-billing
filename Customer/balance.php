
<?php include "header.php" ?>
<div class="container">
  <h2>Customers Payments</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer Name</th>
		<th>Office Number</th>
        <th>Total Bill</th>
        <th>Total Payments</th>
		<th>Total Balance</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$myArray = array(
		"station" => "myStation",
		
	);
	
	$_SESSION['station'] = $myArray['station'];
	$station = $_SESSION['station'];
	$stmt = $conn->query("SELECT customer.customerid, customer.phone,customer.customername, customer.region, COALESCE(sum(bills.amount),0) as tb 
	FROM customer, bills where  customer.region = '$station' AND customer.customerid = bills.customerid Group By customer.customerid ");
	while($row = $stmt->fetch()){
		$id = $row['customerid'];
		$tb = $row['tb'];
	?>
      <tr>
	  
		<td><?php echo $row['customername']; ?></td>
		<td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['tb']; ?></td>
	<?php
	$stm = $conn->query("SELECT COALESCE(sum(amount),0) as tp
	FROM payment where  customerid = '$id' Group By customerid ");
	while($res = $stm->fetch()){
	?>	
		<td><?php echo $res['tp']; ?></td>
		<td><?php echo $tb-$res['tp']; ?></td>
	<?php } ?>
      </tr>
	<?php } ?>
    </tbody>
  </table>
</div>

<?php include "footer.php" ?>
