<?php
include('../config/connection.php');
session_start();

require_once '../Box/src/Spout/Autoloader/autoload.php';
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);

?>

<?php
/*
$_SESSION["from_row"] = $from_row;
$_SESSION["to_row"] = $to_row;
$_SESSION["name_col"] = $name_col;
$_SESSION["marks_col"] = $marks_col;

$name_cols = $name_col - 1;
$marks_cols = $marks_col - 1;
$from_row_modify = $from_row - 1;
$to_row_modify = $to_row - 1;
D:\XAMPP\htdocs\sps\students_evaluation\2014-15- TO 2017-18_WITHOUT_BACK LOG.xlsx

*/
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$filePath= 'test.xlsx';
$reader = ReaderEntityFactory::createReaderFromFile($filePath);


$reader->open($filePath);

foreach ($reader->getSheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $row) {
       /* if ($rowNumber < $from_row_modify) {
            $cells = $row->getCells();
            $nameCell = $cells[$name_cols]; 
            $markCell = $cells[$marks_cols];
            $name = $nameCell->getValue();
            $grade = $markCell->getValue();
        }*/
        /*
        $value= $cells->toArray();
        $cells = $row->getCells();
        $A= $value[0]->getValue();
        $B= $value[1]->getValue(); */
        

        $value= $row->toArray();
        $name= $value[0];
        $grade= $value[1];

        echo $name;
        echo "  ";
        echo $grade;
        echo "<br>";
        
        $query= "insert into test1 (name, marks) values ('$name', '$grade')";
        $result= mysqli_query($conn, $query);

       
    }
}

$reader->close();


/*
if (isset($_POST['import_excel'])) 
{
    $filename = $_FILES['import_file']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowed_extention = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_extention)) {

        $inputFileNamePath = $_FILES['import_file']['tmp_name'];

        $start_row= $_SESSION[''];
        

       
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data= $spreadsheet->getActiveSheet()->toArray();

    } else {

        $_SESSION['message_import_excel_error'] = "Invlid File";
        header('Location: inputExcel.php');
        exit(0);
    }
}
*/


?>
<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<!--

<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Grade</th>
  </tr>
  <tr>
    <td><?php echo $A;?></td>
    <td><?php echo $B; ?></td>
 
  </tr>
  
</table>

<p>To understand the example better, we have added borders to the table.</p>
-->
</body>
</html>

