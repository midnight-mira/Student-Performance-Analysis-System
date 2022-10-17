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
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form method="POST" action="table.php">
                <div class="form-group">
                  <label for="formGroupExampleInput">From Row</label>
                  <input type="text" name="from_row" class="form-control" id="formGroupExampleInput" placeholder="Add Row Number">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">To Row</label>
                  <input type="text" name="to_row" class="form-control" id="formGroupExampleInput" placeholder="Add Row Number">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">NAME</label>
                  <input type="text" name="name_col" class="form-control" id="formGroupExampleInput2" placeholder="COLUMN NUMBER">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput3">MARKS</label>
                  <input type="text" name="marks_col" class="form-control" id="formGroupExampleInput2" placeholder="COLUMN NUMBER">
                </div><br>
                <div class="field">
                  <input type="submit" class="btn btn-success" name="submit" value="Submit">
                </div>
              </form>
              <?php
              $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
              $db_select = mysqli_select_db($conn, DB_NAME);
              if ($db_select) {
                  // echo "success";
              } 

              if (isset($_POST['submit'])) {
                $from_row = $_POST['from_row'];
                $to_row = $_POST['to_row'];
                $name_col = $_POST['name_col'];
                $marks_col = $_POST['marks_col'];

                $_SESSION["from_row"] =$from_row;
                $_SESSION["to_row"] = $to_row;
                $_SESSION["name_col"] = $name_col;
                $_SESSION["marks_col"] = $marks_col;
              }

             

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>