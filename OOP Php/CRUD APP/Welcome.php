<?php
session_start();
require_once 'NormalPeopleRegdb.php';
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] != true)) {
    header("location: NormalPeopleSignIn.php");
    exit;
}
$db = new NormalPeopleDb();
$user = $db->getUserByEmail($_SESSION['email']);

if(isset($_POST['emailbtn'])){
    $msg='<form action="http://localhost/PHP/OOP%20Php/CRUD%20APP/Welcome.php" method="post">
    <button type="submit" name="emailbtn2">Sent</button>
    </form>';
    $db->smtp_mailer('rubanpathak11796@gmail.com','A Button', $msg);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome
        <?php echo  $_SESSION['name'];?>
    </title>
</head>

<body>

    <!--View Modal -->
    <div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    <div class="card" style="width: 18rem;">
                    <img src="<?php echo $user['image']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo  $_SESSION['name'];?></h5>
                            <p>Email:- <?php echo $_SESSION['email'];?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------Email Modal------------------------------>
    <div class="modal fade" id="emailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    <form action="" method="post">
                        <button type="submit" name="emailbtn">Sent</button>
                    </form>
                    <?php
                if (isset($_POST['emailbtn2'])) {
                    // Fetch the name from the database and store it in $name
                    $name = $db->getName($_SESSION['email']);
                    echo $name; // Display the name
                }
                ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout2.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome
                <?php echo $_SESSION['name'];?>
            </h1>
            <p class="lead">Hope You Are Well This Is Your Account Click On The Logout Button When You Are Done!</p>
            <hr class="my-4">
            <p>The Time And Date Is</p>
            <a class="btn btn-primary btn-lg" href="logout2.php" role="button">Log Out</a>
            <button class="btn btn-primary btn-lg" id="view" role="button">View Profile</button>
            <button class="btn btn-primary btn-lg email" role="button">Sent Email Check</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        let a = document.getElementById('view');
        let b=document.getElementsByClassName('email')[0];
        a.addEventListener('click', (element) => {
            console.log(element);
            $('#viewmodal').modal('toggle')
        })
        b.addEventListener('click',(e)=>{
            $('#emailmodal').modal('toggle')
        })
    </script>
</body>

</html>