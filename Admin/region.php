<?php include "header.php" ?>
<div class="container">
	<div class="d-inline">
		<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#Add">
			New Region
		</button>
	</div>
	<h2>List of Regions</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Region Name</th>
				<th>Manager</th>
				<th>phone</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stmt = $conn->query("SELECT * FROM employees where position = 'Admin'");
			while ($row = $stmt->fetch()) {
			?>
				<tr>
					<td><?php echo $row['workstation']; ?></td>
					<td><?php echo $row['fname'] . " " . $row['surname']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<button type="button" class="btn btn-success" id="<?php echo $row['workstation']; ?>" data-toggle="modal" data-target="#RegionUpdate" onclick="getid()">Update</button>
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
				<h3>Add Region:</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action.php" method="POST">
					<input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
					<div class="form-group">
						<label for="exampleFormControlInput1">Region Name:</label>
						<input type="text" class="form-control" id="region" name="region" placeholder="Region Name" required>
					</div>
					<button type="submit" name="submit" class="btn btn-success" value="addregion">Add</button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="alert alert-warning" role="alert" align="left">
					<b>Confirm Before You Submit</b>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="RegionUpdate" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h3>Update Region:</h3>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="action.php" method="POST">
					<input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
					<input type="hidden" id="uid" name="uid" value="">
					<div class="form-group">
						<label for="exampleFormControlSelect2">Update Status:</label>
						<select class="form-control" id="status" name="status">
							<option value="Active">Active</option>
							<option value="Inctive">Inactive</option>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-success" value="updateregion">Add</button>
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