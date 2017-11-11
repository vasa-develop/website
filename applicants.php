<br><br><br>
<head>
	<style type="text/css">
		div.ridge {border-style: ridge;}
	</style>
</head>
<?php
include('header.php');
session_start();
//Only allow logged in employer to access this page.
if(isset($_SESSION['employer']['username'])){
	
	//fetching the jobseekers
	$query = mysqli_query($dbconnect , "Select * from `job-seeker-login`");
	$list = mysqli_fetch_assoc($query);
	
	
	?>
	<center>
	<h3><span style="color:blue; ">Candidates Available: </span></h3>
	<!--<form name = 'applicants' method = 'post' action = 'index.php?page=applicants'>
		<p>Name: <input type = 'text' name = 'name'/></p><br>
		<p>Job title category(drop): <input type = 'text' name = 'jobcat'/></p><br>
		<p>Desired job type(drop): <input type = 'text' name = 'jobtype'/></p><br>
		<p>Preffered locations: <input type = 'text' name = 'locations'/></p><br>
		<p>Expiration Date: <input type = 'text' name = 'expdate'/></p><br>
		<p>Pay rate: <input type = 'text' name = 'pay'/></p><br>
		<input type = 'submit' name = 'submit' value = 'Search'/> -->
		
		<?php
		
		do{
			
			?><div class="card container"><?php echo $count; ?>.&nbsp<?php
			?><p><strong>Name: </strong><?php echo $list['name']; ?></p><?php
			?><p><strong>Email: </strong><?php echo $list['email']; ?></p></div><?php
			
		}while($list = mysqli_fetch_assoc($query));
	?>
		
	<?php
}
//Deny entry of any other.

else if(isset($_SESSION['jobseeker']['username'])){
	?>
<center>
	<p>Please <a href = 'index.php?page=login'>login</a> as an employer to explore. 
	<p>Don't have an Employer Account yet. 	
	<p><a href = 'index.php?page=signup&stype=employer'>Create one now.</a></p>
</center>
	<?php
}
else{
	?>
	<center><p>Please login as an <a href = 'index.php?page=login' >employer</a> to explore.</p></center>
	<?php
}	
?></center>
<?php
?>