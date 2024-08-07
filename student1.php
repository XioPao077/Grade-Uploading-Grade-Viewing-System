<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scale = 1">
		<title>Student Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	</head>
	<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
	<body style = "background-color: grey; font-family: 'assistant';">
            </div>
        </div>
        </div>
		<div class = "studentpage">
			<img src = "arellano-logo.png">
		<div class = "panel-side">
			<div class = "one">
				<a href = "http://localhost/cs320/logout.php"><img src = signout.png></a>
			</div>
		<div class = "panel-top">
			<?php
				include("session-checker.php");
				if(isset($_SESSION['username'])){
					echo "<h2>&emsp;&nbsp;Hello, " . $_SESSION['name'] . "</h2>";
				}
				else{
					header("location: login.php");
				}
			?>
		<div class = "box"></div>
		<div class = "student-info">
			<div style = "position: absolute; color: black; font-family: 'assistant'; left: 15%;">
				<?php
				if(isset($_SESSION['username'])){
					echo "<h3>Student Information</h3>";
					echo "<form>";
					echo "<label>User: </label>";
					echo "<input type='text' value='" . $_SESSION['userID'] . "'disabled><br>";
					echo "<label>Full Name: </label>"; 
					echo "<input type='text' value='" . $_SESSION['name'] . "'disabled><br>";
					echo "<label>Username: </label>";
					echo "<input type='text' value='" . $_SESSION['username'] . "'disabled><br>";
					echo "<label>Usertype: </label>";
					echo "<input type='text' value='" . $_SESSION['usertype'] . "'disabled>";
					echo "</form>";
				}
				else{
					header("location: login.php");
				}
			?>
		</div>
		<div class = "student-profile"></div>
		<div class = "panel-codes">
			<!-- table header -->
			<table>
			<tr>
				<th>Semester</th>
			    <th>School Year</th>
			    <th>View Grades</th>

			</tr>
			</table>
		</div>
		<div class = "panel-grades">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<?php 
			function build_table($result){
				if(mysqli_num_rows($result) > 0){
					//create the table
				        echo "<table>";
					//table data (looping each of the data on the result)
					while($row = mysqli_fetch_array($result)){
					    echo "<tr>";
					    echo "<td  style='display:none';>" . $row['StudNum'] . "</td>";
					    echo "<td  style='display:none';>" . $row['Name'] . "</td>";
					    echo "<td>" . $row['Sem'] . "</td>";
					    echo "<td>" . $row['SY'] . "</td>";
					    echo "<td style='display:none';>" . $row['Pay_Stat'] . "</td>";
					    echo "<td>";
					      if($row['Pay_Stat'] == "PAID") 
						      {
						       		    $query_string = http_build_query(array(
								            'StudNum' => $row['StudNum'],
								            'Name' => $row['Name'],
								            'Sem' => $row['Sem'],
								            'SY' => $row['SY'],
								            'Pay_Stat' => $row['Pay_Stat']
								        ));
								        $url = 'viewgrade.php?' . $query_string;
								        echo "<a href='$url' class='viewbtn'>View</a>";
						  	}
						  else 
							  {
							        echo "<button class='viewbtn' disabled>View</button>";
							  }
					    echo "</td>";
					    echo "</tr>";
					};
					echo "</table>";
				}
				else{
					echo "No Data Found";
				}
			}
			//display the table
			require_once "config.php";
			$sql = "SELECT * FROM tblsem WHERE name = ? ORDER BY SY, Sem";
			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt,"s",$_SESSION['name']);
				if(mysqli_stmt_execute($stmt)){
					$result = mysqli_stmt_get_result($stmt);
					build_table($result);
				}
			}
			else{
				echo"Error on semester load";
			}
		?>
		</div>
	</form>
		<div class = "box-subject"></div>
		</div>
		</div>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
	.one img{
		position: absolute;
		width: 45px;
		height: 45px;
		left: 30px;
		top: 900px;
		opacity: 0.8;
		cursor: pointer;
	}
	.one img:hover{
		opacity: 1;
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
		left: 20px;
		top: 15px;
		background: #131C70;
		border-radius: 7px;
	}
	.panel-codes{
		position: absolute;
		width: 1706px;
		height: 46px;
		left: 20px;
		top: 250px;
		background: #131C70;
		border-radius: 7px;
	}
	.panel-grades{
		position: absolute;
		width: 1706px;
		height: 450px;
		left: 20px;
		top: 301px;
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
	.viewbtn{
		position: absolute;
		width: 80px;
		height: 30px;
		float: right;
		opacity: 0.8;
		font-family: 'assistant';
		background-color: #002d86;
		color: white;
		border: none;
		cursor: pointer;
		border-radius: 5px;
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
	}
	.viewbtn:hover{
		color: white;
		opacity: 1;
	}
	.viewbtn:disabled{
		background-color: #D3D3D3;
		opacity: 0.5;
	}
	table{
	    border-collapse: collapse;
	    table-layout: fixed;
	    width: 100%;
	}
	th, td{
	    padding: 8px;
	    text-align: center;
    	width: 12.5%;
	}
	label{
		width: 100px;
		display: inline-block;
	}
	#form{
		border-radius: 10px;
		background: black;
		width: 290px;
		padding: 4px;
	}
	 .modal-dialog {
    max-width: 80%;
    max-height: 100%;
  }
</style>
</html>