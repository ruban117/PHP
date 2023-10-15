<?php
    require_once 'Admindb.php';
    $error_message = ""; // Initialize an error message variable
    $has_errors = false;
    if(isset($_POST['submit'])){
        session_start();
        $otp=$_POST['otp'];
        if($_SESSION['otp']==$otp){
          $db=new AdminDb();
          $db->Insert($_SESSION['name'],$_SESSION['email'],$_SESSION['pass']);
          session_destroy();
          header('Location: AdminLogin.php');
        }
        else{
          $has_errors=true;
          $error_message="Invalid Otp Try Again!!";
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Admin Login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Navbar</a>
    
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="AdminLogin.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="AdminSignup.php">Signup</a>
              </li>
          </ul>
        </div>
      </nav>
        <div class="container my-4">
        <?php if ($error_message) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $error_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php } ?>
            <form action="" method="post" id="form-data">
                <div class="form-group">
                    <label for="otp">Enter One Time Password(OTP)</label>
                    <input type="number" class="form-control" id="otp" name="otp">
                  </div>
                  <button type="submit" class="btn btn-primary sub" name="submit">Submit</button>
            </form>
        </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>