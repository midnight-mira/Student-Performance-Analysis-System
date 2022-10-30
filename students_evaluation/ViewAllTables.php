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
    <title>ViewTable</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        section {
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding: 10px;
        }

        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            border: 1px solid #dddddd;
            background-color: beige;
            text-align: center;
            padding: 20px;

        }

        tr:nth-child(even) {
            background-color: #dddddd;
            text-align: center;
        }

        tr {
            text-align: center;
            border: 1px solid black;
        }

        .field{
            text-align: center;

        }
    </style>
    </style>
</head>

<body>

    <section>
        <table>
            <thead>
                <tr>
                    <th><strong>Name</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "show tables"); // run the query and assign the result to $result
                while ($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
                    $sr = 0; ?>
                    <tr>
                        <td><?php echo $table[$sr]; ?></td>
                    <?php $sr++;
                } ?>
                    </tr>

            </tbody>
        </table>
       
    </section>

    <form action="dashboard.php" method="get">

    <div class="field">
        <input type="submit" class="btn btn-success" name="submit" value="Back" >
    </div>

    </form>

   






</body>

</html>