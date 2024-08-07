<?php
	if(isset($_POST['btnlogin'])){
		require_once "config.php";
		$sql = "SELECT * FROM tblaccounts WHERE username = ? AND password = ?";
		if($stmt = mysqli_prepare($link,$sql)){
			mysqli_stmt_bind_param($stmt,"ss",$_POST['txtusername'],$_POST['txtpassword']);
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt); 
				if(mysqli_num_rows($result) > 0){
					//fetch result into array
					$account = mysqli_fetch_array($result, MYSQLI_ASSOC);
					//create session
					session_start();
					//record session
					$_SESSION['username'] = $_POST['txtusername'];
					$_SESSION['usertype'] = $account['usertype'];
					$_SESSION['userID'] = $account['userID'];
					$_SESSION['name'] = $account['name'];
					if($_SESSION['usertype']=="ADMIN"){
						header("location: dashboard.php");
						echo "<script>alert('Succesfully logged in');</script>";
					}
					else if($_SESSION['usertype']=="STUDENT"){
						header("location: studentpage.php");
						echo "<script>alert('Succesfully logged in');</script>";
					}
					else{
						header("location: excelUpload.php");
						echo "<script>alert('Succesfully logged in');</script>";
					}
				}
				else{
					echo "<script>alert('Incorrect login credentials or account is inactive');</script>";
				}
			}
		}
	else{
		echo"<script>alert('Error on select Statement');</script>";
	}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1">
		<title>Arellano University Grade Viewing System</title>
	</head>
	<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
	<body>
		<font>
			<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
				<div class = "container-box">
					<div class = "logo">
						<img src = "arellano-logo.png">
					</div>
				<div class = "login">
					<img src ="florentino.jpg">
						<div class = text1>
							<h1>Grade Viewing System</h1></div>
						<div class = text2>
							<h2>Welcome</h2>
							<h3>Sign in to continue</h3></div>
					<input type = "text" placeholder = "Enter Username" name = "txtusername" required><br>
					<input type = "password" placeholder = "Enter Password" name = "txtpassword" required><br>
					<input type = "submit" class = "btn" name = "btnlogin" value = "Login">
				</div>
				</div>
		</font>
			</form>
		<style>
			body{
				background: url(plaridel-background.jpg);
				background-size: cover;
				background-repeat: no-repeat;
				font-family: 'assistant';
				font-size: 14px;
				color: black;
			}
			.container-box{
				position: absolute;
				width: 1896px;
				height: 131px;
				left: 12px;
				top: 9px;
				background: rgba(61, 99, 134, 0.7);
			}
			.logo img{
				position: absolute;
				width: 550px;
				height: 131px;
				left: 690px;
				top: 0px;
				mix-blend-mode: normal;
				filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.50));
			}
			.login{
				background: #3D6386;
				position: absolute;
				width: 801px;
				height: 559px;
				left: 550px;
				top: 270px;
				filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
				border-radius: 10px;
			}
			.login img{
				position: absolute;
				width: 400px;
				height: 559px;
				left: 0px;
				top: 0px;
				border-radius: 10px 0px 0px 10px;
			}
			.text1{
				position: relative;
				color: white;
				font-family: 'assistant';
				font-size: 17px;
				left: 55.06%;
				right: 19.73%;
				top: 9%;
				bottom: 63.33%;
				letter-spacing: 0.03em;
			}
			.text2{
				position: relative;
				color: white;
				font-family: 'assistant';
				left: 55.06%;
				right: 19.73%;
				top: 9%;
				bottom: 63.33%;
			}
			input[type=text]{
				position: absolute;
				left: 55.06%;
				right: 4.37%;
				top: 43.11%;
				bottom: 49.91%;
				background: #D9D9D9;
				border-radius: 5px;
			}
			input[type=password]{
				position: absolute;
				left: 55.06%;
				right: 4.37%;
				top: 54.53%;
				bottom: 38.49%;
				background: #D9D9D9;
				border-radius: 5px;
			}
			.btn{
				position: absolute;
				background-color: #002d86;
				color: white;
				border: none;
				cursor: pointer;
				left: 55.06%;
				right: 4.37%;
				top: 69.95%;
				bottom: 23.08%;
				opacity: 0.8;
				border-radius: 5px;
				filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
			}
			.btn:hover{
				opacity: 1;
			}
		</style>
	</body>
</html>