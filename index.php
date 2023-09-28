<?php include "include/db_conn.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/afbdc355d7.js" crossorigin="anonymous"></script>
</head>
<style>

      body {
        background-image: url('imagess/banner2.jpg');
        background-repeat: no-repeat;
        background-size: cover;
      }
   
   
    </style>
<body>



	<div class="topnav" id="myTopnav">
		<a href="home.php" class="active">Home</a>
		<a href="about.php">About</a>
		<a href="contact.php">Contact</a>
		<a href="#SignUp" data-toggle="modal" data-target="#SignUp">SignUp</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	</div>

	<div class="modal fade" id="SignUp" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3>SignUp Form<h3>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" id="myTab" role="tablist" style="position:static; height:auto;">
						<li class="nav-item active">
							<a href="#login" aria-controls="login" role="tab" data-toggle="tab"><b>Login</b></a>
						</li>
						<li class="nav-item">
							<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><b>Register</b></a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="login">
							<form action="./include/login.php" method="POST">
								<div class="form-group">
									<label for="exampleFormControlInput1">Phone Number:</label>
									<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter your Phone Number" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Password:</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password:" required>
								</div>
								<button type="submit" name="submit" value="login" class="btn btn-primary">Login</button>
							</form>
						</div>

						<div role="tabpanel" class="tab-pane" id="profile">
							<form action="./customer/action.php" method="POST">
								<div class="form-group">
									<label for="exampleFormControlInput1">Your name:</label>
									<input type="text" class="form-control" id="fname" name="fname" placeholder="Mbeki Mutua" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Phone Number:</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone Number" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Email address:</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect2">Select Region:</label>
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
									<label for="exampleFormControlInput1">Password:</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="8 characters:" required>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" required>
									<label class="form-check-label" for="exampleCheck1">I agree to the terms and conditions.</label>
								</div>
								<button type="submit" name="submit" value="register" class="btn btn-primary">Register</button>
							</form>
						</div>

					</div>

				</div>
			</div>
		</div>
		<?php if (isset($_GET['error'])) { ?>
			<p color="red"><?php echo $_GET['error']; ?></p>
		<?php } ?>
	</div>

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
	</script>


	<section id="services">
		<h2>Our Services</h2>
		<p>Our team provides a range of garbage collection services to meet your needs:</p>
		<ol>
			<li>Residential garbage collection: We offer weekly pickup of household garbage, including recyclables and green waste.</li>
			<img src="images/3.png" alt="image" height="300px" width="350px">
			<li>Commercial garbage collection: We provide customized garbage collection services for businesses of all sizes.</li>
			<img src="images/1.png" alt="image" height="300px" width="350px">
			<li>Special waste disposal: We have the expertise to handle a variety of special waste, including hazardous materials and medical waste.</li>
			<img src="images/0.png" alt="image" height="300px" width="350px">
			<li>Recycling services: We offer a range of recycling services to help reduce your carbon footprint.</li>
			<img src="images/dan.jpg" alt="image" height="300px" width="350px">
		</ol>
	</section>

	
	
	
	

	<div class="container-fluid">
		<section id="sectthree">
			<h2>Get In Touch With Us</h2>

			<div class="custom">
				<p>Tel: + 254 768062076 | 07417 778 292<br />
					Email: info@ice.co.ke <br />
					Ralli House Building, <br />
					Ground FloorNyerere Avenue, Kilifi<br />
					P.O Box 75-100 Kilifi, Kenya</p>
			</div>
		</section>

	</div>
	<footer class="my-footer">
		<a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a>
		<a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
		<a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
		<a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a>
		<a href="https://www.linkedin.com/in"><i class="fa-brands fa-linkedin"></i></a>
		<hr class="horizontal">
		<p class="rights">&copy; 2023 Garbage Collection Website. All rights reserved.</p>
	</footer>
</body>

</html>