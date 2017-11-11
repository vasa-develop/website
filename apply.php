<br><br><br><br>
<center>
<?php
include('header.php');
session_start();

if(isset($_SESSION['jobseeker']['username'])){
if(!isset($_POST['submit'])){
	$_SESSION['jobId']=$_GET['job_id'];
?>
<h2><strong>Apply for Job</strong></h2>
<br>

<form name = 'apply' action = 'index.php?page=apply' method = 'post' enctype = 'multipart/form-data'>
<div class="card container">
	<p>Name*: <input type='text' name='name' required='required'/></p>
	<p>Email*: <input type='text' name='email' required='required'/></p>
	<p>Upload your Resume*: <input type='file' name='resume' required='required'/></p>
	<p>Cover letter: <textarea type='text' name='cover-letter' rows="30" cols="100" style="text-align: justify;"></textarea></p>
</div>
	<p><input type = 'submit' name = 'submit' value = 'Send Application' /></p>
</form>	

<?php
}
else if(isset($_POST['submit'])){
	$job_ids = mysqli_query($dbconnect , "Select `job-id` from `jobs`");
	$ids = mysqli_fetch_assoc($job_ids);
	$lock = false;
	do{
		if($_SESSION['jobId']==$ids['job-id']){
			$lock = true;
			break;
		}
	}while($ids = mysqli_fetch_assoc($job_ids));
	
	if($lock){
	mysqli_query($dbconnect , "INSERT INTO `applications`(`job-id`, `name`, `email`, `cover-letter`, `username`) VALUES ('".$_SESSION['jobId']."','".mysqli_real_escape_string($dbconnect , $_POST['name'])."','".mysqli_real_escape_string($dbconnect , $_POST['email'])."','".mysqli_real_escape_string($dbconnect , $_POST['cover-letter'])."','".mysqli_real_escape_string($dbconnect , $_SESSION['jobseeker']['username'])."')");
	//Uploading the resume to the folder.
	include('upload_resume.php');
	
}
else{
	echo 'No such job exists.';
}
	?>
		<p> Your application has been submitted. </p>
		<p> <a href = 'index.php?page=jobs'>Return back to browsing jobs.</a> </p>
	<?php
}
}
else if(isset($_SESSION['employer']['username'])){
	?>
	<p>Please <a href = 'index.php?page=login'>login</a> as a jobseeker to apply. </p>
	<?php
}
?>
</center>
