<?php

// includes the connection file.
include('../config/connection.php');
session_start();

//for creation of tables
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
if ($db_select) {
  // echo "success";
}
$batch_year = $_SESSION["batch_year"];
$sem_number = $_SESSION["sem_number"];
$year = $_SESSION["year"];
$sem = "sem" . $sem_number;
$table = $batch_year . "_" . $year . "_" . $sem;

$full_table_name = $batch_year . "_table";
echo $full_table_name;
$table_dse = $batch_year . "_DSE";

if ($year == "FE" && $sem == "sem1") {
  $insert_dse = "INSERT INTO `SPS`.`{$full_table_name}` (sr_no, prnno, name, sem1)
          SELECT sr_no, prnno, name, result FROM `SPS`.`{$table}` ";
  $insert_test = mysqli_query($conn, $insert_dse);
  if ($insert_test) {
    echo "table me value sem1";
  }
}

if ($sem == "sem2") {

  $query_sem2 = "UPDATE `SPS`. `{$full_table_name}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";
  $info_query_sem2 = mysqli_query($conn, $query_sem2);
  if ($info_query_sem2) {
    echo "hogaya sem2 ";
  }
}


if ($sem == "sem4") {
  $table_dse = $batch_year . "_DSE";

  $add_info_full = "UPDATE `SPS`.`{$full_table_name}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";
  $info_query_full = mysqli_query($conn, $add_info_full);
  if ($info_query_full) {
    echo "sem4 full";
  }

  $add_info_dse = $add_full = "UPDATE `SPS`.`{$table_dse}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";
  $add_full_table = mysqli_query($conn, $add_full);
  if ($add_full_table) {
    echo "sem4 dse";
  }
}

if ($sem == "sem3") {
  $insert_dse = "INSERT INTO `SPS`.`{$table_dse}` (sr_no, prnno, name, sem3)
          SELECT sr_no, prnno, name, result FROM `SPS`.`{$table}` WHERE `{$table}`.prnno NOT IN ( SELECT `{$full_table_name}`.prnno FROM `{$full_table_name}`)";
  $insert_test = mysqli_query($conn, $insert_dse);
  if ($insert_test) {
    echo "table me value dse";
    $add_full = "UPDATE `SPS`.`{$full_table_name}` t1, `SPS`.`{$table}` t2 SET t1.sem3= t2.result Where t1.prnno=t2.prnno;";
    $add_full_table = mysqli_query($conn, $add_full);
    if ($add_full_table) {
      echo "full";
    }
  }
}

if ($sem == "sem5" || $sem == "sem6" || $sem == "sem7" || $sem == "sem8") {

  $add_info_full = "UPDATE `SPS`.`{$full_table_name}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";
  $info_query_full = mysqli_query($conn, $add_info_full);
  if ($info_query_full) {
    echo "full";
  }

  $add_full = "UPDATE `SPS`.`{$table_dse}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";
  $add_full_table = mysqli_query($conn, $add_full);
  if ($add_full_table) {
    echo "dse";
  }
}

header("location:compute_marks.php");




/*
$table_without_backlog = "CREATE TABLE without_backlog (sr_no int not null auto_increment, year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) ";
$table_with_backlog = "CREATE TABLE with_backlog (sr_no int not null auto_increment, year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) )";
$query_without_backlog=mysqli_query($conn, $table_without_backlog);
$query_with_backlog= mysqli_query($conn, $table_with_backlog);


if($sem_number % 2 != 0){

  $sem_new = $sem - 1;
  $table_odd= $batch . "_" . $year . "_" . $sem_new;

  $val = mysqli_query($conn, 'select 1 from `.{$table}.` LIMIT 1');

  if ($val !== FALSE) {
      //DO SOMETHING! IT EXISTS!
      if($year=="FE"){
        $count=0;
        $compare_query= "SELECT count(*) as name from `.{ $full_table_name}.` where sem1='P' and sem2='P';";
        $compare_query_results= mysqli_query($conn,$compare_query);
        $data= mysqli_fetch_assoc($compare_query_results);
        $size= $row['name'];
        echo $size;
        $count= $size."+ 0";
      }
      elseif($year=="SE"){




      }
      elseif($year=="TE"){



      }
      else{


      }
  }
  else {
      echo "not exist";
  }

}*/
?>