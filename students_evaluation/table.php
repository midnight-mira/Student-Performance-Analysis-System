<?php
// includes the connection file.
include('../config/connection.php');
session_start();

require_once '../Box/src/Spout/Autoloader/autoload.php';

//for creation of tables
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
if ($db_select) {
  // echo "success";
}

$from_row = $_SESSION["from_row"];
$to_row = $_SESSION["to_row"];
$name_col = $_SESSION["name_col"];
$marks_col = $_SESSION["marks_col"];
$prnno_col = $_SESSION["prnno_col"];

$name_cols = $name_col - 1;
$marks_cols = $marks_col - 1;
$prnno_cols = $prnno_col - 1;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$fileName = $_SESSION["fileName"];
$filePath = 'uploaded-files/' . $fileName;
$reader = ReaderEntityFactory::createReaderFromFile($filePath);


$reader->open($filePath);

foreach ($reader->getSheetIterator() as $sheet) {
  foreach ($sheet->getRowIterator() as $rowNumber => $row) {
    if ($rowNumber >= $from_row && $rowNumber <= $to_row) {
      $value = $row->toArray();
      $name = $value[$name_cols];
      $grade = $value[$marks_cols];
      $prnno = $value[$prnno_cols];


      echo $name;
      echo "  ";
      echo $grade;

      echo $prnno;

      $batch_year = $_SESSION["batch_year"];
      $sem_number = $_SESSION["sem_number"];
      $year = $_SESSION["year"];
      $sem = "sem" . $sem_number;
      $table = $batch_year . "_" . $year . "_" . $sem;



      $create_table_query = "CREATE TABLE `SPS`.`{$table}` (
        sr_no int NOT NULL AUTO_INCREMENT,
        prnno varchar(100) NOT NULL,
        name varchar(100) NOT NULL,
        result varchar(10),
        PRIMARY KEY (sr_no, prnno)
        );";
      $create_table_query_result = mysqli_query($conn, $create_table_query);
      if ($create_table_query_result) {
        echo "success";
      }

      $query = "INSERT INTO `SPS`.`{$table}` (prnno, name, result) 
             VALUES(?, ?, ?)";
      $stmt = mysqli_prepare($conn, $query);
      $stmt->bind_param("sss", $prnno, $name, $grade);
      $stmt->execute();
      $full_table_name = $batch_year . "_table";

      if ($sem == "sem1") {
        $full_table_name = $batch_year . "_table";
        $_SESSION["full_table_name"] = $full_table_name;

        $create_full_table = "CREATE TABLE `SPS`.`{$full_table_name}` (
          sr_no int NOT NULL AUTO_INCREMENT,
          prnno varchar(100) NOT NULL,
          name varchar(100) NOT NULL,
          sem1 varchar(10), sem2 varchar(10) , sem3 varchar(10) ,sem4 varchar(10) ,sem5 varchar(10) ,sem6 varchar(10) ,sem7 varchar(10) ,sem8 varchar(10) ,
          PRIMARY KEY (sr_no, prnno)
      );";

        $query_full_table = mysqli_query($conn, $create_full_table);
        if ($create_full_table) {
          echo "success";
          /*
          $query_full = "INSERT INTO `SPS`.`{$full_table_name}` (prnno, name, sem1) 
          VALUES(?, ?, ?)";
          $stmt1 = mysqli_prepare($conn, $query_full);
          $stmt1->bind_param("sss", $prnno, $name, $grade);
          $stmt1->execute();*/
        }
      } 
      if ($sem == "sem3") {

        echo "ki";

        $table_dse = $batch_year . "_DSE";
        $_SESSION["dse_table_name"] = $table_dse;

        $query_for_dse = "CREATE TABLE `SPS`.`{$table_dse}` (
          sr_no int NOT NULL AUTO_INCREMENT,
          prnno varchar(100) NOT NULL,
          name varchar(100) NOT NULL,
          sem3 varchar(10) ,sem4 varchar(10) ,sem5 varchar(10) ,sem6 varchar(10) ,sem7 varchar(10) ,sem8 varchar(10) ,
          PRIMARY KEY (sr_no, prnno)
      );";

        $query_dse = mysqli_query($conn, $query_for_dse);
        if ($query_dse) {
          echo "table bana dse";
        }
      } 
       
        
        
      

      $_SESSION["sem"] = $sem;
      $_SESSION["table_name"] = $table;
    }
  }
}

$reader->close();

header('location:table_show.php');
?>





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