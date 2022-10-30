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
//$from_row = $_SESSION["from_row"];
//$to_row = $_SESSION["to_row"];
//$name_col = $_SESSION["name_col"];
//$marks_col = $_SESSION["marks_col"];

$from_row='2';
$to_row='5';
$name_col='0';
$marks_col='1';

//$name_cols = $name_col - 1;
//$marks_cols = $marks_col - 1;


use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$file_name= 'test.xlsx';
//$file_name = $_SESSION['fileName'];
$filePath = 'uploaded-files/' . $file_name;

$reader = ReaderEntityFactory::createReaderFromFile($filePath);


$reader->open($filePath);

foreach ($reader->getSheetIterator() as $sheet) {
  foreach ($sheet->getRowIterator() as $rowNumber => $row) {
    if ($rowNumber >= $from_row && $rowNumber<= $to_row ) {
      $value = $row->toArray();      $name = $value[$name_col];
      $grade = $value[$marks_col];
  
      echo $name;
      echo "  ";
      echo $grade;
      echo "<br>";
    }
   
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
  table,
  th,
  td {
    border: 1px solid black;
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
    <td><?php echo $A; ?></td>
    <td><?php echo $B; ?></td>
 
  </tr>
  
</table>

<p>To understand the example better, we have added borders to the table.</p>
-->
</body>

</html>