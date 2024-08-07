<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style = "background-color: #131C70; font-family: 'assistant';">
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

               <?php
                /*if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }*/
                ?> 

                <div class="card">
                    <div class="card-header">
                        <h4>Upload your Grade Excel file here: (xlsx)</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();
require_once"Config.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'cs320');
#initial query
$qry= "SELECT * from tblgrades order by GradeID desc";
$result = mysqli_query($connection,$qry);

if ($result) {
  $row = mysqli_fetch_array($result);
if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    #file extensions
    $allowed_ext = ['xls','csv','xlsx'];
    #checks if file is within the allowe extensions
    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        # Remove the first row (header)
        array_shift($data);

        #retrieval of data
        foreach($data as $row)
        {
                $gradeID = $row['0'];
                $semID = $row['1'];
                $StudNum = $row['2'];
                $name = $row['3'];
                $subCode = $row['4'];
                $subName = $row['5'];
                $Units = $row['6'];
                $prelim = $row['7'];
                $midterm = $row['8'];
                $semis = $row['9'];
                $finals = $row['10'];
                $schyr = $row['11'];

                $query = "SELECT * FROM tblgrades WHERE GradeID = '$gradeID' AND semId = '$semID' AND StudNum = '$StudNum'";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                #Update/Overwrite Existing data
                $query = "REPLACE INTO tblgrades(GradeID,semId,StudNum,Name,SubjCode,SubjName,Units,Prelim,Midterm,SemiFinal,Final,SY) VALUES ('$gradeID','$semID','$StudNum','$name','$subCode','$subName','$Units','$prelim','$midterm','$semis','$finals','$schyr')";
                $query_run = mysqli_query($connection,$query);
                }
                else{
                #Insert if new data
                     $query = "INSERT INTO tblgrades(GradeID,semId,StudNum,Name,SubjCode,SubjName,Units,Prelim,Midterm,SemiFinal,Final,SY) VALUES ('$gradeID','$semID','$StudNum','$name','$subCode','$subName','$Units','$prelim','$midterm','$semis','$finals','$schyr')";
                    $query_run = mysqli_query($connection,$query);
                }
             }       
              if($query_run)
              {
                $_SESSION['message'] = "Successfully Imported";
                header('Location: Professor.php');
                exit(0);
              }
              else
              {
                $_SESSION['message'] = "Problem during Import";
                header('Location: Professor.php');
                exit(0);
              }
      
    }
    else
    {
        $_SESSION['message'] = "INVALID FILE TYPE!";
        header('Location: Professor.php');
        exit(0);
    }
}
} else {
  echo "Error executing query: " . mysqli_error($connection);
}

?>