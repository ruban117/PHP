<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Using Where Clause</h1>
    <p class="lead">Testing Where Clause</p>
  </div>
</div>
<div class="container flex-wrap" style="display: flex; align-items: center; justify-content: center;">
    <?php
        $servername='localhost';
        $username='root';
        $password='';
        $database='contact-us-test';

        $conn=mysqli_connect($servername,$username,$password,$database);

        if(!$conn){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Something Went Wrong!</strong> We are facing some yechnical issues you can come later!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else{
            $sql="SELECT * FROM `contact_us_test` WHERE location = 'mumbai'";
            $res=mysqli_query($conn,$sql);

            if(!$res){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Something Went Wrong!</strong> We are facing some yechnical issues you can come later!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
            else{
                $num=mysqli_num_rows($res);

                if($num>0){
                  while($row=mysqli_fetch_assoc($res)){
                        echo '<div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">'.$row['Name'].'</h5>
                          <p class="card-text">Email Id:- '.$row['Email'].'</p>
                        </div>
                      </div>';
                  }
                }
            }
        }
    ?>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>