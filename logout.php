<?php
//destroy or delete the session
session_start();
unset($_SESSION['userName']);
unset($_SESSION['userType']);
unset($_SESSION['Name']);
//redirect to login form
header("location: login.php");
?>