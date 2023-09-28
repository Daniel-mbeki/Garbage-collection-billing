<?php include "header.php" ?>
<div class="container">
	<h2>List of Customers</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Customer Name</th>
				<th>Total Bill</th>
				<th>Total Payments</th>
				<th>Total Balance</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = $conn->query('SELECT customer.customerid, customer.customername, COALESCE(sum(bills.amount),0) as tb 
	FROM customer, bills where  customer.customerid = bills.customerid Group By customer.customerid ');
			while ($row = $stmt->fetch()) {
				$id = $row['customerid'];
				$tb = $row['tb'];
			?>

				<tr>

					<td><?php echo $row['customername']; ?></td>
					<td><?php echo $row['tb']; ?></td>
					<?php
					$stm = $conn->query("SELECT COALESCE(sum(amount),0) as tp
	FROM payment where  customerid = '$id' Group By customerid ");
					while ($res = $stm->fetch()) {
					?>
						<td><?php echo $res['tp']; ?></td>
						<td><?php echo $tb - $res['tp']; ?></td>
					<?php } ?>
					<td>
						<button type="button" id="<?php echo $id; ?>" class="btn btn-success" data-toggle="modal" data-target="#paynow" onclick="getid()">Confirm Payment</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="paynow" role="dialog">
	<div class="modal-dialog">


		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h3>Confirm Payment:</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action.php" method="POST">
					<input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
					<input type="hidden" id="uid" name="uid" value="">
					<div class="form-group">
						<label for="exampleFormControlInput1">Ref Number:</label>
						<input type="text" class="form-control" id="refno" name="refno" placeholder="RCT001" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Amount Paid:</label>
						<input type="number" class="form-control" id="amount" name="amount" required>
					</div>
					<button type="submit" name="submit" class="btn btn-success" value="paynow">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="alert alert-warning" role="alert" align="left">
					<b>Confirm before you submit</b>
				</div>
			</div>
		</div>
	</div>
</div>

  
<?php include "footer.php" ?>