<?php
// includes the connection file.
include('../config/connection.php');
require_once('create_table.php');
session_start();

function check_table_exist($sem, $year, $batch)
{

    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    $db_select = mysqli_select_db($conn, DB_NAME);
    if ($db_select) {
        // echo "success";
    }

    $_SESSION['sem'] = $sem;
    $_SESSION['year'] = $year;
    $_SESSION['batch'] = $batch;

    if ($sem % 2 != 0) {
        $sem_new = $sem + 1;
        $table = $batch . "_" . $year . "_" . $sem_new;

        $val = mysqli_query($conn, 'select 1 from `.{$table}.` LIMIT 1');

        if ($val !== FALSE) {
            $_SESSION['sem_new']= $sem_new;
            echo "success";
            compute_table($sem, $batch,$year,$sem_new);
        } else {
            echo "not exist";
        }
    } else {
        $sem_new = $sem - 1;
        $table = $batch . "_" . $year . "_" . $sem_new;

        $val = mysqli_query($conn, 'select 1 from `.{$table}.` LIMIT 1');

        if ($val !== FALSE) {
            //DO SOMETHING! IT EXISTS!
            $_SESSION['sem_new']=$sem_new;
            echo "success";
            compute_table($sem, $batch,$year,$sem_new);
        } else {
            echo "not exist";
        }
    }
}
