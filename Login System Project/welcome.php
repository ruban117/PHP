<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']!=true)){
    header("location: login.php");
    exit;
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome <?php echo $_SESSION['username']?></title>
  </head>
  <body>
  <?php require 'C:\xampp\htdocs\PHP_Course\Login System Project\partials\_navbar.php'; ?>
    <div class="container my-4">
      <div class="jumbotron">
        <h1 class="display-4">Welcome <?php echo $_SESSION['username']?></h1>
        <p class="lead">Hope You Are Well This Is Your Account Click On The Logout Button When You Are Done!</p>
        <hr class="my-4">
        <p>The Time And Date Is <?php echo date('d-m-y h:i:s');?></p>
        <a class="btn btn-primary btn-lg" href="\PHP_Course\Login System Project\logout.php" role="button">Log Out</a>
        <button class="btn btn-primary btn-lg"  role="button">View Profile</button>
        <button class="btn btn-primary btn-lg"  role="button">Update Profile</button>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>