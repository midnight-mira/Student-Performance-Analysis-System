<?php
// includes the connection file.
include('../config/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <img src="lr.png" class="img-responsive center-block d-block mx-auto" alt="Sample Image">
        <section class="vh-100" style="background-color: #022058;">    
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card shadow-5-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      
                        <form method="POST">
                            <div class="form-group">
                              <label for="formGroupExampleInput">Batch</label>
                              <select class="form-select" aria-label="Default select example">
                                <option selected>Select Your Batch</option>
                                <option value="1">2022</option>
                                <option value="2">2021</option>
                                <option value="3">2020</option>
                                <option value="4">2019</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Year</label>
                              <select class="form-select" aria-label="Default select example">
                                <option selected>Select Your Batch</option>
                                <option value="1" name="FE">FE</option>
                                <option value="2" name="SE">SE</option>
                                <option value="3" name="TE">TE</option>
                                <option value="4" name="BE">BE</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput3">Sem</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select Your Batch</option>
                                    <option value="1">Sem1</option>
                                    <option value="2">Sem2</option>
                                    <option value="3">Sem3</option>
                                    <option value="4">Sem4</option>
                                    <option value="5">Sem5</option>
                                    <option value="6">Sem6</option>
                                    <option value="7">Sem7</option>
                                    <option value="8">Sem8</option>
                                      </select>
                                  </select>
                                </div><br>
                              <a class="btn btn-primary"  href="next.php">Submit</a>
                          </form>
        </div>
      </div>
    </div>
</section>
</body>
</html 
