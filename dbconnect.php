<?php
$dbconnect = mysqli_connect("localhost","phpmyadmin","password","phpmyadmin");
if(mysqli_connect_errno()){
	echo "error : ".mysqli_connect_error();
	exit;
}


?>