<?php

// includes the connection file.
include('../config/connection.php');


session_start()
?>

<?php
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
if ($db_select) {
    // echo "success";
}

$_SESSION['conn']= $conn;

$batch = "2022-23";
$year = "fe";
$sem = "2";
$_SESSION['sem']= $sem;
$_SESSION['year']= $year;
$_SESSION['batch']= $batch;

$table_name = $batch . "_" . $year . "_" . $sem;

//sql query to create table
$sql = "CREATE TABLE `SPS`.`{$table_name}` (name varchar(200) not null)";
$query = mysqli_query($conn, $sql);
/*if($query){
    echo "success";
}*/
check_table_exist($sem, $year, $batch)



?>