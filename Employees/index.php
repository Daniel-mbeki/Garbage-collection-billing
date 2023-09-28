<?php include "header.php" ?>
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
		<h3 class="card-title">Total Regions</h3>
		<p class="card-text">
		<?php
			$stmt = $conn->prepare('SELECT * FROM region');
			$stmt->execute();
			$regionCount = $stmt->rowCount();
			echo $regionCount;
		?>
		</p>
	  </div>
	</div>
	
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
		<h3 class="card-title">Total Employees</h3>
		<p class="card-text">
		<?php
			$stmt = $conn->prepare('SELECT * FROM employees');
			$stmt->execute();
			$regionCount = $stmt->rowCount();
			echo $regionCount;
		?>
		</p>
	  </div>
	</div>
	
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
		<h3 class="card-title">Total Customers</h3>
		<p class="card-text">
		<?php
			$stmt = $conn->prepare('SELECT * FROM customer');
			$stmt->execute();
			$regionCount = $stmt->rowCount();
			echo $regionCount;
		?>
		</p>
	  </div>
	</div>
<?php include "footer.php" ?>
		