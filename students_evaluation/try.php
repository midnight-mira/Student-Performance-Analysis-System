<?php
// includes the connection file.
include('../config/connection.php');
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
    $table1="2020_fe_sem2";
    $table2="2020_fe_sem1";


    $sql = "select * from ".$table1." t1 inner join ".$table2." t2 on t1.name = t2.name;";
    
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
    } 
    
    ?>




</body>

</html>