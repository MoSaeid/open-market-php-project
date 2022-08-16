<?php 
include('config/database_conn.php');
    if(isset($_POST['delete'])){

        $post_id = $_POST['post_id'];

        $sql_del = "DELETE FROM products WHERE product_id = '$post_id'";

        if(mysqli_query($conn, $sql_del)){
            header('Location: products.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }

    }

    // write query for all pizzas
    $sql = 'SELECT p.product_id, p.user_id, p.title, p.details, p.photo_url, p.created_at, u.location, u.id, u.phone FROM products p INNER JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC;';

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
  <img src="<?php echo htmlspecialchars($product['photo_url']); ?>" class="card-img-top" alt="photo">
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($product['title']); ?></h5>
    <p class="card-text"><?php echo htmlspecialchars($product['details']);?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Phone number : <?php echo htmlspecialchars($product['phone']);?></li>
    <li class="list-group-item">Location : <?php echo htmlspecialchars($product['location']);?></li>
    <li class="list-group-item">Posted at : <?php echo htmlspecialchars($product['created_at']);?></li>
  </ul> 
  <div class="card-body">
    <form action="products.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($product['product_id']);?>">
        <?php

        if(!isset($_SESSION)) 
            { 
            session_start(); 
            }
            if (!empty($_SESSION['uid'])) {
                if ($_SESSION['uid'] == $product['id']) {
                    echo '<input type="submit" name="delete" class="btn btn-danger" value="DELETE MY POST">';       
        }
             
        } ?>

    </form>
  </div>
</div>
<br> <hr>

<?php } ?>

<?php include("static/footer.php"); ?>