<?php
// includes the connection file.
include('../config/connection.php');
session_start();

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
    $prnno_col= $_POST['prnno_col'];

    $_SESSION["from_row"] = $from_row;
    $_SESSION["to_row"] = $to_row;
    $_SESSION["name_col"] = $name_col;
    $_SESSION["marks_col"] = $marks_col;
    $_SESSION["prnno_col"] = $prnno_col;

    header('location:table.php');
}
?>
