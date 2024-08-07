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
$qry= "SELECT GradeID from tblgrades order by GradeID desc";
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
                 $prelim = $row['0'];
                 $midterm = $row['1'];
                 $semis = $row['2'];
                 $finals = $row['3'];

                #data insertion 
                $query = "INSERT INTO tblgrades(prelim,midterm,semis,finals) VALUES ('$prelim','$midterm','$semis','$finals')";
                $query_run = mysqli_query($connection,$query);

              if($query_run)
              {
                  echo '<script> alert("Data Saved"); </script>';
                  header("location: Professor.php");
              }
              else
              {
                  echo '<script> alert("Error On Upload); </script>';
              }
          
      }
    }
    else
    {
        echo '<script> alert("INVALID FILE!"); </script>';
        exit(0);
    }
}
} else {
  echo "Error executing query: " . mysqli_error($connection);
}

?>