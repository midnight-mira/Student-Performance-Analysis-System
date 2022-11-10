<?php
include('../config/connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</head>
<body>

    <img src="lr.png" class="img-responsive center-block d-block mx-auto" alt="Sample Image">
  <?php
      $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die($mysqli_error());

      if( $conn == true) {
        echo "connected successfully";
      }
      ?>
    <section class="vh-100" style="background-color: #022058;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <h3 class="mb-5">Login</h3>
                <form action="#" method="post">
                <div class="form-outline mb-4">
                  <label class="form-label">Email Address</label><br>
          <input type="text" name="admin_email" placeholder="Email id" class="form-control form-control-lg" required>
          
        </div>
        <div class="form-outline mb-4"> <label class="form-label">Password</label><br>
          <input type="password"  name="admin_pass" placeholder="password" class="form-control form-control-lg" required><br>
         
        </div>
        <div class="field">
          <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Login">
        </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>


<?php
if (isset($_POST['submit'])) {
  echo "form submitted";

  $admin_email= $_POST['admin_email'];
  $admin_pass= $_POST['admin_pass'];

  $conn= mysqli_connect(LOCALHOST, DB_USERNAME ,DB_PASSWORD) or die($mysqli_error());

  if ($conn == true) {
    echo "database connected";
  } 

//select database
$db_select = mysqli_select_db($conn, DB_NAME);
//check whether this is connected or not

if ($db_select == true) {
  echo "database Selected";
}

//fetching data from sql
$query= mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_email='$admin_email' AND admin_pass= '$admin_pass'");

//checking whether the data matches or not
$rows = mysqli_num_rows($query);
if($rows==1) {
  header('location: dashboard.php');
}
else {
   /* $error = "enter right credentials";
    echo $error; } */
   echo '<html><h2><em>Enter right credentials</em></h2></html>'; }

}

?> 