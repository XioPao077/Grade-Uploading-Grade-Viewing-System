<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <title>Grade Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .page-title {
    color: white;
  }
</style>
<body style = "background-color: #131C70; font-family: 'assistant';">
  <div class="container">
     <h1 class="page-title"> File Upload </h1>
        <div class="row">
            <div class="col-md-12 mt-4">

               <?php
                if(isset($_SESSION['message']))
                {
                    echo "<script>alert('".$_SESSION['message']."');</script>";
                    unset($_SESSION['message']);
                }
                ?> 

                <div class="card">
                    <div class="card-header">
                        <h4>Upload your Grade Excel file here: (xlsx)</h4>
                    </div>
                    <div class="card-body">

                        <form action="process.php" method ="post" enctype="multipart/form-data">

                           <label>Folder Name</label>
                          <input type ="text" name="foldername" id="foldername">
                          <label>File Upload</label>
                          <input type="file" name="upload" id="upload" multiple accept="file/*.xlsx">
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
