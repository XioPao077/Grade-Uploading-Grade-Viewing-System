<?php
//database creds
define('DB_SERVER','127.0.0.1');
define('DB_USERNAME','Tampos');
define('DB_PASSWORD','1234');
define('DB_NAME','cs320');

//attempt to connect to MYSQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME,DB_PASSWORD,DB_NAME);

//check connection
if($link == false){
	die("ERROR: Could not connect".mysqli_connect_error());
}

//timezone
date_default_timezone_set('Asia/Manila');
?> 