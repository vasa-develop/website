<br><br><br>
<head>



	<style type="text/css">
		div.ridge {border-style: ridge;}
	</style>
</head>	


<?php
	include('header.php');
	include('date.php'); 
	session_start();
	
	//if a jobseeker comes to the page ask him to make an employer's account.
	if((isset($_SESSION['jobseeker']['username'])) and (!isset($_SESSION['employer']['username']))) {
		?>
	<center>
		<p> Please Login as a <a href = 'index.php?page=login'>employer</a>.</p>
		<br>
		<p> Don't have an employer account?</p>
		<p> <a href = 'index.php?page=signup&stype=employer'>make one now</a>.</p>
	</center>
		<?php
	}
	
	
	//retrieving the name,contact of the employer's company.
	else if((isset($_SESSION['employer']['username']))){
			$name = mysqli_query($dbconnect , "Select `comp-name` from `employer-login` where username = '".$_SESSION['employer']['username']."'");
			$contact = mysqli_query($dbconnect , "Select `phone` from `employer-login` where username = '".$_SESSION['employer']['username']."'");
			$compname = mysqli_fetch_assoc($name);
			$compcontact = mysqli_fetch_assoc($contact);
	}
			
	
	//saving the posted job to database
	if(isset($_POST['submit'])){
		mysqli_query($dbconnect , "INSERT INTO `jobs`(`job-title`, `job-desc`, `job-type`, `job-type-cat`, `location` , `exp-date` , `pay` , `comp-name` , `username` , `contact` , `job-id`) VALUES  ('".mysqli_real_escape_string($dbconnect , $_POST['jobtitle'])."','".mysqli_real_escape_string($dbconnect , $_POST['jobdesc'])."','".mysqli_real_escape_string($dbconnect , $_POST['jobtype'])."','".mysqli_real_escape_string($dbconnect , $_POST['jobcat'])."','".mysqli_real_escape_string($dbconnect , $_POST['location'])."','".mysqli_real_escape_string($dbconnect , $_POST['exp-date'])."','".mysqli_real_escape_string($dbconnect , $_POST['pay'])."','".mysqli_real_escape_string($dbconnect , $compname['comp-name'])."','".mysqli_real_escape_string($dbconnect , $_SESSION['employer']['username'])."','".mysqli_real_escape_string($dbconnect , $compcontact['phone'])."','".mysqli_real_escape_string($dbconnect , mt_rand(0,1000000))."')");
		$count_query = mysqli_query($dbconnect , "Select `no-jobs-offered` from `employer-login` where username = '".$_SESSION['employer']['username']."'");
		$count = mysqli_fetch_assoc($count_query);
		$final_count = $count['no-jobs-offered'] + 1;
		//use update query.
		mysqli_query($dbconnect , "UPDATE `employer-login` SET `no-jobs-offered` = ".$final_count." where username = '".$_SESSION['employer']['username']."'" );
?>
<script type="text/javascript">
		$('#submit').on('click', function(){
		  var date = new Date($('#datepicker').val());
		  day = date.getDate();
		  month = date.getMonth() + 1;
		  year = date.getFullYear();
		  alert([day, month, year].join('/'));
		});
</script>
		<?php
	}
			
	if((!isset($_SESSION['employer']['username'])) and (!isset($_SESSION['jobseeker']['username']))){
		?>
		<p><center>Please <a href = 'index.php?page=login' >login</a> to explore.</center></p>
		<?php
		
	}
	else if((isset($_POST['submit'])) and (isset($_SESSION['employer']['username']))){
		?> 
	<center>
		<p><h2>New job posted</h2></p>
		<p><strong>Details</strong></p>
	<div class="card container">
		<p>Company Name: <strong><?php echo $compname['comp-name'];?></strong></p>
		<p>Role: <strong><?php echo $_POST['jobtitle'];?></strong></p>
		<p>Pay: <strong><?php echo $_POST['pay'];?></strong></p>
		<p>Description: <strong><?php echo $_POST['jobdesc'];?></strong></p>
		<p>Job Category: <strong><?php echo $_POST['jobcat'];?></strong></p>
		<p>Job type: <strong><?php echo $_POST['jobtype'];?></strong></p>
		<p>Contact: <strong><?php echo $compcontact['phone'];?></strong></p>
		<p>Expiraton Date: <strong><?php echo $_POST['exp-date'];?></strong></p>
	</div>
		<p><strong><a href = 'index.php?page=post'>Post another job.</a></strong></p>
	</center>
		<?php	
			
			
			//mysqli_query($dbconnect , "INSERT INTO `third-table` (`company-name`, `post`, `pay`, `description`, `contact`) VALUES ('".."')");
	}
	
	else if(isset($_SESSION['employer']['username'])){
		?>
		
		<center>
		<h2><span style="color:blue; ">Post a Job.</span></h2>
		<div class="card container">
			<br>
		<form name = 'jobpost' action = 'index.php?page=post' method='post'>
			<?php
				include('jobform.php');
			?>
		</form>	
		</center>
		</div>
		<?php
	}
?>
