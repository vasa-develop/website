<?php
if(isset($_FILES['img'])){
	$file = $_FILES['img'];
	
	//File properties
	$file_name = $_FILES['img']['name'];
	$file_tmp = $_FILES['img']['tmp_name'];
	$file_size = $_FILES['img']['size'];
	$file_error = $_FILES['img']['error'];
	
	//Filtering the file extensions
	$file_ext = explode('.',$file_name);
	$file_ext = strtolower(end($file_ext));
	
	$allowed = array('png','jpeg','jpg','bmp','tiff','tga','jbig','ani','djvu');
	
	if(in_array($file_ext , $allowed)){
		if($file_error === 0){
			if($file_size <= 2097152){
				$file_name_new = uniqid('',true).'.'.$file_ext;
				$file_destination = 'img/'.$file_name_new;
				if(!move_uploaded_file($file_tmp , $file_destination)){
					echo '<strong>There was some problem in uploading the logo.</strong>';
				}
			}
		}
	}

	

	
	
	
	
	
	
}

?>