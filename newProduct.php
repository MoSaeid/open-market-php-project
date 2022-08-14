<?php 
  include('config/database_conn.php');

	session_start();
	if (isset($_SESSION['username'])) {
	}else{
		die();
	}

  if(isset($_POST['submit'])){

        // check title
    if(empty($_POST['title'])){
      echo 'A title is required';
      die();
    }

      //check URL number
    if(empty($_POST['photo_url'])){
      echo 'A URL is required';
      die();
    }

      //check details
    if (empty($_POST['details'])) {
      echo "enter details";
      die();
    }



    // escape sql chars
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $photo_url = mysqli_real_escape_string($conn, $_POST['photo_url']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    
    // create sql
    $uid=$_SESSION['uid'];
    $sql = "INSERT INTO products(title, details, user_id, photo_url) VALUES('$title','$details','$uid', '$photo_url')";

    // save to db and check
    if(mysqli_query($conn, $sql)){
      // success
      header('Location: products.php');
    } else {
      echo 'query error: '. mysqli_error($conn);
    }

  }


 ?>

<?php include('static/navbar.php'); ?>

<form class="row g-3" action="newProduct.php" method="POST">

  <div class="col-md-6">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Used Car, Motorcycle, Computer" required>
  </div>

  <div class="col-md-6">
    <label for="photo_url" class="form-label">Image URL</label>
    <input type="text" name="photo_url" class="form-control" id="photo_url" value="https://via.placeholder.com/300.png/09f/fff" required>
  </div>

  <div class="col-12">
    <label for="details" class="form-label">Details</label>
    <input type="text" name="details" class="form-control" id="details" placeholder="Apartment, studio, or floor" required>
  </div>

  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Publish</button>
  </div>

</form>

<?php include("static/footer.php"); ?>
