<?php include "header.php" ?>
<div class="container">
	<div class="d-inline">
		<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#Add">
			New Employee
		</button>
	</div>
	<h2>List of Employees</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Employee Name</th>
				<th>Employee Number</th>
				<th>Phone Number</th>
				<th>Station</th>
				<th>Position</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = $conn->query('SELECT * FROM employees');
			while ($row = $stmt->fetch()) {
			?>
				<tr>
					<td><?php echo $row['fname'] . " " . $row['surname']; ?></td>
					<td><?php echo $row['empno']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['workstation']; ?></td>
					<td><?php echo $row['position']; ?></td>
					<td>
						<button type="button" id="<?php echo $row['empno']; ?>" class="btn btn-success" data-toggle="modal" data-target="#EmpUpdate" onclick="getid()">Update</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="Add" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h3>Employees Form:</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action.php" method="POST">
					<input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
					<div class="form-group">
						<label for="exampleFormControlInput1">First Name:</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="Daniel:" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">SurName:</label>
						<input type="text" class="form-control" id="surname" name="surname" placeholder="Mutua:" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Phone:</label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="232768062076" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Employee Number:</label>
						<input type="text" class="form-control" id="empno" name="empno" placeholder="A001" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Password:</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="8 characters" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">Work Staion:</label>
						<select class="form-control" id="region" name="region">
							<option>Select Region</option>
							<?php
							$stmt = $conn->query('SELECT * FROM region where status = "Active"');

							while ($row = $stmt->fetch()) {
							?>
								<option><?php echo $row['regionname']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">Position:</label>
						<select class="form-control" id="position" name="position">
							<option>Admin</option>
							<option>Employee</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-success" value="emp">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="alert alert-warning" role="alert" align="left">
					<b>Confirm Before You submit</b>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="EmpUpdate" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h3>Update Employees:</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action.php" method="POST">
					<input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
					<input type="hidden" id="uid" name="empid" value="">
					<div class="form-group">
						<label for="exampleFormControlSelect2">Update Status:</label>
						<select class="form-control" id="status" name="status">
							<option value="Active">Active</option>
							<option value="Inctive">Inactive</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-success" value="empupdate">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="alert alert-warning" role="alert" align="left">
					<b>Confirm Before You Update</b>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php" ?>