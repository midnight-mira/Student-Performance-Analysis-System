<?php

// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

$table_name= $_SESSION["table_name"];
$batch= $_SESSION["batch_year"];
$full_table_name=$batch . "_table";
$dse= $batch . "_DSE";
$year= $_SESSION["year"];
$sem= $_SESSION["sem_number"];

$cancel_table= "DROP TABLE `SPS`.`{$table_name}`";
$cancel_result= mysqli_query($conn, $cancel_table);
if($cancel_result){
    echo "success";
}
if($year=="FE" and $sem=="1"){
    $drop_full="DROP TABLE `SPS`.`{$full_table_name}`";
    $drop_full_result= mysqli_query($conn, $drop_full);
}elseif($year=="SE" && $sem=="3"){
    $drop_dse= "DROP TABLE `SPS`.`{$dse}`";
    $drop_dse_query= mysqli_query($conn, $drop_dse);
}

header("location:import.php");


?>