<?php
// includes the connection file.
include('../config/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    $db_select = mysqli_select_db($conn, DB_NAME);
    if ($db_select) {
        // echo "success";
    }
    /*
    $table1="2020_fe_sem2";
    $table2="2020_fe_sem1";


    $sql = "select * from ".$table1." t1 inner join ".$table2." t2 on t1.name = t2.name;";
    
    $result = mysqli_query($conn, $sql); */
    /*
    if(mysqli_num_rows($result)>0){
        $no =1;
        $count=0;
        while($woo= mysqli_fetch_assoc($result)) {
            if($woo['grade_sem1']= $woo['grade_sem2']='p'){
                $count= $count+1;
            }
            $no++;
        }
    }s
    echo $count; 

    if (mysqli_num_rows($result) > 0) {
        $sn = 1;
        $count=0;
        while ($data = mysqli_fetch_array($result)) {?>
                                            <tr>
                    <td><?php echo $data['name']; ?></td> <br>                            
                    <td><?php echo $data['grade_sem1']; ?></td>
                    <td><?php echo $data['grade_sem2']; ?></td> <br>
                    <?php
                    if($data['grade_sem1']= $data['grade_sem2']='p'){
                        $count= $count+1;
                    }?>
                </tr>
        <?php
            $sn++;
        }
        echo $count;
    } */
    /*
    $compare_query = "SELECT count(*) as name from test1 where marks='p'";
    $compare_query_results = mysqli_query($conn, $compare_query);
    $data = mysqli_fetch_assoc($compare_query_results);
    $size = $data['name'];
    echo $size;*/
    $table = "2017-18_fe_sem1";

    $query = "CREATE TABLE " . $table . " (
        sr_no int NOT NULL AUTO_INCREMENT,
        prnno varchar(200) NOT NULL,
        name varchar(255) NOT NULL,
        result varchar(255),
        PRIMARY KEY (sr_no, prnno)
    );";

    $create_tabl = "CREATE TABLE `SPS`.`{$table}` (
        sr_no int NOT NULL AUTO_INCREMENT,
        prnno varchar(200) NOT NULL,
        name varchar(255) NOT NULL,
        result varchar(255) NOT NULL,
        PRIMARY KEY (sr_no, prnno)
        );";

    /* $create_table_query = "CREATE TABLE " . $table . "(sr.no INT NOT NULL AUTO_INCREMENT , prnno VARCHAR(100) NOT NULL , name VARCHAR(100) NOT NULL , result VARCHAR(100) NOT NULL , PRIMARY KEY (sr.no, prnno));";
    $create_table_query_result = mysqli_query($conn, $create_tabl);
    if ($create_table_query_result) {
        echo "success";

        $insert_query = "INSERT INTO" . $table . "(prnno, name, result ) VALUES (123 ,amira, P);";
        $insert_result = mysqli_query($conn, $insert_query); }*/

    $full_table_name = "2017-18_table";
    $table = "2017-18_SE_sem3";
    $table_dse = "2017-18_dse";

    /*$name_array = $_SESSION["name_array"];
    $grade_array= $_SESSION["grade_array"];
    $prnno_array= $_SESSION["prnno_array"];


    $query = "INSERT INTO `SPS`.`{$full_table_name}` (prnno, name, result) 
             VALUES(?, ?, ?)";
      $stmt = mysqli_prepare($conn,$query);
      $stmt->bind_param("sss", $prnno_array ,$name_array, $grade_array);
      $stmt->execute(); */



    /*$add_info = "INSERT INTO {$full_table_name} (sr_no, prnno, name, result) VALUES ( 
    $info_query = mysqli_query($conn, $add_info);
    if ($info_query) {
        echo "done";
    }*/

    $query_for_dse = "CREATE TABLE `SPS`.`{$table_dse}` (
        sr_no int NOT NULL AUTO_INCREMENT,
        prnno varchar(100) NOT NULL,
        name varchar(100) NOT NULL,
        sem3 varchar(10) ,sem4 varchar(10) ,sem5 varchar(10) ,sem6 varchar(10) ,sem7 varchar(10) ,sem8 varchar(10) ,
        PRIMARY KEY (sr_no, prnno)
    );";

    $query_full_table = mysqli_query($conn, $query_for_dse);

    $insert = "INSERT INTO `SPS`.`{$table_dse}` (sr_no, prnno, name, sem3)
      SELECT sr_no, prnno, name, result
      FROM `SPS`.`{$table}` t1
      WHERE NOT EXISTS (select * from `SPS`.`{$full_table_name}` t2 WHERE t2.prnno= t1.prnno);";
    $insert_test = mysqli_query($conn, $insert);

    $rial = "INSERT INTO `SPS`.`{$table_dse}` (sr_no, prnno, name, sem3)
      SELECT sr_no, prnno, name, result
      from `SPS`.`{$table}`;";
    $sem = "sem3";

    $test6 = "INSERT INTO `SPS`.`{$table_dse}` (sr_no, prnno, name, sem3)
       SELECT sr_no, prnno, name, result FROM `SPS`.`{$table}` WHERE `{$table}`.prnno NOT IN ( SELECT `{$full_table_name}`.prnno FROM `{$full_table_name}`)";


    $query_sem2 = "UPDATE `SPS`.`{$full_table_name}` t1, `SPS`.`{$table}` t2 SET t1.`{$sem}`= t2.result Where t1.prnno=t2.prnno;";

    /*$compare_query_pass= "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P';";
          $compare_query_results= mysqli_query($conn,$compare_query_pass);
          $data= mysqli_fetch_assoc($compare_query_results);
          $size= $data['name'];
          $count_pass= $size."+0";
          echo $count_pass;*/
    /*
          $compare_query_kt= "SELECT count(*) as name from `{$full_table_name}` where sem1='F' or sem2='F';";
          $compare_kt= mysqli_query($conn, $compare_query_kt);
          $dataKt= mysqli_fetch_assoc($compare_kt);
          $size_kt= $dataKt['name'];
          $count_kt= $size_kt."+0";
          echo $count_kt; */

    /* $intake= "SELECT count(*) as name from `{$full_table_name}` ;";
            $intake_query= mysqli_query($conn, $intake);
            $data_intake= mysqli_fetch_assoc($intake_query);
            $size_intake= $data_intake['name']. "( ". $data_intake['name']. " + 0 + 0 );";
            echo $size_intake;*/
    /*
    $batch_year = "2017-18";
    $intake_total= "20";
    $count_pass= "12";

    $add_table = "INSERT INTO without_kt (year, intake_total, intake_fe, year1) 
            VALUES(?, ?, ?, ?);";
    $stmt = mysqli_prepare($conn, $add_table);
    $stmt->bind_param("ssss", $batch_year, $intake_total, $intake_total, $count_pass);
    $stmt->execute();*/

    $intake_total = 0;
    $intake_fe = 0;
    $intake_dse = 0;
    $intake_ty = 0;
    $batch_year = "2017-18";

   // full pass
   $compare_query_pass = "SELECT count(*) as name from `{$full_table_name}` where sem1='P' and sem2='P' and sem3='P' and sem4='P';";
   $compare_query_results = mysqli_query($conn, $compare_query_pass);
   $data = mysqli_fetch_assoc($compare_query_results);
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
       $intake_t= $row['intake_total'];
   }

   $intakeTotal= $intake_t+ $intake_total_dse;
   //echo $intakeTotal;

   $add_table = "UPDATE without_kt
   SET intake_total = '$intakeTotal', intake_dse= '$intake_total_dse', year2= '$year2'
   WHERE year = '$batch_year';";
   $add1= mysqli_query($conn, $add_table);
   if($add1){
    echo "done";
   }

   $year2_dse= $count_kt_dse + $count_kt;

   $add_table_kt = "UPDATE with_kt
   SET intake_total = '$intakeTotal', intake_dse= '$intake_total_dse', year2= '$year2_dse'
   WHERE year = '$batch_year';";
   $add2= mysqli_query($conn, $add_table_kt);
   if($add2){
    echo "done";
   }

   

   

  











    ?>





</body>

</html>