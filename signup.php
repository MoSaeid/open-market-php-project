<?php 
	include('config/database_conn.php');

	if(isset($_POST['submit'])){
				// check username
		if(empty($_POST['username'])){
			echo 'A username is required';
			die();
		}

			//check phone number
		if(empty($_POST['phone'])){
			echo 'A phone is required';
			die();
		}


		if (empty($_POST['location'])) {
			echo "enter location";
			die();
		}

		if (empty($_POST['password'])) {
			echo "enter password";
			die();
		}

		// escape sql chars
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password_hashed = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT)); //hashed password
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$location = mysqli_real_escape_string($conn, $_POST['location']);

		// create sql
		$sql = "INSERT INTO users(username,password_hashed,phone,location) VALUES('$username','$password_hashed','$phone', '$location')";

		// save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}


 ?>


<?php include('static/navbar.php'); ?>

<form action="signup.php" method="POST">
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter your username" class="form-control"  required> <br>
	<label>Phone</label>
	<input type="text" name="phone" placeholder="Enter your phone number" class="form-control" required> <br>
	<label>Location</label>
	<input type="text" name="location" placeholder="Enter your location (Country, City, Street" class="form-control" required> <br>
	<label>Password</label>
	<input type="password" name="password" placeholder="Enter your password" class="form-control" required> <br>
	
	<button type="submit" name="submit" class="btn btn-primary"> Sign Up</button>
</form>


<?php include("static/footer.php"); ?>
