<?php include "header.php" ?>
<div class="container">
	
  <h2>List of Regions</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Station</th>
		<th>First Name</th>
		<th>Surname</th>
		<th>Position</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$stmt = $conn->query("SELECT * FROM employees where position ='Admin' and status = 'Active'");
	while($row = $stmt->fetch()){
	?>
      <tr>
        <td><?php echo $row['workstation']; ?></td>
		<td><?php echo $row['fname']; ?></td>
		<td><?php echo $row['surname']; ?></td>
		<td><?php echo $row['position']; ?></td>
		<td><?php echo $row['phone']; ?></td>
      </tr>
	<?php } ?>
    </tbody>
  </table>
</div>
<?php include "footer.php" ?>
		