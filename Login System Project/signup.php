<?php
  $successalert=false;
  $erroralert=false;
  $ualert=false;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'C:\xampp\htdocs\PHP_Course\Login System Project\partials\_DatabaseConnect.php';
    $uname=$_POST['email'];
    $pass=$_POST['password'];
    $conf=$_POST['cpassword'];
    $existssql="SELECT * FROM `user_table` WHERE Username='$uname'";
    $res=mysqli_query($conn,$existssql);
    $existnum=mysqli_num_rows($res);
    if($existnum>0){
      $ualert='Username Already Exists';
    }
    else{
      if($pass==$conf){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql="INSERT INTO `user_table` (`S_NO`, `Username`, `Password`, `Time`) VALUES (NULL, '$uname', '$hash', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res){
          $successalert=true;
        }
      }
      else{
        $erroralert=true;
      }
  }
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

    <title>Sign Up Here</title>
  </head>
  <body>
  <?php require 'C:\xampp\htdocs\PHP_Course\Login System Project\partials\_navbar.php'; ?>
  <?php
      if($successalert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Data Is Taken Successfully You Can Log In.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      if($erroralert){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Passwords Do not match Please Try Again!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
      if($ualert){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>'.$ualert.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }

  ?>
  <h2 class='text-center my-4'>SignUp To Our Website</h2>
  <div class="container my-4"style="display:flex;align-items:center;justify-content:center; flex-direction:column;">
    
    <form action="/PHP_Course/Login System Project/signup.php" method='post'>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" maxlength="30" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="30" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
    <small id="emailHelp" class="form-text text-muted">Make Sure You Have Enter The Same Password</small>
  </div>
  <button type="submit" class="btn btn-primary text-center">Submit</button>
  <button type="reset" class="btn btn-primary ml-8">Reset</button>
</form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>