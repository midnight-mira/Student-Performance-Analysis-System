<?php


// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);



if (isset($_POST['submit'])) {
  $batch_year = $_POST['batch_year'];
  $sem_number = $_POST['sem'];
  if ($sem_number == "1" || "2") {
    $year = "FE";
  } elseif ($sem_number == "3" || "4") {
    $year = "SE";
  } elseif ($sem_number == "5" || "6") {
    $year = "TE";
  } else {
    $year = "BE";
  }


  $_SESSION["batch_year"] = $batch_year;
  $_SESSION["sem_number"] = $sem_number;
  $_SESSION["year"] = $year;
  

  header("location:next.php");

 
  
}


?>