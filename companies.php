<br><br><br>
<head>
	<style type="text/css">
		div.ridge {border-style: ridge;}
	</style>
</head>
<center>
<h2><span style="color:blue; ">Companies</span></h2>

<?php
include('header.php');
session_start();

if(isset($_GET['comp'])){
	//name,comp desc,website,contact,logo,location,phone,
	//all the jobs.
	
	$query_comp = mysqli_query($dbconnect , "Select * from `employer-login` where `comp-name` = '".$_GET['comp']."'");
	$query_jobs = mysqli_query($dbconnect , "Select * from `jobs` where `comp-name` = '".$_GET['comp']."'");
	
	$comp = mysqli_fetch_assoc($query_comp);
	$jobs = mysqli_fetch_assoc($query_jobs);
	
	?>
	<div class="card container">
	<p>Name: <strong><?php echo($comp['comp-name']); ?></strong></p>
	<p>Description: <strong><?php echo($comp['comp-desc']); ?></strong></p>
	<p>Website: <strong><a href = '<?php echo($comp['website']); ?>'><?php echo($comp['website']); ?></a></strong></p>
	<p>Location: <strong><?php echo($comp['location']); ?></strong></p>
	<p>Contact: <strong><?php echo($comp['phone']); ?></strong></p></div><br>
	
	<p><strong><?php echo('Jobs Offered: '.mysqli_num_rows($query_jobs)); ?></strong></p><br>
	
	<?php
	if(mysqli_num_rows($query_jobs)>0){
		$count = 0;
	do{
		$count = $count + 1;
		echo("<strong>".$count.".</strong>");
		//Company logo
		
		$logo = mysqli_query($dbconnect , "Select `logo` from `employer-login` where `username`='".$jobs['username']."'");
		$comp_logo = mysqli_fetch_assoc($logo);
		echo('<img src="data:image/jpg;base64,'.base64_encode($comp_logo['logo']).'" height="100" width="100"/>');
		
		?><p>Job title: <strong><?php echo($jobs['job-title']); ?></strong></p><?php
		?><p>Job description: <strong><?php echo($jobs['job-desc']); ?></strong></p><?php
		?><p>Job type: <strong><?php echo($jobs['job-type']); ?></strong></p><?php
		?><p>Location: <strong><?php echo($jobs['location']); ?></strong></p><?php
		?><p>Expiry date: <strong><?php echo($jobs['exp-date']); ?></strong></p><?php
		?><p>Expected pay: <strong><?php echo($jobs['pay']); ?></strong></p><?php
		
		if(isset($_SESSION['jobseeker']['username'])){
		//checking if the jobseeker has applied for the current job or not.
		$query = mysqli_query($dbconnect , "Select * from `applications` where `job-id`='".$jobs['job-id']."' and `username`='".$_SESSION['jobseeker']['username']."'");
		if(mysqli_num_rows($query)>0){
			echo(" <p><strong>(You have already applied for this job.)</strong><p><br><br>");
		}
		else{
			?><p><a href = 'index.php?page=apply&job_id=<?php echo($jobs['job-id']); ?>'><strong>Apply</strong></a><br><br><?php
		}
		}
		?><?php
	}while($jobs = mysqli_fetch_assoc($query_jobs));
	}
	
}

if(((isset($_SESSION['employer']['username'])) or (isset($_SESSION['jobseeker']['username']))) and (!isset($_GET['comp']))){
	//$query = mysqli_query($dbconnect , "Select distinct`company-name` from `third-table`");
	//$jobs = mysqli_fetch_assoc($query);
	//$no_of_jobs = mysqli_query($dbconnect , "Select * from `first-table` where c4='".$jobs['company-name']."'");
	
	$query = mysqli_query($dbconnect , "Select distinct `comp-name`,`no-jobs-offered` from `employer-login`");
	$companies = mysqli_fetch_assoc($query);
	//$no_of_jobs = mysqli_query($dbconnect , "Select * from `jobs` where comp-name='".."'");
	$count = 0;
	do{
		echo ++$count.'.';
		//Displaying company logo.


		?><div class="card container"><p><h3><?php echo $companies['comp-name'] ?></h3></p><?php
		?><p>jobs  available: 
		<strong><?php 
		//$no_of_jobs_query = mysqli_query($dbconnect , "Select * from `jobs` where comp-name='".$companies['comp-name']."'");
		//$job_count = mysqli_num_rows($no_of_jobs);
		echo ($companies['no-jobs-offered']);
		?></strong></p><?php
		?><p><strong><a href = 'index.php?page=companies&comp=<?php echo($companies['comp-name']);?>'>Explore <?php echo $companies['comp-name']?></a></strong></p></div><?php
	}while($companies = mysqli_fetch_assoc($query));
}
else if(isset($_SESSION['employer']['username'])){
?>
<p>Please <a href = 'index.php?page=login' >login</a> as jobseeker to apply.</p>
<?php
}
else if((!isset($_SESSION['jobseeker']['username'])) and (!isset($_SESSION['employer']['username']))){
?>
<p>Please <a href = 'index.php?page=login' >login</a> to explore.</p>
<?php
}
?>
</center>
