<br><br><br>
<center>
<?php  
session_start();


if(isset($_SESSION['employer']['username'])){
?>
<u><a href = 'index.php?page=account&sec=dashboard'>DashBoard</a></u>&nbsp;&nbsp;|


<u><a href = 'index.php?page=account&sec=posting'>Job Posting</a></u>&nbsp;&nbsp;|


<u><a href = 'index.php?page=account&sec=profile'>Company Profile</a></u>

<?php

if(isset($_GET['sec'])){
	if($_GET['sec']=='dashboard'){
		?>
		<br><br>
		<h2>My DashBoard:</h2><br><br>
		<a href = 'index.php?page=account&sec=dashboard&request=jobs'>
		Jobs Posted:
		<?php 
		$jobs = mysqli_query($dbconnect , "Select * from `jobs` where `username` = '".$_SESSION['employer']['username']."'");
		echo '(<strong>'.mysqli_num_rows($jobs).'</strong>)</a><br>';
		?>
		
		<a href= 'index.php?page=account&sec=dashboard&request=applications'>Applications:
		<?php
		$comp_name = mysqli_query($dbconnect , "Select `comp-name` from `employer-login` where `username`='".$_SESSION['employer']['username']."'");
		$comp_name = mysqli_fetch_assoc($comp_name);
		$jobs = mysqli_query($dbconnect , "Select `job-id` from `jobs` where `username`='".$_SESSION['employer']['username']."'");
		$job_id = mysqli_fetch_assoc($jobs);
		$count = 0;
		do{
			$query = mysqli_query($dbconnect , "Select `job-id` from `applications` where `job-id`='".$job_id['job-id']."'");
			$count = $count + mysqli_num_rows($query);
		}while($job_id = mysqli_fetch_assoc($jobs));
		echo '(<strong>'.$count.'</strong>)</a><br><br>';

		//All posted jobs:
	if(isset($_GET['request'])){
		if($_GET['request'] == 'jobs' ){
			$all_jobs = mysqli_query($dbconnect , "Select * from `jobs` where `username` = '".$_SESSION['employer']['username']."' ");
			$all_jobs_assoc = mysqli_fetch_assoc($all_jobs);
			do{
				//display the details
				?>
				<div class="card container">
					<p>Job title: <strong><?php echo($all_jobs_assoc['job-title']); ?></strong></p>
					<p>Job description: <strong><?php echo($all_jobs_assoc['job-desc']); ?></strong></p>
					<p>Job type: <strong><?php echo($all_jobs_assoc['job-type']); ?></strong></p>
					<p>Location: <strong><?php echo($all_jobs_assoc['location']); ?></strong></p>
					<p>Expiry date: <strong><?php echo($all_jobs_assoc['exp-date']); ?></strong></p>
					<p>Expected pay: <strong><?php echo($all_jobs_assoc['pay']); ?></strong></p>
					<p><a href = 'index.php?page=account&sec=dashboard&request=viewapplications&jobId=<?php echo($all_jobs_assoc['job-id']); ?>'>View Applications</a>
						<?php $count = mysqli_query($dbconnect , "Select * from `applications` where `job-id` = '".$all_jobs_assoc['job-id']."'");
						echo("(".mysqli_num_rows($count).")");
						?>
					</p> 
				</div>	
				<?php	
			}while($all_jobs_assoc = mysqli_fetch_assoc($all_jobs)); 
		}
			//All applications
		if($_GET['request'] == 'applications'){
			$applications = mysqli_query($dbconnect , "Select * from `applications` where `username` = '".$_SESSION['employer']['username']."'");
			$all_applications = mysqli_fetch_assoc($applications);
			do{
				?>
				<div class="card container">
					<p>Job title: <strong><?php echo($all_applications['job-title']); ?></strong></p>
				</div>	
				<?php	
				
			}while($all_applications = mysqli_fetch_assoc($applications));
		}
		if($_GET['request'] == 'viewapplications'){
			$apps = mysqli_query($dbconnect , "Select * from `applications` where `job-id` = '".$_GET['jobId']."'"); 
			$all_apps = mysqli_fetch_assoc($apps);
			//Displaying info about all the applications.
			?>
			<div class="card container">
				<p>Name: <strong><?php echo($all_apps['name']); ?></strong></p>
				<p>Email: <strong><?php echo($all_apps['email']); ?></strong></p>
				<p>Cover Letter: <strong><?php echo($all_apps['cover-letter']); ?></strong></p>
				<p>Resume: <strong><a href="resumes/<?php echo $all_apps['resume']; ?>" target="_blank">view file</a></strong></p>
			</div>	
			<?php  
		}

	}
		

		?>
		<?php
	}else if($_GET['sec']=='posting'){
		?>
		<br><br>
		<?php if(!isset($_GET['request'])) { ?>
		<h2>Job Posting:</h2><br><br>
		<?php 
		//jobs status
		$jobs = mysqli_query($dbconnect , "Select * from `jobs` where `username`='".$_SESSION['employer']['username']."'");
		$job_props = mysqli_fetch_assoc($jobs);
		
		?>
		Jobs Posted(<?php echo "<strong>".mysqli_num_rows($jobs)."</strong>"; ?>)<br><br>
		<?php
		if(mysqli_num_rows($jobs)>0){
		$count = 0;
		do{//All job details with applications.
			$count += 1;
			echo "<strong>".$count.".</strong>"."<br>";
			?><p>Job title: <strong><?php echo $job_props['job-title']."</strong></p>";  
			?><p>Job Description: <strong><?php echo $job_props['job-desc']."</strong></p>";  
			?><p>Job type: <strong><?php echo $job_props['job-type']."</strong></p>";  
			?><p>Job Category: <strong><?php echo $job_props['job-type-cat']."</strong></p>";  
			?><p>Location: <strong><?php echo $job_props['location']."</strong></p>";  
			?><p>Expiration date: <strong><?php echo $job_props['exp-date']."</strong></p>";  
			?><p>Pay: <strong><?php echo $job_props['pay']."</strong></p>";
			?><p><a href = 'index.php?page=account&sec=posting&jobId=<?php echo $job_props['job-id'] ; ?>&request=edit'>Edit job post</a></p><?php	
			//Appications recieved.
			$applications = mysqli_query($dbconnect , "Select * from `applications` where `job-id`='".$job_props['job-id']."'");
			?>Applications(<?php echo "<strong>".mysqli_num_rows($applications)."</strong>"; ?>)<?php echo '<br><br>';
		}while($job_props = mysqli_fetch_assoc($jobs));
		}
		}
		//if job post is edited.
		else if((isset($_GET['jobId'])) and (isset($_GET['request']))){
			if($_GET['request']=='edit'){
				//MAKE A JAVASCRIPT ALERT BOX TO FILL THE CHANGES INSTEAD OF REDIRECTING TO A NEW PAGE.
				include('jobedit.php');
			}
		}

		//Checking if the job edit form has been submitted or not.
		if(isset($_POST['editbutton'])){
			//Updating the database for job-post-edit.
			echo 'UPDATE';
			echo ($_SESSION['employer']['jobId']);	
			mysqli_query($dbconnect , "UPDATE `jobs` SET `job-title`='".$_POST['jobtitle']."',`job-desc`='".$_POST['jobdesc']."',`job-type`='".$_POST['jobtype']."',`job-type-cat`='".$_POST['jobcat']."',`location`='".$_POST['location']."',`exp-date`='".$_POST['exp-date']."',`pay`='".$_POST['pay']."',`contact`='".$_POST['contact']."' where `job-id` = '".$_SESSION['employer']['jobId']."' ");

		}
		?>
		<?php
	}else if($_GET['sec']=='profile'){
		?>
		<br><br>
		<h2>Company Profile:</h2>
		<div class="card container">
		<form name = 'profile' action = 'index.php?page=account&sec=profile&request=edit' method = 'post' enctype = 'multipart/form-data'> 
		<p>Email: <input type = 'text' name = 'email'/> </p>
		<p>Password: <input type = 'password' name = 'password'/> </p>
		<p>Confirm password: <input type = 'password' name = 'conf-password'/> </p>
		<p>Full name: <input type = 'text' name = 'name'/> </p>
		<p>Company name*: <input type = 'text' name = 'comp-name'/> </p>
		<p>Website*: <input type = 'text' name = 'website'/> </p>
		<p>Company Description: <input type = 'text' name = 'comp-desc'/> </p>
		<p>Work in BlockChain*: <input type = 'text' name = 'bc-work'/> </p>
		<p>BlockChain Use*: <input type = 'text' name = 'bc-use'/> </p>
		<p>Twitter handle for job promotion*: <input type = 'text' name = 'twitter-handle'/> </p>
		<p>Phone: <input type = 'text' name = 'phone'/> </p>
		<p>Location*: <input type = 'text' name = 'location'/> </p>
		<p>Logo*: <p>
		<!-- Current logo -->

		

		<?php 
		$logo = mysqli_query($dbconnect , "Select `logo` from `employer-login` where `username`='".$_SESSION['employer']['username']."'");
		$logo = mysqli_fetch_assoc($logo);
		echo('<img src="data:image/jpg;base64,'.base64_encode($logo['logo']).'" height="100" width="100"/>'); 
		echo '<img src="data:image/png;base64,'.base64_encode( $logo['logo'] ).'"/>';	?>
		<!-- Button to change logo -->
		<input type = 'file' name = 'logo'/> </p>
		
		<p><input type = 'submit' name = 'save' value = 'Save' />&nbsp;<input type = 'submit' name = 'delete' value = 'Delete Profile' /></p>
		</form>
		</div>
		<?php
		
		//if the changes in profile are saved.
		if(isset($_GET['request'])){
			if(isset($_POST['save'])){
				if($_FILES['logo']){
				$image = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
				mysqli_query($dbconnect , "UPDATE `employer-login` SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`password`='".$_POST['password']."',`comp-name`='".$_POST['comp-name']."',`website`='".$_POST['website']."',`comp-desc`='".$_POST['comp-desc']."',`bc-work`='".$_POST['bc-work']."',`bc-use`='".$_POST['bc-use']."',`twitter-handle`='".$_POST['twitter-handle']."',`phone`='".$_POST['phone']."',`location`='".$_POST['location']."',`logo`='".$image."'");
				}
			}
			else if(isset($_POST['delete'])){
				
			}
		}
		
		
	}
	
	
	
	
}
}
else{
	?>
	<p>Please <a href = 'index.php?page=login'>login</a> as an employer to explore. 
	<p>Don't have an Employer Account yet. 	
	<p><a href = 'index.php?page=signup&stype=employer'>Create one now.</a></p>
	<?php
}
?>
</center>
