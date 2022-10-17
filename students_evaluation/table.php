<?php
// includes the connection file.
include('../config/connection.php');
session_start();

require_once '../Box/src/Spout/Autoloader/autoload.php';

$from_row= $_SESSION["from_row"] ;
$to_row= $_SESSION["to_row"];
$name_col= $_SESSION["name_col"];
$marks_col= $_SESSION["marks_col"] ;

$name_cols = $name_col - 1;
$marks_cols = $marks_col - 1;
$from_row_modify = $from_row - 1;
$to_row_modify = $to_row - 1;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$filePath= $_SESSION["targetPath"];
echo $filePath;


$reader = ReaderEntityFactory::createXLSXReader();

$reader->open($filePath);

foreach ($reader->getSheetIterator() as $sheet) {
  foreach ($sheet->getRowIterator() as $row) {
    if ($rowNumber < $from_row && $rowNumber > $to_row) {
      $cells = $row->getCells();
      $nameCell = $cells[$name_cols];
      $markCell = $cells[$marks_cols];
      $name = $nameCell->getValue();
      $grade = $markCell->getValue();
    }
  }
}

$reader->close();
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
          <th scope="col">Name</th>
          <th scope="col">Marks</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Ramesh</td>
          <td>P</td>
        </tr>
        <tr>
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
        <tr>
          
      
      </tbody>
    </table>
    <div class="col-md-12 text-center">
      <a class="btn btn-primary" href="t_success.php" id="btnCheck">Insert</a>

      <a class="btn btn-primary" href="dashboard.php" id="btnCheck">Cancel</a>
      <!-- <script>
            alert("Successfully Added");
          </script>     -->
  </section>
</body>

</html>

<?php
/*
//for creation of tables
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
if ($db_select) {
  // echo "success";
}

$_SESSION["batch_year"] = $batch_year;
$_SESSION["sem_number"] = $sem_number;
$_SESSION["year"] = $year;
$sem = "sem" . $sem_number;
$table = $batch_year . "_" . $year . "_" . $sem;

$create_table_query = "CREATE TABLE `SPS`.`{$table}` (name varchar(200) not null, grade varchar(10) not null)";
$create_table_query_result = mysqli_query($conn, $create_table_query);

if ($year == "FE") {
  $full_table_name = $batch_year . "_table";
  $create_full_table = "CREATE TABLE `SPS`.`{$full_table_name}` (name varchar(200) not null, sem2 varchar(10) not null, sem3 varchar(10) not null, sem4 varchar(10) not null, sem5 varchar(10) not null, sem6 varchar(10) not null,sem7 varchar(10) not null, sem8 varchar(10) not null)";
  $query_full_table = mysqli_query($conn, $create_full_table);
}

if ($year == "SE") {
  $table_dse = $batch_year . "_DSE";
  $query_for_dse = "CREATE TABLE `SPS`.`{$table_dse}` (name varchar(200) not null, sem3 varchar(10) not null, sem4 varchar(10) not null, sem5 varchar(10) not null, sem6 varchar(10) not null,sem7 varchar(10) not null, sem8 varchar(10) not null)";
  $query_full_table = mysqli_query($conn, $query_for_dse);
}

$table_without_backlog = "CREATE TABLE without_backlog (year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) ";
$table_with_backlog = "CREATE TABLE with_backlog (year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) ";
$query_without_backlog=mysqli_query($conn, $table_without_backlog);
$query_with_backlog= mysqli_query($conn, $table_with_backlog);

*/
?>