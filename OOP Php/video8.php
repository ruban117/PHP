<?php include 'Includes/CRUDClass.php';
error_reporting(0);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <form action="Partials/Reg.php" method="post">
  <div class="mb-3">
    <label for="fn" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fn" aria-describedby="emailHelp" name="fn">
  </div>
  <div class="mb-3">
    <label for="ln" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="ln" aria-describedby="emailHelp" name="ln">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Dob</label>
    <input type="text" class="form-control" id="dob" aria-describedby="emailHelp" name="dob">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>