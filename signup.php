<?php 


 ?>


<?php include('static/navbar.php'); ?>

<form action="signup.php" method="POST">
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter your username" class="form-control" required > <br>
	<label>Phone</label>
	<input type="text" name="phone" placeholder="Enter your phone number" class="form-control" required> <br>
	<label>Location</label>
	<input type="text" name="location" placeholder="Enter your location (Country, City, Street" class="form-control" required> <br>
	<label>Password</label>
	<input type="password" name="password" placeholder="Enter your password" class="form-control" required> <br>
	
	<button type="submit" name="submit" class="btn btn-primary"> Sign Up</button>
</form>


<?php include("static/footer.php"); ?>
