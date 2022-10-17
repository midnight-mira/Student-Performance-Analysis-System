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


/*$_SESSION["batch_year"] = $batch_year;
$_SESSION["sem_number"] = $sem_number;
"select * from ".$table_1." t1 inner join ".$table_2." t2 on t1.name = t2.name;";
$_SESSION["year"] = $year;*/
$sem = "sem" . $sem_number;
$table = $batch_year . "_" . $year . "_" . $sem;

$create_table_query = "CREATE TABLE `SPS`.`{$table}` (name varchar(200) not null, grade varchar(10) not null)";
$create_table_query_result = mysqli_query($conn, $create_table_query);
if($create_table_query_result){
    
}

if ($year == "FE") {
  $full_table_name = $batch_year . "_table";
  $create_full_table = "CREATE TABLE `SPS`.`{$full_table_name}` (name varchar(200) not null, sem2 varchar(10) not null, sem3 varchar(10) not null, sem4 varchar(10) not null, sem5 varchar(10) not null, sem6 varchar(10) not null,sem7 varchar(10) not null, sem8 varchar(10) not null)";
  $query_full_table = mysqli_query($conn, $create_full_table);
  if($create_full_table){
    $insert= "select * from ".$create_full_table." t1 inner join ".$table." t2 on t1.name = t2.name;" ;
    $insert_query= mysqli_query($conn,$insert);
    if($insert_query){
      $add_info= "UPDATE ".$full_table_name.",".$table." t2 SET t1.".$sem."= t2.grade Where t1.name=t2.name;";
      $info_query= mysqli_query($conn, $add_info);
    }
  }
}

if ($year == "SE") {
  $table_dse = $batch_year . "_DSE";
  $query_for_dse = "CREATE TABLE `SPS`.`{$table_dse}` (name varchar(200) not null, sem3 varchar(10) not null, sem4 varchar(10) not null, sem5 varchar(10) not null, sem6 varchar(10) not null,sem7 varchar(10) not null, sem8 varchar(10) not null)";
  $query_full_table = mysqli_query($conn, $query_for_dse);

  if($query_for_dse){
    $add_info= "UPDATE ".$full_table_name.",".$table." t2 SET t1.".$sem."= t2.grade Where t1.name=t2.name;";
    $info_query= mysqli_query($conn, $add_info);

    $add_info= "UPDATE ".$table_dse.",".$table." t2 SET t1.".$sem."= t2.grade Where t1.name=t2.name;";
    $info_query= mysqli_query($conn, $add_info);

  }

}
$table_without_backlog = "CREATE TABLE without_backlog (year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) ";
$table_with_backlog = "CREATE TABLE with_backlog (year varchar(200) not null, intake varchar(10) not null, year1 varchar(100), year2 varchar(100), year3 varchar(100), year4 varchar(100) ";
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
        $compare_query= "SELECT count(*) as name from". $full_table_name. "where sem1='P' and sem2='P';";
        $compare_query_results= mysqli_query($conn,$compare_query);
        $data= mysqli_fetch_assoc($compare_query_results);
        $size= $row['name'];
        echo $size;
        

      }
      elseif($year=="SE"){




      }
      elseif($year=="TE"){



      }
      else{


      }
  } else {
      echo "not exist";
  }

}



?>

