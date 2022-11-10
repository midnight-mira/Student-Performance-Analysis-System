<?php

// includes the connection file.
include('../config/connection.php');
session_start();

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<style>
    *{
        padding: 40px;
    }
</style>
</head>
<body>
<h1><center>Without backlog </center></h1>
 <table class="table table-bordered border-primary">
  <thead>
    <tr>
    
  <td rowspan="2"><center>Year of Entry</center></td>
  <td rowspan="2"><center>N1+N2+N3<br>(As defined above)</center></td>
  <td colspan="4"><center>Number of students who have successfully graduated without backlogs in any semester/ year of study<br>(Without Backlog means no compartment or failures in any semester/year of study)</center></td>
 </tr>

  </thead>
  <tbody>
 <tr>
  <td colspan="2">&nbsp;</td>
  <th><center>Year 1</center></th>
  <th><center>Year 2</center></th>
  <th><center>Year 3</center></th>
  <th><center>Year 4</center></th>
 </tr>
    <tr>
        <?php 
        $query= mysqli_query($conn, "SELECT * from without_kt");
        while($row= mysqli_fetch_assoc($query)){
        
         ?>
        <td ><?php echo $row['year'];?></td>
        <td><?php echo $row['intake_total']. "( ". $row['intake_fe']." + ". $row['intake_dse']. " + ". $row['intake_te']. " )" ;?></td>
        <td ><?php echo $row['year1']; ?></td>
        <td ><?php echo $row['year2']; ?></td>
        <td class="table-active"> <?php echo $row['year3']; ?></td>
        <td class="table-active"><?php echo $row['year4']; ?></td>
    </tr>
    <?php 
        }
        ?>
    <tr>
        <td class="table-active"></td>
        <td class="table-active" ></td>
        <td class="table-active"></td>
        <td class="table-active"></td>
        <td class="table-active"></td>
        <td class="table-active"></td>
    </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="table-active"></td>
         <td class="table-active"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td class="table-active"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
  </tbody>
</table> 
</div>
  
    </div>
  
    <h1><center>With Backlog </center></h1>
 <table class="table table-bordered border-primary">
  <thead>
    <tr>
    
  <td rowspan="2"><center>Year of Entry</center></td>
  <td rowspan="2"><center>N1+N2+N3<br>(As defined above)</center></td>
  <td colspan="4"><center>Number of students who have successfully graduated in stipulated period of study<br>[Total of with Backlog+without Backlog]</center></td>
 </tr>

  </thead>
  <tbody>
 <tr>
  <td colspan="2">&nbsp;</td>
  <th><center>Year 1</center></th>
  <th><center>Year 2</center></th>
  <th><center>Year 3</center></th>
  <th><center>Year 4</center></th>
 </tr>
    <tr>
    <?php 
        $query= mysqli_query($conn, "SELECT * from with_kt");
        while($row= mysqli_fetch_assoc($query)){
         ?>
        <td><?php echo $row['year'];?></td>
        <td><?php echo $row['intake_total']. "( ". $row['intake_fe']." + ". $row['intake_dse']. " + ". $row['intake_te']. " )" ;?></td>
        <td class="table-active"><?php echo $row['year1'];?></td>
        <td class="table-active"><?php echo $row['year2'];?></td>
        <td class="table-active"><?php echo $row['year3'];?></td>
        <td class="table-active"><?php echo $row['year4'];?></td>
    </tr>
    <?php
        }
    ?>
    <tr>
        <td></td>
        <td ></td>
        <td></td>
        <td class="table-active"></td>
        <td class="table-active"></td>
         <td class="table-active"></td>
    </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="table-active"></td>
         <td class="table-active"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td class="table-active"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
         <td></td>
    </tr>
  </tbody>
</table> 
</div>
  
    </div>
  
<!-- <table class="table table-bordered border-primary">
 <tr>
  <td rowspan="2"><center>Year of Entry</center></td>
  <td rowspan="2"><center>N1+N2+N3<br>(As defined above)</center></td>
  <td colspan="4"><center>Number of students who have successfully graduated in stipulated period of study<br>[Total of with Backlog+without Backlog]</center></td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Year 1</td>
  <td>Year 2</td>
  <td>Year 3</td>
  <td>Year 4</td>
 </tr>

</table> -->
</body>
</html>