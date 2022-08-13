<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['username'])) {
        echo "you logged in  " . $_SESSION['username'];
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Open Market</title>
</head>
<body>
<center>
 <main class="container bg-light">   
<nav class="navbar navbar-expand-lg bg-light">
    <a class="nav-link btn btn-light btn-outline-danger" href="/proj">Home </a>  &ensp;
    <a class="nav-link btn btn-light btn-outline-danger" href="products.php">Products</a> &ensp;
    <?php

      if (isset($_SESSION['username'])) {
        echo '<a class="nav-link btn btn-light btn-outline-danger" href="newProduct.php">Add new product</a> &ensp;';
    }
    ?>
     

    <?php
    if (isset($_SESSION['username'])) {
     echo '<a class="nav-link btn btn-danger btn-outline-danger" href="logout.php">Log out</a> &ensp;';
    }
    ?>
    <?php
    if (!isset($_SESSION['username'])) {

    echo '<a class="nav-link btn btn-light btn-outline-danger" href="login.php" >Log In</a> &ensp;
    <a class="nav-link btn btn-light btn-outline-success" href="signup.php">Make new account</a>' ;
    }

    ?>
</nav>
<br>
