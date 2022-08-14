<?php include('static/navbar.php'); ?>
<?php 
if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        echo $_SESSION['username']; ?>
<?php include("static/footer.php"); ?>
