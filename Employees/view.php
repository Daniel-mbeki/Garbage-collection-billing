<?php include "header.php" ?>
<div class="container">
  <h2>List of Bills</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer Name</th>
		<th>Date</th>
        <th>Quantity</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$station = $_SESSION['station'];
	$stmt = $conn->query("SELECT customer.customerid, customer.region, customer.customername, bills.customerid, bills.amount, bills.quantity, bills.date 
	FROM customer, bills where customer.region = '$station' AND customer.customerid=bills.customerid order by id desc");
	while($row = $stmt->fetch()){
	?>
      <tr>
	  
		<td><?php echo $row['customername']; ?></td>
		<td><?php echo $row['date']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
		<td><?php echo $row['amount']; ?></td>
      </tr>
	<?php } ?>
    </tbody>
  </table>
</div>

<?php include "footer.php" ?>
		
		