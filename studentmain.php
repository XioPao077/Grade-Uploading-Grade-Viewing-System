<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
	<title>Student Page</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
<body style = "background-color: grey; font-family: 'assistant';">
	<div class = "studentpage">
		<img src = "arellano-logo.png">
		<div class = "panel-side">
		<div class = "panel-top">
			<?php
				session_start();
				if(isset($_SESSION['username'])){
					echo "<h2>&emsp;&nbsp;Hello, " . $_SESSION['name'] . "</h2>";
				}
				else{
				header("location: login.php");
				}
			?>
		<div class = "box">
			
		</div>
		<div class = "student-info"></div>
		<div class = "student-profile"></div>
		<div class = "panel-codes">
			<!-- table header -->
			<table>
			<tr>
			    <th>Subject Code</th>
			    <th>Subject Name</th>
			    <th>Units</th>
			    <th>Prelim</th>
			    <th>Midterms</th>
			    <th>SemiFinal</th>
			    <th>Final</th>
			</tr>
			</table>
		</div>
		<div class = "panel-grades">
		<?php 
		function build_table($result){
		if(mysqli_num_rows($result) > 0){
			//create the table
			echo "<table id='datatableid' class='table table-bordered table-primary table-striped'>";
			//table data (looping each of the data on the result)
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td style='display:none'>" . $row['StudNum'] . "</td>";
				echo "<td style='display:none'>" . $row['Name'] . "</td>";
				echo "<td style='display:none';>" . $row['SemID'] . "</td>";
				echo "<td>" . $row['SubjCode'] . "</td>";
				echo "<td>" . $row['SubjName'] . "</td>";
				echo "<td>" . $row['Units'] . "</td>";
				echo "<td>" . $row['Prelim'] . "</td>";
				echo "<td>" . $row['Midterm'] . "</td>";
				echo "<td>" . $row['SemiFinal'] . "</td>";
				echo "<td>" . $row['Final'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo "No Data Found";
		}
	}
		//display the table
		require_once "config.php";
			$sql = "SELECT * FROM tblgrades WHERE Name = ? ORDER BY Name";
			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt,"s",$_SESSION['name']);
				if(mysqli_stmt_execute($stmt)){
					$result = mysqli_stmt_get_result($stmt);
					build_table($result);
					}
				}
			else{
				echo"Error on accounts load";
			}
?>
		</div>
		<div class = "box-subject"></div>
		</div>
		</div>
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
			<!--<div class = "logout"><input type = "button" class = "btn" value = "Sign out" onclick = "document.location.href = 'logout.php';"/> -->
	</div>
		</form>
</body>
<style>
	.studentpage img{
		position: absolute;
		width: 430px;
		height: 101px;
		left: 1450px;
		top: 138px;
	}
	.panel-side{
		position: absolute;
		width: 115px;
		height: 100%;
		left: 0px;
		top: 0px;
		background: #131C70;
		box-shadow: inset -11px 0px 8px rgba(0, 0, 0, 0.28);
	}
	.panel-top{
		position: absolute;
		width: 1805px;
		height: 70px;
		left: 115px;
		top: 0px;
		background: #131C70;
		color: white;
	}
	.box{
		position: absolute;
		width: 1750px;
		height: 650px;
		left: 25px;
		top: 300px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 6px;
	}
	.student-info{
		position: absolute;
		width: 1272px;
		height: 180px;
		left: 25px;
		top: 95px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 6px;
	}
	.student-profile{
		position: absolute;
		width: 150px;
		height: 150px;
		left: 45px;
		top: 110px;
		background: #131C70;
		border-radius: 7px;
	}
	.panel-codes{
		position: absolute;
		width: 1706px;
		height: 46px;
		left: 45px;
		top: 350px;
		background: #131C70;
		border-radius: 7px;
	}
	.panel-grades{
		position: absolute;
		width: 1706px;
		height: 450px;
		left: 45px;
		top: 401px;
		background: #131C70;
		border-radius: 7px;
	}
	.btn{
		position: absolute;
		width: 100px;
		height: 30px;
		left: 1790px;
		top: 20px;
		opacity: 0.8;
		font-family: 'assistant';
		background-color: #002d86;
		color: white;
		border: none;
		cursor: pointer;
		border-radius: 5px;
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
	}
	.btn:hover{
		opacity: 1;
	}
	 table {
	    border-collapse: collapse;
	    table-layout: fixed;
	    width: 100%;
	  }
	  th, td {
	    color: white;
	    padding: 8px;
	    text-align: center;
    	width: 12.5%;
	  }
</style>
</html>
