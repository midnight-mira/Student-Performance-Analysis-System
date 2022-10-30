<?php


// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);


if (isset($_POST['submit'])) {
  $batch_year = $_POST['batch_year'];
  $sem_number = $_POST['sem'];
  echo $sem_number;

  if ($sem_number== "1" || $sem_number=="2") {
    $year = "FE";
  }elseif ($sem_number== "3" || $sem_number=="4") {

    $year = "SE";

  } elseif ($sem_number== "5" || $sem_number=="6") {

    $year = "TE";

  } else {
    
    $year = "BE";
  }
  echo $year;



  $_SESSION["batch_year"] = $batch_year;
  $_SESSION["sem_number"] = $sem_number;
  $_SESSION["year"] = $year;

  

  header("location:next.html");

 
  
}


?>