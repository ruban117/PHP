<?php
  require_once 'Admindb.php';

  $db = new AdminDb();
  $login = false;
  $loginError = '';
  $success='';
  
  if (isset($_POST['sub'])) {
      $email = $_POST['email'];
      $pass = $_POST['password'];
  
      if ($db->Login($email, $pass) == 1) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['name'] = $db->getName($email);
          header("Location: index.php");
      } else {
          $loginError = 'Invalid email or password. Please try again.';
      }
  }


  if(isset($_POST['fpassword'])){
    $femail=$_POST['femail'];
    $fpass=$_POST['npass'];
    $nconfpass=$_POST['ncnfpass'];

    if($fpass==$nconfpass){
      $db->ForgetPassword($femail,$fpass);
      $success="Password Has Been Changed Successfully";
    }else{
      $loginError = 'Please Check Your Password';
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
      <?php if (!$login) {
            if (!empty($loginError)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> ' . $loginError . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }else{
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> ' .$success. '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        } ?>
        <!-------------------------Forget Password Modal------------------------------------>
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
      
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Change Your Password Here</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
      
              <!-- Modal body -->
              <div class="modal-body px-4">
                <form action="" method="post" id="form-data">
                  <div class="form-group">
                    <input type="email" name="femail" class="form-control" placeholder="Email Address" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="npass" class="form-control" placeholder="New Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="ncnfpass" class="form-control" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="fpassword" id="insert" value="Add User" class="btn btn-danger btn-block">
                  </div>
                </form>
              </div>
      
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
      
            </div>
          </div>
        </div>
        <form method="post" action="">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <button type="submit" name="sub" class="btn btn-primary">Submit</button>
        </form>
        <div class="container mt-4 pass"style="cursor: pointer;">
          <b>Forget Password??</b>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
      let a=document.getElementsByClassName('pass')[0];
      a.addEventListener('click',(e)=>{
        $('#addModal').modal('toggle');
      })
    </script>
  </body>
</html>