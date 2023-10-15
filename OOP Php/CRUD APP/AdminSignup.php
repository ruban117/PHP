<?php
require_once 'Admindb.php';
$db = new AdminDb();
$error_message = ""; // Initialize an error message variable
$has_errors = false; // Initialize a variable to track errors

if (isset($_POST['sub1'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confpass = $_POST['confpassword'];
    $otp = $db->generateOTP();

    if ($pass != $confpass) {
        $error_message = "Passwords do not match"; // Set an error message
        $has_errors = true; // Set the flag to true
    } else if ($db->Exists($email) > 0) { // Use > 0 to check for existing email
        $error_message = "Email already exists"; // Set an error message
        $has_errors = true; // Set the flag to true
    }

    if (!$has_errors) {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        $_SESSION['otp'] = $otp;
        $html='<p>Dear User</p><br>
               <p>Your One Time Password (OTP) for creating account: <b>'.$otp.'</b></p><br>
               <p>Please note that the OTP is valid for only one session. If you try to refresh the page or <p>leave the OBDDMS portal, you will be required to regenerate a new OTP.</p><br>
               <p>If you did not request this OTP, please connect with us immediately at obddms@gmail.com.</p><br><br>
               <p>Regards,</p><br>
               <p>Social Service Group</p><br>
               <p>Online Blood Donors Database Management System</p><br>
               <p>obddms@gmail.com</p><br>';
        $db->smtp_mailer($_SESSION['email'], 'OBDDMS: Login Email ID Verification', $html);
        // You can add a success message or redirect to the OTP page here
        header("Location: otparea.php");
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
        <form action="" method="post">
        <?php if ($error_message) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $error_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php } ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="confpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confpassword" name="confpassword">
          </div>
          <button type="submit" class="btn btn-primary sub" name="sub1">Submit</button>
        </form>
      </div>
      <!-- OTP MODAL -->
  
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>