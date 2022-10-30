<?php
include('../config/connection.php');
session_start();

require_once '../Box/src/Spout/Autoloader/autoload.php';


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="valid.js"></script>
</head>
<body>
<img src="lr.png" class="img-responsive center-block d-block mx-auto" alt="Sample Image">
        <section class="vh-100" style="background-color: #022058;">    
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card shadow-5-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
   
                        <form action="#" method="post" enctype="multipart/form-data">
                                             
                        <div class="mb-3">
                        <label for="formFile" class="form-label"> Select excel to upload:</label>
                         <input class="form-control" type="file" name="excel_file" >
                        </div>
                         <input type="submit" class="btn btn-success" value="Upload Excel File" name="Submit">
                        <body>

</body>
</html>
<?php

if(isset($_POST['Submit'])){



  $allowed_ext = ['csv', 'xlsx'];

  $fileName= $_FILES['excel_file']['name'];
  $checking = explode(".",$fileName);

  $file_ext = end($checking);

  if(in_array($file_ext, $allowed_ext)){
    $targetPath = $_FILES['excel_file']['tmp_name'];
    $file_name= $_FILES['excel_file']['name'];
    move_uploaded_file($targetPath, "uploaded-files/".$file_name);
    $_SESSION["targetPath"]= $targetPath;
    $_SESSION["tmp_name"]= $tmp_name;
    $_SESSION["fileName"]= $file_name;
    header('location:Branch.html');
    
  }
  else {
    echo "<h2>Invalid File</h2>";
  }



}
?>

