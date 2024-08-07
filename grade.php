<?php
			function build_table($result){
				if(mysqli_num_rows($result) > 0){
					//create the table
					echo "<table>";
					//table data (looping each of the data on the result)
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td style='display:none';>" . $row['semID'] . "</td>";
						echo "<td>" . $row['SubjCode'] . "</td>";
						echo "<td>" . $row['SubjName'] . "</td>";
						echo "<td>" . $row['Units'] . "</td>";
						echo "<td>" . $row['Prelim'] . "</td>";
						echo "<td>" . $row['Midterm'] . "</td>";
						echo "<td>" . $row['SemiFinal'] . "</td>";
						echo "<td>" . $row['Final'] . "</td>";
						echo"</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else{
					echo "No Data Found";
				}
			}
require_once "config.php";
include("session-checker.php");
if(isset($_POST['semID'])){
    //$semID = $_POST['semID'];
    $sql = "SELECT * FROM tblgrades WHERE Name = ? AND semID = ? ORDER BY Name";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['name'], $_POST['semID']);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            build_table($result); // Use the existing build_table() function to create the table markup
        }
    }
    else{
        echo "Error retrieving grades";
    }
}
else {
    echo "SemID not specified";
}
?>
