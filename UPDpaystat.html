<!DOCTYPE html>
<html>
	<?php session_start(); $result1="";?>
	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scale = 1">
		<title>Admin Page</title>
	</head>
	<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
	<body style = "background-color: grey; font-family: 'assistant';">
		<div class = "studentpage">
		<div class = "panel-side">
			<div class = "home">
				<a href = "http://localhost/cs320/dashboard.php"><img src = home.png><div class = "home1">Home</div></a>
			</div>
			<div class = "account">
				<a href = "http://localhost/cs320/adminpage.php"><img src = user.png><div class = "account1">Account</div></a>
			</div>
			<div class = "upload">
				<a href = "http://localhost/cs320/professor.php"><img src = add.png><div class = "upload1">Upload</div></a>
			</div>
			<div class = "signout">
				<a href = "http://localhost/cs320/logout.php"><img src = signout.png><div class = "sign1">Sign Out</div></a>
			</div>
		</div>
		</div>
		<div class = "panel-top">
			<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
				<input type = "submit" class = "btn create"  id = "open-modal" value = "Create Account";/>
			</form>
				<?php
					if(isset($_SESSION['username'])){
						echo "<h2>&emsp;&nbsp;Hello, Admin  " . $_SESSION['name'] . "</h2>";
					}
					else{
						header("location: login.php");
					}
				?>
			<div class = "box">
				<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
				<div class="search">
				Search:<input type = "text" name = "txtsearch">
				<input type = "submit" id="btn_search" name = "btn_search" value = "Search">
				</div>
			</form>
			</div>
		<div class = "student-info"> 
			<div style = "position: absolute; color: black; font-family: 'assistant'; left: 11%;">
				<?php
				if(isset($_SESSION['username'])){
					echo "<h3>Account Information</h3>";
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
        </div>

		<div class = "student-profile">
			<div class = profilepic>
				<img src = https://img.freepik.com/free-icon/user_318-159711.jpg>
			</div>
		</div>
		<div class = "panel-codes">
			<!-- table header -->
			<table>
			<tr>
			    <th>User ID</th>
			    <th>Username</th>
			    <th>Password</th>
			    <th>Name</th>
			    <th>Status</th>
			    <th>Usertype</th>
			    <th>Functions</th>
			</tr>
			</table>
		</div>
		<div class = "panel-grades">
		<?php 
	function build_table($result) {
		if (mysqli_num_rows($result) > 0) {
			// Create the table
			echo "<table id='datatableid' class='table table-bordered table-primary table-striped'>";
			// Table headers
			
			// Table data (looping each of the data on the result)
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['userID'] . "</td>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['password'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['status'] . "</td>";
				echo "<td>" . $row['usertype'] . "</td>";
				echo "<td>";
				echo "<div class='function'>";
				echo "<form action='adminpage.php' method='POST'>";
				echo "<button class='btn edit' type='button' name='btnedit'id='btnedit" . $row['userID'] . "'>Edit</button>";
				echo "<input type='hidden' name='userID' value='" . $row['userID'] . "'>";
				echo "<button class='btn delete' name='btndeletes' id='btndeletes_" . $row['userID'] . "'>Delete</button>";
				echo "</form>";
				echo "</div>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";	
		} else {
			echo "No Data Found";
		}
	}
?>
	<!--modal code-->
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">	
		<div id = "modal">
			<div class = "modal-content">
				<span class = "close">&times;</span>
  					<div class = "panel-top-modal">
  						<br>
    				</div>
					<div class = "form-group" style = "color: black; width: 100%;">
            			<div class="input-group"><br>
			            	<form>
							<label>User ID: </label>
							<input type = "text" placeholder = "Enter User ID" name = "userIDs" required = ""><br>
							<label>Status: </label>
							<select name = "payment">
  								<option value = "PAID">PAID</option>
  								<option value = "DELINQUENT">DELINQUENT</option>
							</select><br>
							<label>Username: </label>
							<input type = "text" placeholder = "Enter Username" id = "uname" name = "uname" required = ""><br>
							<label>Password: </label>
							<input type = "password" placeholder = "Enter Password" name = "pword" required = ""><br>
							<label>Usertype: </label>
							<select name = "utype">
  								<option value = "ADMIN">ADMIN</option>
  								<option value = "STUDENT">STUDENT</option>
  								<option value = "PROFESSOR">PROFESSOR</option>
							</select><br>
							<label>Name: </label>
							<input type = "text" placeholder = "Enter Fullname" name = "names" required = ""><br>
							</form>
            			</div>   
            		</div>
            		<div class = "button-groupstyle">
		        		<input type = "submit" class = "btn modal" id = "btncreate" name = "btncreate" value = "Create";/>
            		</div>

   
	 

	<!--modal script-->
	<script>
	var modal = document.getElementById("modal");
	var openModal = document.getElementById("open-modal");
	var closeModal = document.getElementsByClassName("close")[0];

	openModal.onclick = function() {
  		modal.style.display = "block";
	}

	closeModal.onclick = function() {
  		modal.style.display = "none";
	}

	window.onclick = function(event) {
  		if (event.target == modal) {
    		modal.style.display = "none";
  		}
	}
	var form = document.querySelector('form');
	form.addEventListener('submit', function(e) {
  		e.preventDefault();
  		// validate form data
  		// submit data to server using AJAX
	});

	//MODAL FOR DELETE BUTTON

	</script>
			</div>
		</div>
	</form>

	<?php 
   	include ('config.php');
   	if(isset($_POST['btncreate'])){
		$sql = "INSERT INTO tblaccounts (userID, username, password,name,status,usertype) VALUES (?, ?, ?, ?, ?, ?)";
		//prepare the statement
		if($stmt = mysqli_prepare($link, $sql)){
  			//bind the parameters
 	 		mysqli_stmt_bind_param($stmt, "ssssss", $userIDs, $usernames, $passwords,$names,$statuss,$usertypes);
  			//set the values
  			$userIDs = $_POST["userIDs"];
  			$usernames = $_POST["uname"];
  			$passwords = $_POST["pword"];
			$names = $_POST["names"];
			$statuss = $_POST["payment"];
			$usertypes = $_POST["utype"];
  			//execute the statement
  			if(mysqli_stmt_execute($stmt)){
    			echo "<script>alert('Succesfully Created!');</script>";
  			}
  			else{
  				echo "<script>alert('Error on create');</script>";
  			}
  			//close the statement
  			mysqli_stmt_close($stmt);
		}
	}
	//edit and delete button function
	
if (isset($_POST['btndeletes'])) {
  $userID = $_POST['userID'];
  $sql = "DELETE FROM tblaccounts WHERE userID = ?";
  if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $userID);
    mysqli_stmt_execute($stmt);
    // Check if the delete operation was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
      echo "<script>alert('Successfully deleted!');</script>";
    } else {
      echo "<script>alert('No records were deleted.');</script>";
    }
  } else {
    echo "<script>alert('Error in the prepared statement.');</script>";
  }
}
	?>
	<!--display accounts-->
	<?php
	

if (isset($_POST['btn_search'])) {
  if (isset($_POST['txtsearch'])) {
    $searchValue = '%' . $_POST['txtsearch'] . '%';
    $sql = "SELECT * FROM tblaccounts WHERE userID LIKE ? OR usertype LIKE ? ORDER BY userID ASC";
    if ($stmt = mysqli_prepare($link, $sql)) {
      mysqli_stmt_bind_param($stmt, "ss", $searchValue, $searchValue);
      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        build_Table($result);
      } else {
        echo "Error on search";
      }
    }
  }
}

	else //load data to the table
	{
	$sql = "SELECT * FROM tblaccounts ORDER BY userID asc";
	if($stmt = mysqli_prepare($link, $sql))
	{
		if(mysqli_stmt_execute($stmt))
		{
			$result = mysqli_stmt_get_result($stmt);
			build_Table($result);
		}
	}
	else
	{
		echo "Error on accounts load";
	}
}

	
	?>	
	</body>
	<style>
		.studentpage img{
			position: absolute;
			width: 430px;
			height: 101px;
			left: 1450px;
			top: 138px;
		}
		.search{
			position: absolute;
			top: 15px;
			left: 20px;
			background:#131C70 ;
		}
		.panel-side{
			position: absolute;
			width: 200px;
			height: 100%;
			left: 0px;
			top: 0px;
			background: #131C70;
			box-shadow: inset -11px 0px 8px rgba(0, 0, 0, 0.28);
		}
		.panel-top{
			position: absolute;
			width: 1720px;
			height: 70px;
			left: 200px;
			top: 0px;
			background: #131C70;
			color: white;
		}
		.home img{
			position: absolute;
			width: 60px;
			height: 60px;
			left: 10px;
			top: 30px;
			opacity: 0.8;
			cursor: pointer;
		}
		.account img{
			position: absolute;
			width: 60px;
			height: 60px;
			left: 10px;
			top: 120px;
			opacity: 0.8;
			cursor: pointer;
		}
		.upload img{
			position: absolute;
			width: 60px;
			height: 60px;
			left: 10px;
			top: 210px;
			opacity: 0.8;
			cursor: pointer;
		}
		.signout img{
			position: absolute;
			width: 50px;
			height: 50px;
			left: 10px;
			top: 900px;
			opacity: 0.8;
			cursor: pointer;
		}
		.home1{
			position: absolute;
			font-size: 25px;
			left: 80px;
			top: 45px;
			opacity: 0.8;
			cursor: pointer;
			color: white;
		}
		.account1{
			position: absolute;
			font-size: 25px;
			left: 80px;
			top: 135px;
			opacity: 0.8;
			cursor: pointer;
			color: white;
		}
		.upload1{
			position: absolute;
			font-size: 25px;
			left: 80px;
			top: 225px;
			opacity: 0.8;
			cursor: pointer;
			color: white;
		}
		.sign1{
			position: absolute;
			font-size: 25px;
			left: 75px;
			top: 905px;
			opacity: 0.8;
			cursor: pointer;
			color: white;
		}
		.home1:hover,
		.account1:hover,
		.upload1:hover,
		.sign1:hover{
			opacity: 1;
		}
		.home img:hover,
		.account img:hover,
		.upload img:hover,
		.signout img:hover{
			opacity: 1;
		}
		.box{
			position: absolute;
			width: 1670px;
			height: 650px;
			left: 25px;
			top: 300px;
			background: #FFFFFF;
			box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
			border-radius: 6px;
		}
		.student-info{
			position: absolute;
			width: 1670px;
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
		.profilepic img{
			position: absolute;
			width: 100px;
			left: 25px;
			top: 25px;
		}
		.panel-codes{
			position: absolute;
			width: 1630px;
			height: 46px;
			left: 45px;
			top: 350px;
			background: #131C70;
			border-radius: 7px;
		}
		div.panel-grades{
			margin: 4px, 4px;
            padding: 4px;
			position: absolute;
			width: 1640px;
			height: 500px;
			left: 45px;
			top: 401px;
			background: #131C70;
			border-radius: 7px;
			overflow-x: hidden;
            overflow-y: auto;
		}
		.btn{
			padding: 5px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			background-color: #FFFFFF;
  			color: #002d86;
  			font-family: 'assistant';
		}
		.create{
			position: absolute;
			width: 120px;
			left: 1572px;
			top: 18px;
			opacity: 0.8;
			filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
		}
		.edit, .delete,.search{
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin: 4px 2px;
		}
		.btn:hover{
			opacity: 1;
		}
		.modal{
			position: relative;
			width: 120px;
			height: 30px;
			left: 30px;
			top: 50px;
			opacity: 0.8;
			font-family: 'assistant';
			background-color: #002d86;
			color: white;
			border: none;
			cursor: pointer;
			border-radius: 5px;
			filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
		}
		#modal{
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.4);
		}
		.modal-content{
			background-color: #fefefe;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 30%;
			height: 50%;
		}
		.close{
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus{
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
		table{
		    border-collapse: collapse;
		   	table-layout: fixed;
		    width: 100%;
		}
		th, td{
		    color: white;
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
		
</style>
<script >
document.querySelectorAll('[name="btnedit"]').forEach(function(button) {
  button.addEventListener('click', function() {
    const userID = this.parentNode.querySelector('[name="userID"]').value;
    const url = 'edituser.php?userID=' + encodeURIComponent(userID);
    window.location.href = url;
  });
});

</script>
</html>