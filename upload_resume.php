<?php
//Uploading the resume
	
	
if(isset($_FILES['resume'])){
	$file = $_FILES['resume'];
	
	//File properties
	$file_name = $_FILES['resume']['name'];
	$file_tmp = $_FILES['resume']['tmp_name'];
	$file_size = $_FILES['resume']['size'];
	$file_error = $_FILES['resume']['error'];
	
	//Filtering the file extensions
	$file_ext = explode('.',$file_name);
	$file_ext = strtolower(end($file_ext));
	
	$allowed = array('pdf','txt','doc','odt','rar','zip');
	
	if(in_array($file_ext , $allowed)){
		if($file_error === 0){
			if($file_size <= 2097152){
				$file_name_new = uniqid('',true).'.'.$file_ext;
				$file_destination = 'resumes/'.$file_name_new;
				//move_uploaded_file($file_tmp , $file_destination)
				if(!move_uploaded_file($file_tmp , $file_destination)){
					echo '<strong>There was some problem in uploading the resume.</strong>';
				}
				else{
					mysqli_query($dbconnect , "INSERT INTO `applications`(`resume`) VALUES ('".mysqli_real_escape_string($dbconnect, $file_name_new)."')");
					}

			}
			else{
				echo 'file size is too large.';
			}
		}
		else{
			echo 'An error occured.';
		}
	}
	else {
		echo 'file extension not supported.';
	}
	
}
?>