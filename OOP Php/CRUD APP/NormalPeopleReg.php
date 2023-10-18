<?php
require_once('NormalPeopleRegdb.php'); // Include your NormalPeopleDb class file
$err_message = '';
$has_errors = false;
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];
    $image = $_FILES['image'];

    // Email validation using a regular expression
    $email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($email_pattern, $email)) {
        $err_message = "Invalid email format";
        $has_errors = true;
    } elseif ($password != $confpassword) {
        $err_message = "Passwords do not match";
        $has_errors = true;
    } else {
        $db = new NormalPeopleDb();
        if ($db->Exists($email) > 0) {
            $err_message = "Email already exists";
            $has_errors = true;
        } else {
            $db->Insert($name, $email, $password, $image);
            $success_message = 'Account Created Successfully!';
        }
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

    <title>Normal People Registration Form</title>
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
              <a class="nav-link" href="NormalPeopleSignIn.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="NormalPeopleReg.php">Signup</a>
              </li>
          </ul>
        </div>
      </nav>
      <div class="container my-4">
      <form method="post" action="" enctype="multipart/form-data">
      <?php if ($err_message) { ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?php echo $err_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php }else{ ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?php echo $success_message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <?php }?>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <div class="form-group">
            <label for="confpassword">Confirm Password</label>
            <input type="password" name="confpassword" class="form-control" id="confpassword" required>
          </div>
          <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" accept="image/*" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
      <!-- OTP MODAL -->
  
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>