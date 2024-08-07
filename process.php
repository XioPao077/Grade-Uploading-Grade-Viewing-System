<?php
	require_once "config.php";
	include ("session-checker.php");
	//custom function for determining the filze size
	function get_size($size){
		$kb_size = $size/1048576;
		$format_size = number_format($kb_size, 2). 'MB';
		return $format_size;
	}
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection, 'cs320');
	//file path
	$path = 'C:/xampp/htdocs/CS320/upload/'.$_POST['foldername'];
	//getting the file size
	$size = get_size($_FILES['upload']['size']);
	//Generate ID from date 
	$Date  = date('m/d/Y');
	$id_code = date('Ymd-His');
	//file size Limit
	if($size < 20.0){
		//check if item exists "0777" so it has the 'admin' clearance on a system
		if(!file_exists($path)){
			mkdir($path,0777, true);
		}
		//uploading
		$temp_file = $_FILES['upload']['tmp_name'];
		//checks if file is empthy 
		if($temp_file != ""){
			//creates new file path (folder)
			$newfilepath = $path."/".$_FILES['upload']['name'];
			//if upload is success (database function under development)
			if(move_uploaded_file($temp_file, $newfilepath)){
				 $query = "INSERT INTO tblfiles(FileID,FilePath,UploadedBy,dateUploaded) VALUES ('$id_code','$path','".$_SESSION['name']."','$Date')";
                 $query_run = mysqli_query($connection,$query);
				
				 if($query_run)
              {
                $_SESSION['message'] = "Successfully Imported";
	            header('Location: excelUpload.php');
	            exit(0);
              }
              else
              {
                $_SESSION['message'] = "Error on Upload";
	            header('Location: excelUpload.php');
	            exit(0);
              }
			}
			else{
				$_SESSION['message'] = "Error";
	            header('Location: excelUpload.php');
	            exit(0);
			}
		}
	}
	else
	{
		$_SESSION['message'] = "File Too Large!";
	            header('Location: excelUpload.php');
	            exit(0);
	}