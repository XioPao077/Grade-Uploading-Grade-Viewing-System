<?php
    require_once "config.php";
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'cs320');

    // get uploaded files from the database
    $query = "SELECT * FROM tblfiles";
    $query_run = mysqli_query($connection, $query);

    // display uploaded files
    if(mysqli_num_rows($query_run) > 0){
        while($row = mysqli_fetch_assoc($query_run)){
            echo "<a href='".$row['FilePath']."'>".$row['FileID']."</a><br>";
        }
    } else {
        echo "No files uploaded yet.";
    }
?>