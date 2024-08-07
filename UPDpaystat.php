<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
	<title>Professor Page</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
<body style = "background-color: grey; font-family: 'assistant';">
	<div class = "studentpage">
		<div class = "panel-side">
		<div class = "panel-trim">
		<div class = "panel-top">
			<div class = "one">
			<a href = "logout.php"><img src = signout.png></a>
			</div>
			<h1>Payment</h1>
			<?php
				if(isset($_SESSION['message']))
                {
                    echo "<script>alert('".$_SESSION['message']."');</script>";
                    unset($_SESSION['message']);
                }
			?>
		<div class = "box">	
			<div class='upload'><input type='button' class='uploadbtn' value='Upload' onclick='document.location.href = "uploading.php"'/></div>
		</div>
		<div class = "student-info"></div>
		<div class = "student-profile"></div>
		<div class = "panel-codes">
			<!-- table header -->
			<table>
			<tr>
			    <th>Sem</th>
			    <th>Student No.</th>
			    <th>Name</th>
			    <th>Subject Code</th>
			    <th>Subject Name</th>
			    <th>Units</th>
			    <th>Prelim</th>
			    <th>Midterm</th>
			    <th>Semis</th>
			    <th>Finals</th>
			    <th>School Year</th>
			</tr>
			</table>
		</div>
		<div class = "panel-Subjects">
				<?php 
				function build_table($result){
				    $counter = 0;
				    if(mysqli_num_rows($result) > 0){
				        //create the table
				        echo "<div class='table-wrapper'>";
				        echo "<table id='datatableid' class='table table-bordered table-primary table-striped'>";
				        //table data (looping each of the data on the result)
				        while($row = mysqli_fetch_array($result)){
				            if ($counter >= 12) { // stop loop after 12 rows
				                break;
				            }
				            echo "<tr>";
				            echo "<td>" . $row['semID'] . "</td>";
				            echo "<td>" . $row['StudNum'] . "</td>";
				            echo "<td>" . $row['Name'] . "</td>";
				            echo "<td>" . $row['SubjCode'] . "</td>";
				            echo "<td>" . $row['Units'] . "</td>";
				            echo "<td>" . $row['Prelim'] . "</td>";
				            echo "<td>" . $row['Midterm'] . "</td>";
				            echo "<td>" . $row['SemiFinal'] . "</td>";
				            echo "<td>" . $row['Final'] . "</td>";
				            echo "<td>" . $row['SY'] . "</td>";
				            echo "</tr>";
				            $counter++;
				        }
				        echo "</table>";
				        echo "</div>";
				    }
				    else{
				        echo "No Data Found";
				    }
				}
				//display the table
				require_once "config.php";
				$sql = "SELECT * FROM tblgrades ORDER BY SY asc";
				if($result = mysqli_query($link, $sql)){
				    build_table($result);
				} else {
				    echo "Error on accounts load";
				}
				?> 
		</div>
		<div class = "box-subject"></div>
		</div>
		</div>
		</div>
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
			<!--<div class = "logout"><input type = "button" class = "btn" value = "Sign out" onclick = "document.location.href = 'logout.php';"/></div>-->
		</form>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
<style>
	.one img{
		position: absolute;
		width: 15px;
		height: 15px;
		left: 10px;
		top: 10px;
		opacity: 0.8;
		cursor: pointer;
	}
	.one img:hover{
		opacity: 1;
	}
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
		left: 0px;
		top: 0px;
		background: #131C70;
		color: white;
	}
	.panel-trim{
		position: absolute;
		width: 1820px;
		height: 85px;
		left: 115px;
		top: 0px;
		background: #f70202;
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
		width: 1750px;
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
	.panel-Subjects{
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
	.uploadbtn{
		position: absolute;
		bottom: 40px;
    	right: 25px;
		width: 100px;
		height: 30px;
		float: right;
		opacity: 0.8;
		font-family: 'assistant';
		background-color: #131C70;
		color: white;
		border: none;
		cursor: pointer;
		border-radius: 5px;
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
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
