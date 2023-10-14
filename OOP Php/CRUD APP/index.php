<?php require_once 'db.php';
  $db=new Database();
  $data=$db->Read();

  if(isset($_POST['insert'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    if ($db->Exists($email)>1) {
  
  } else {
      try {
          $db->Insert($fname, $lname, $email, $phone);
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> User Added Successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        header("Location: index.php");

      } catch (Exception $e) {
          // Handle the insert error here
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Unsuccess!</strong> Your Email Is Already Exists
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
  }
}elseif (isset($_POST['update'])) {
  $id = $_POST['snoedit'];
  $fname = $_POST['fnameedit'];
  $lname = $_POST['lnameedit'];
  $email = $_POST['emailedit'];
  $phone = $_POST['phoneedit'];

  try {
      $result = $db->Update($id, $fname, $lname, $email, $phone);
      if ($result) {
          header("Location: index.php");
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> User Updated Successfully.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';

      } else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> Failed to update user.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      }
  } catch (Exception $e) {
      // Handle the update error here
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> ' . $e->getMessage() . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
}elseif(isset($_POST['yes'])){
  $id=$_POST['snodelete'];
  try {
    $result = $db->Delete($id);
    if ($result) {
        header("Location: index.php");
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> User Deleated Successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';

    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to delete user.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
} catch (Exception $e) {
    // Handle the update error here
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $e->getMessage() . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">

  <title>CRUD OOP</title>
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
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="text-center text-danger font-weight-normal my-3">Welcome Name</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <h4 class="mt-2 text-primary">All Users In Database</h4>
      </div>
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i
            class="fas fa-user-plus fa-lg"></i>&nbsp;Add New User</button>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive" id="showUser">
          <?php if($db->TotalRowCount()>0){
            echo'<table class="table table-striped table-sm table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
            $i=1;
            foreach($data as $row){
                echo'<tr class="text-center text-secondary">
                    <td>'.$i.'</td>
                    <td>'.$row['f_name'].'</td>
                    <td>'.$row['l_name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['contact'].'</td>
                    <td>
                        <button type="button" class="btn btn-primary edit" id='.$row['id'].'>Edit</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary delete" id=d'.$row['id'].'>Delete</button>&nbsp;&nbsp;
                    </td>
                </tr>
                ';
                $i++;
            }
        }?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!---------------------------------ADD USER MODAL---------------------------->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <div class="form-group">
              <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
              <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-danger btn-block">
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

  <!---------------------------------Update MODAL---------------------------->
  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <input type="hidden" name="snoedit" id="snoedit">
            <div class="form-group">
              <input type="text" name="fnameedit" id="fnameedit" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <input type="text" name="lnameedit" id="lnameedit" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <input type="email" name="emailedit" id="emailedit" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="tel" name="phoneedit" id="phoneedit" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
              <input type="submit" name="update" id="update" value="Update User" class="btn btn-danger btn-block">
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
  <!---------------------------------DELETE MODAL CONFIRM---------------------------->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Do You Want To Delete?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form action="" method="post" id="form-data">
            <input type="hidden" name="snodelete" id="snodelete">
            <div class="form-group">
              <input type="submit" name="yes" id="yes" value="Yes" class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      $("table").DataTable({
        order: [0, 'desc']
      });

    });
  </script>
  <script>
    let a=document.getElementsByClassName('edit');
    let b=document.getElementsByClassName('delete');
    Array.from(a).forEach((elements)=>{
      elements.addEventListener('click',(e)=>{
        console.log("Listened");
        tr=e.target.parentNode.parentNode;
        fn=tr.getElementsByTagName("td")[1].innerText;
        ln=tr.getElementsByTagName("td")[2].innerText;
        email=tr.getElementsByTagName("td")[3].innerText;
        ph=tr.getElementsByTagName("td")[4].innerText;

        fnameedit.value=fn;
        lnameedit.value=ln;
        emailedit.value=email;
        phoneedit.value=ph;
        snoedit.value=e.target.id;
        $('#editModal').modal('toggle');

        console.log(fn," ",ln," ",email," ",ph);
      })
    })
    Array.from(b).forEach((elements)=>{
      elements.addEventListener('click',(e)=>{
        console.log("Listened");
        snodelete.value=e.target.id.substr(1,);
        console.log(snodelete.value);
        $('#deleteModal').modal('toggle');
      })
    })
  </script>
</body>

</html>