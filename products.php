<?php 
include('config/database_conn.php');

    // write query for all pizzas
    $sql = 'SELECT p.user_id, p.title, p.details, p.photo_url, p.created_at, u.location, u.id, u.phone FROM products p INNER JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC;';

    // get the result set (set of rows)
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free the $result from memory (good practise)
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);



?>

<?php include('static/navbar.php'); ?>

<?php foreach ($products as $product) { ?>
<div class="card" style="width: 18rem;">
  <img src="<?php echo $product['photo_url']; ?>" class="card-img-top" alt="photo">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['title']; ?></h5>
    <p class="card-text"><?php echo $product['details'];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Phone number : <?php echo $product['phone'];?></li>
    <li class="list-group-item">Location : <?php echo $product['location'];?></li>
    <li class="list-group-item">Posted at : <?php echo $product['created_at'];?></li>
  </ul> 
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<br> <hr>

<?php } ?>

<?php include("static/footer.php"); ?>