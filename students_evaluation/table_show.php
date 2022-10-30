<?php

// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

$table_name= $_SESSION["table_name"];
$sem= $_SESSION["sem"];




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
  <section class="vh-100">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sr no</th>
          <th scope="col">Prn No</th>
          <th scope="col">Name</th>
          <th scope="col">Marks</th>
        </tr>
      </thead>
      <?php
      $query= "SELECT * from `SPS`.`{$table_name}`";
      $result= mysqli_query($conn, $query);
         $srno=1;
         $sn=1;

         while($row=mysqli_fetch_assoc($result))
         {
        
      ?>
      <tbody>
        <tr>
          <td><?php echo $srno; ?></td>
          <td><?php echo $row['prnno']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['result'];?></td>
        </tr>
        <?php
        $sn++;
        $srno++;
      } 
    
      ?>
          <!--
          <th scope="row">2</th>
          <td>Durgesh</td>
          <td>P</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Margesh</td>
          <td>P</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Dilesh</td>
          <td>F</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>Shankar</td>
          <td>F</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Shreya</td>
          <td>P</td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>Akash</td>
          <td>P</td>
        </tr>
        <tr>
          <th scope="row">8</th>
          <td>Meera</td>
          <td>P</td>
        </tr>
        <tr>
          <th scope="row">9</th>
          <td>Chirayu</td>
          <td>P</td>
        </tr>
        <tr> -->


      </tbody>
    </table>
    <div class="col-md-12 text-center">
      <a class="btn btn-primary" href="analysis.php" id="btnCheck">Insert</a>

      <a class="btn btn-primary" href="cancel_table.php" id="btnCheck">Cancel</a>
      <!-- <script>
            alert("Successfully Added");
          </script>     -->
  </section>
</body>

</html>