<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
	<title>Registrar Dashboard</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
<body style = "background-color: grey; font-family: 'assistant';">
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
	<?php 
	session_start();
	require_once "config.php";
	
	//paid query
	$sql = "SELECT COUNT(*) as count FROM tblsemester WHERE Pay_Stat='PAID'";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
  	$count = $row["count"];
  	$paid= $count;
	} else {
  	$paid=0;
	}
	
	//unpaid query
	$sql = "SELECT COUNT(*) as count FROM tblsemester WHERE Pay_Stat='UNPAID'";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
  	$count = $row["count"];
  	$unpaid= $count;
	} else {
  	$unpaid=0;
	}

	//student query
	$sql = "SELECT COUNT(*) as count FROM tblaccounts WHERE usertype='STUDENT'";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
  	$count = $row["count"];
  	$student= $count;
	} else {
  	$student=0;
	}

	//professor query
	$sql = "SELECT COUNT(*) as count FROM tblaccounts WHERE usertype='PROFESSOR'";
	$result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result);
  	$count = $row["count"];
  	$professor= $count;
	} else {
  	$professor=0;
	}

	mysqli_close($link);
	?>
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
</div>
	<div class = "panel-top">
			<div class = "signout">
			<a href = "http://localhost/cs320/logout.php"><img src = signout.png><div class = "sign1"></div></a>
			</div>
		<div class = "panel1">
			<div class = "information"><h2>Account Information</h2></div>
			<div class = "line"></div>
			<input  type = "button" class = "btn btn1" value = "Click" onclick = "document.location.href = 'adminpage.php'";/>
		</div>
		<div class = "panel2">
			<div class="wrapper">
			     <div class="container">
        			<span class="num" data-val="<?php echo"".$paid;?>">0</span>
        			<span class="text">Settled Accounts</span>
      			</div>
      		</div>
		</div>
		<div class = "panel3">
			<div class="wrapper">
      			<div class="container">
        			<span class="num" data-val="<?php echo"".$unpaid;?>">0</span>
        			<span class="text">Unsettled Accounts</span>
        			<input  type = "button" class = "btn btn1" value = "Click" onclick = "document.location.href = 'adminpage.php'";/>
    		</div>
		</div>
		<div class = "panel4">
			<div class="wrapper">
      			<div class="container">
        			<span class="num" data-val="<?php echo"".$student;?>">0</span>
        			<span class="text">Students</span>
    		</div>
		</div>
		<div class = "panel5">
			<div class="wrapper">
      			<div class="container">
        			<span class="num" data-val="<?php echo"".$professor;?>">0</span>
        			<span class="text">Professors</span>
    		</div>
		</div>
	</div>
</div>
</form>
</body>
<style>
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
		right: 50px;
		top: 10px;
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
	.panel1{
		position: absolute;
		width: 1230px;
		height: 274px;
		left: 40px;
		top: 106px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 5px;
	}
	.information{
		position: absolute;
		left: 3%;
		top: -10%;
		font-weight: 700;
		font-size: 48px;
		line-height: 140.8%;
		letter-spacing: -0.015em;
		color: #002d86;
	}
	.line{
		position: absolute;
		width: 94%;
		height: 0px;
		left: 3%;
		top: 40%;
		opacity: 0.47;
		border: 3px solid #131C70;
		transform: rotate(-180deg);
	}
	.panel2{
		position: absolute;
		width: 300px;
		height: 274px;
		left: 40px;
		top: 409px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 5px;
	}
	.panel3{
		position: absolute;
		width: 300px;
		height: 274px;
		left: 350px;
		top: 409px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 5px;
	}
	.panel4{
		position: absolute;
		width: 300px;
		height: 274px;
		left: 310px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 5px;
	}
	.panel5{
		position: absolute;
		width: 300px;
		height: 274px;
		left: 310px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 5px;
	}
	.btn{
		position: absolute;
		opacity: 0.8;
		font-family: 'assistant';
		background-color: #002d86;
		color: white;
		border: none;
		cursor: pointer;
		border-radius: 5px;
		filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)) drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
	}
	.btn1{
		width: 146px;
		height: 30px;
		left: 1050px;
		top: 225px;
	}
	.btn:hover{
		opacity: 1;
	}
	.wrapper{
  		position: absolute;
  		width: 125%;
  		transform: translate(-50%, -50%);
  		top: 50%;
  		left: 50%;
  		display: flex;
  		justify-content: space-around;
  		gap: 20px;
	}
	.container{
  		width: 80%;
  		height: 275px;
  		display: flex;
  		flex-direction: column;
  		justify-content: space-around;
  		position: relative;
  		font-size: 16px;
  		border-radius: 5px;
  		background-color: #FFFFFF;
  		cursor: pointer;
	}
	i{
  		color: #002d86;
  		font-size: 2.5em;
  		text-align: center;
	}
	span.num {
  		color: #002d86;
  		display: grid;
  		place-items: center;
  		font-weight: 1000;
  		font-size: 5em;
	}
	span.text {
  		color: #002d86;
  		font-size: 2em;
  		text-align: center;
  		pad: 0.7em 0;
  		font-weight: 400;
  		line-height: 0;
	}
	@media screen and (max-width: 1024px) {
  		.wrapper {
    		width: 85vw;
  		}
  		.container {
    		height: 26vmin;
    		width: 26vmin;
    		font-size: 12px;
  		}
	}
</style>
<script src="script.js"></script>
</html>