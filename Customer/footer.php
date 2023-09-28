 </div>
 
 <div class="modal fade" id="change_account" role="dialog">
	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		<h3>Phone : <?php echo $_SESSION['name']; ?></h3>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<h4>Change Your Password</h4>
			<form action="../teachers/teachers_processing.php" method="POST">
				<input type="hidden" name="email" value="<?php echo $_SESSION['name']; ?>" >
				 <div class="form-group">
					<label for="exampleFormControlInput1">Old Password:</label>
					<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old password:" required>
				 </div>
				 <div class="form-group">
					<label for="exampleFormControlInput1">New Password:</label>
					<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password:" required>
				 </div>
				<button type="submit" name="submit" class="btn btn-primary" value="Change" >Change</button>			  
			</form>
		</div>
		<div class="modal-footer">
		<div class="alert alert-warning" role="alert" align="left">
			<b>Master Your Password</b>
		</div>
		</div>
	  </div>
	</div>
</div>
 
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
<script>
function getid(){
	var id = parseInt(event.srcElement.id);
	document.getElementById("empid").value = id;
	}
</script>
	
  </body>
</html>