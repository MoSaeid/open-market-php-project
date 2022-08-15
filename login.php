<?php 
	include('config/database_conn.php');

	if(isset($_POST['submit'])){
		// check username and password if empty or not
		if(empty($_POST['username']) or empty($_POST['password'])){
			echo "<h2> please enter username and password </h2>";
		} else{ 
			//fetch data from database
				// sql query find specific user
				$sql = "SELECT id, username, password_hashed FROM users WHERE username = '".$_POST['username'] . "'";

				// get the result set (set of rows)
				$result = mysqli_query($conn, $sql);

				// fetch the resulting rows as an array
				$user_pass = mysqli_fetch_all($result, MYSQLI_ASSOC);
				if (!empty($user_pass)) {
					if((password_verify($_POST['password'], $user_pass[0]['password_hashed'])) and (($user_pass[0]['username'] == $_POST['username'])) ){
					echo "you logged in"; //Successfully logged in
					session_start();
					$_SESSION["username"]=$user_pass[0]['username'];
					$_SESSION["uid"]=$user_pass[0]['id'];
					header('location:index.php');


				}else{
					echo "WRONG Username or password";
				}	
				}
				
				// free the $result from memory (good practise)
				mysqli_free_result($result);

				// close connection
				mysqli_close($conn);

			}
		}



 ?>


<?php include('static/navbar.php'); ?>


<form action="login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter your username" required>
    <div id="emailHelp" class="form-text">Username is case sensitive</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password here" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Log in</button>
</form>
<?php include("static/footer.php"); ?>
