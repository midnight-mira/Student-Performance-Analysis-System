<?php
// includes the connection file.s
include('../config/connection.php');
require_once('check_table_exist.php');
session_start();

function compute_table($sem, $batch,$year,$sem_new){

    $con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    $db_select = mysqli_select_db($con, DB_NAME);
    if ($db_select) {
        // echo "success";
    } 

    $_SESSION['sem'] = $sem;
    $_SESSION['year'] = $year;
    $_SESSION['batch'] = $batch;
    $_SESSION['sem_new']= $sem_new; 

    

    $table_1= $batch."_".$year."_".$sem;
    $table_2= $batch."_".$year."_".$sem_new;




    $sql = "select * from ".$table_1." t1 inner join ".$table_2." t2 on t1.name = t2.name;";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "Hogay";
    }


}
?>

<?php

/*
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

//CHECK CONNECTION
if ($conn === false) {
    die("ERROR" . mysqli_connect_error());
}

// echo "Connected Succesfully" . mysqli_get_host_info($conn);
if ($conn) {
    echo ("Success");
}


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);
if ($db_select) {
    // echo "success";
}
$sql= 

$sql = "SELECT * FROM".$table_name." INNER JOIN 2020_fe_sem2 ON 2020_fe_sem1.name= 2020_fe_sem2.name;";

$result = mysqli_query($conn, $sql);
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
echo $count; */
/*
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

?>
