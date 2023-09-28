<?php include "header.php" ?>
<div class="container">
  <h2>My Payments</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
		<th>Reciept Number</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$phone = $_SESSION['name'];
	$stmt = $conn->query("SELECT customer.customerid, customer.phone, payment.customerid, payment.refno, payment.amount, payment.date
	FROM customer, payment where  customer.phone = '$phone' AND customer.customerid = payment.customerid Group By payment.id");
	while($row = $stmt->fetch()){
	?>
      <tr>
	  
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['refno']; ?></td>
        <td><?php echo $row['amount']; ?></td>
      </tr>
	<?php } ?>
    </tbody>
  </table>
</div>

<?php include "footer.php" ?>
		
		