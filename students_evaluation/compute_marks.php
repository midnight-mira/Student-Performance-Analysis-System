<?php


// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

$batch_year= $_SESSION["batch_year"];
$sem_number= $_SESSION["sem_number"];
$year= $_SESSION["year"]; 


$sem = "sem" . $sem_number;
$table = $batch_year . "_" . $year . "_" . $sem;
$table_dse = $batch_year . "_dse";

$full_table_name = $batch_year . "_table";

if ($sem_number % 2 == 0) {

    $sem_new = $sem_number- 1;
    $table_odd = $batch_year. "_" . $year . "_" . $sem_new;

    $val = mysqli_query($conn, 'select 1 from `.{$table}.` LIMIT 1');

    if ($val == FALSE) {

        if ($sem == "sem2") {

            $intake_total = 0;
            $intake_fe = 0;
            $intake_dse = 0;
            $intake_ty = 0;

            // full pass
            echo $full_table_name;
            $compare_query_pass = "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P';";
            $compare_query_results = mysqli_query($conn, $compare_query_pass);
            if($compare_query_results){
                echo "ji";
            }
            $data = mysqli_fetch_assoc($compare_query_results);
            $size = $data['name'];
            $count_pass = $size;
            echo $count_pass;

            //kt pass
            $compare_query_kt = "SELECT count(*) as name from `{$full_table_name}` where sem1='F' or sem2='F';";
            $compare_kt = mysqli_query($conn, $compare_query_kt);
            $dataKt = mysqli_fetch_assoc($compare_kt);
            $size_kt = $dataKt['name'];
            $count_kt = $size_kt;
            echo $count_kt;

            $intake = "SELECT count(*) as name from `{$full_table_name}` ;";
            $intake_query = mysqli_query($conn, $intake);
            $data_intake = mysqli_fetch_assoc($intake_query);
            $intake_total = $data_intake['name'];

            $add_table = "INSERT INTO without_kt (year, intake_total, intake_fe, year1) 
            VALUES(?, ?, ?, ?);";
            $stmt = mysqli_prepare($conn, $add_table);
            $stmt->bind_param("ssss", $batch_year, $intake_total, $intake_total, $count_pass);
            $stmt->execute();

            $add_table_kt = "INSERT INTO with_kt (year, intake_total, intake_fe, year1) 
            VALUES(?, ?, ?, ?);";
            $stmt = mysqli_prepare($conn, $add_table_kt);
            $stmt->bind_param("ssss", $batch_year, $intake_total, $intake_total, $count_kt);
            $stmt->execute();

        } 
        if ($sem == "sem4") {

            // full pass
            $compare_query_pass_se = "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P' and sem3='P' and sem4='P';";
            $compare_query_results_se = mysqli_query($conn, $compare_query_pass_se);
            $data = mysqli_fetch_assoc($compare_query_results_se);
            $size = $data['name'];
            $count_pass = $size;
            //echo $count_pass;

            //kt pass
            $compare_query_kt = "SELECT count(*) as name from `{$full_table_name}` where sem1='F' or sem2='F' or sem3='F' or sem4='F';";
            $compare_kt = mysqli_query($conn, $compare_query_kt);
            $dataKt = mysqli_fetch_assoc($compare_kt);
            $size_kt = $dataKt['name'];
            $count_kt = $size_kt;
            //echo $count_kt;

            // dse pass
            $compare_query_pass_dse = "SELECT count(*) as name from `{$table_dse}` where  sem3='P' and sem4='P';";
            $compare_query_results_dse = mysqli_query($conn, $compare_query_pass_dse);
            $data_dse = mysqli_fetch_assoc($compare_query_results_dse);
            $size_dse = $data_dse['name'];
            $count_pass_dse = $size_dse;
            //echo $count_pass_dse;

            //kt pass dse
            $compare_query_kt_dse = "SELECT count(*) as name from `{$table_dse}` where sem3='F' or sem4='F';";
            $compare_kt_dse = mysqli_query($conn, $compare_query_kt_dse);
            $dataKt_dse = mysqli_fetch_assoc($compare_kt_dse);
            $size_kt_dse = $dataKt_dse['name'];
            $count_kt_dse = $size_kt_dse;
            //echo $count_kt_dse;

            $intake_dse = "SELECT count(*) as name from `{$table_dse}` ;";
            $intake_query_dse = mysqli_query($conn, $intake_dse);
            $data_intake_dse = mysqli_fetch_assoc($intake_query_dse);
            $intake_total_dse = $data_intake_dse['name'];
            echo $intake_total_dse;

            $year2 = $count_pass . " + " . $count_pass_dse;
            //echo $year2;

            $total = "SELECT intake_total from without_kt where year= '$batch_year';";
            $total_query = mysqli_query($conn, $total);
            while ($row = mysqli_fetch_assoc($total_query)) {
                $intake_t = $row['intake_total'];
            }

            $intakeTotal = $intake_t + $intake_total_dse;
            //echo $intakeTotal;

            $add_table = "UPDATE without_kt
            SET intake_total = '$intakeTotal', intake_dse= '$intake_total_dse', year2= '$year2'
            WHERE year = '$batch_year';";
            $add1 = mysqli_query($conn, $add_table);
            if ($add1) {
                echo "done";
            }

            $year2_dse = $count_kt_dse." + ".$count_kt;

            $add_table_kt = "UPDATE with_kt
            SET intake_total = '$intakeTotal', intake_dse= '$intake_total_dse', year2= '$year2_dse'
            WHERE year = '$batch_year';";
            $add2 = mysqli_query($conn, $add_table_kt);
            if ($add2) {
                echo "done";
            }

        } 
        if ($year == "TE") {

            // full pass
            $compare_query_pass = "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P' and sem3='P' and sem4='P' and sem5='P' and sem6='P';";
            $compare_query_results = mysqli_query($conn, $compare_query_pass);
            $data = mysqli_fetch_assoc($compare_query_results);
            $size = $data['name'];
            $count_pass = $size;
            echo $count_pass;

            //kt pass
            $compare_query_kt = "SELECT count(*) as name from `{$full_table_name}` where sem1='F' or sem2='F' or sem3='F' or sem4='F' or sem5='F' or sem6='F';";
            $compare_kt = mysqli_query($conn, $compare_query_kt);
            $dataKt = mysqli_fetch_assoc($compare_kt);
            $size_kt = $dataKt['name'];
            $count_kt = $size_kt;
            echo $count_kt;

            // dse pass
            $compare_query_pass_dse = "SELECT count(*) as name from `{$table_dse}` where  sem3='P' and sem4='P' and sem5='P' and sem6='P';";
            $compare_query_results_dse = mysqli_query($conn, $compare_query_pass_dse);
            $data_dse = mysqli_fetch_assoc($compare_query_results_dse);
            $size_dse = $data_dse['name'];
            $count_pass_dse = $size_dse;
            echo $count_pass_dse;

            //kt pass dse
            $compare_query_kt_dse = "SELECT count(*) as name from `{$table_dse}` where  sem3='F' or sem4='F' or sem5='F' or sem6='F';";
            $compare_kt_dse = mysqli_query($conn, $compare_query_kt_dse);
            $dataKt_dse = mysqli_fetch_assoc($compare_kt);
            $size_kt_dse = $dataKt_dse['name'];
            $count_kt_dse = $size_kt_dse;
            echo $count_kt_dse;

            $intake_dse = "SELECT count(*) as name from `{$table_dse}` ;";
            $intake_query_dse = mysqli_query($conn, $intake_dse);
            $data_intake_dse = mysqli_fetch_assoc($intake_query_dse);
            $intake_total_dse = $data_intake_dse['name'];

            $year3 = $count_pass . " + " . $count_pass_dse;

            $add_table = "UPDATE without_kt
            SET year3= '$year3'
            WHERE year = '$batch_year';";
            $add1 = mysqli_query($conn, $add_table);

            $year3_dse = $count_kt_dse ."+". $count_kt;

            $add_table_kt = "UPDATE with_kt
            SET  year3= '$year3_dse'
            WHERE year = '$batch_year';";
            $add2 = mysqli_query($conn, $add_table_kt);

        } 
        if ($year == "BE") {

            // full pass
            $compare_query_pass = "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P' and sem3='P' and sem4='P' and sem5='P' and sem6='P' and sem7='P' and sem8='P' ;";
            $compare_query_results = mysqli_query($conn, $compare_query_pass);
            $data = mysqli_fetch_assoc($compare_query_results);
            $size = $data['name'];
            $count_pass = $size;
            echo $count_pass;

            //kt pass
            $compare_query_kt = "SELECT count(*) as name from `{$full_table_name}` where sem1='F' or sem2='F' or sem3='F' or sem4='F' or sem5='F' or sem6='F' or sem7='F' or sem8='F';";
            $compare_kt = mysqli_query($conn, $compare_query_kt);
            $dataKt = mysqli_fetch_assoc($compare_kt);
            $size_kt = $dataKt['name'];
            $count_kt = $size_kt;
            echo $count_kt;

            // dse pass
            $compare_query_pass_dse = "SELECT count(*) as name from `{$table_dse}` where  sem3='P' and sem4='P' and sem5='P' and sem6='P' and sem7='P'and sem8='P';";
            $compare_query_results_dse = mysqli_query($conn, $compare_query_pass_dse);
            $data_dse = mysqli_fetch_assoc($compare_query_results_dse);
            $size_dse = $data_dse['name'];
            $count_pass_dse = $size_dse;
            echo $count_pass_dse;

            //kt pass dse
            $compare_query_kt_dse = "SELECT count(*) as name from `{$table_dse}` where  sem3='F' or sem4='F' or sem5='F' or sem6='F' or sem7='F' or sem8='F' ;";
            $compare_kt_dse = mysqli_query($conn, $compare_query_kt_dse);
            $dataKt_dse = mysqli_fetch_assoc($compare_kt);
            $size_kt_dse = $dataKt_dse['name'];
            $count_kt_dse = $size_kt_dse;
            echo $count_kt_dse;

            $year4 = $count_pass . " + " . $count_pass_dse;


            $add_table = "UPDATE without_kt
            SET  year4= '$year4'
            WHERE year = '$batch_year';";
            $add2 = mysqli_query($conn, $add_table);

            $year4_dse = $count_kt_dse ."+". $count_kt;

            $add_table_kt = "UPDATE with_kt
            SET  year4= '$year4_dse'
            WHERE year = '$batch_year';";
            $add2 = mysqli_query($conn, $add_table_kt);
        }
    } 

    session_destroy();
    header("location:t_success.php");
 
}
else{
    header("location: dashboard.php");
}
?>