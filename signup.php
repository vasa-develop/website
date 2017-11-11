<br><br><br>
<center>
<!--<head>
	<script type="text/javascript">
		window.location.replace('index.php?page=signup');
	</script>
</head>	-->
<?php
include('header.php');
session_start();

	if(!isset($_SESSION['employer']['username'])){
?>
	<h3>Sign Up</h3>
	<br>
	<?php
		if((!isset($_GET['stype'])) or ((!isset($_SESSION['jobseeker']['username'])) and (!isset($_SESSION['employer']['username'])) and (!isset($_POST['tou'])) and ($_POST['tou']) and ($_POST['password']==$_POST['password_conf']))){
			?>
			<!-- selecting the type of signup -->
			<p><a href = 'index.php?page=signup&stype=employer'> Sign up as employer </a></p>
			<p><a href = 'index.php?page=signup&stype=jobseeker'> Sign up as jobseeker </a></p>
			
			<?php
		}
		
	
		if(isset($_POST['register_employer'])){
			if($_POST['password']===$_POST['password_conf']){
				if($_POST['tou']){
			// Inserting the employer info into the database.
			
			//Uploading the  logo to the employer-login database.
			$image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
			
			mysqli_query($dbconnect , "INSERT INTO `employer-login` (`name`, `username`, `email`, `password`, `comp-name`, `website`, `comp-desc`, `bc-work`, `bc-use`, `twitter-handle`, `phone`, `location`,`logo`, `no-jobs-offered`, `c3`) VALUES ('".mysqli_real_escape_string($dbconnect,$_POST['name'])."', '".mysqli_real_escape_string($dbconnect,$_POST['username'])."', '".mysqli_real_escape_string($dbconnect,($_POST['email']))."', '".mysqli_real_escape_string($dbconnect,sha1($_POST['password']))."', '".mysqli_real_escape_string($dbconnect,$_POST['comp-name'])."','".mysqli_real_escape_string($dbconnect , $_POST['website'])."', '".mysqli_real_escape_string($dbconnect,$_POST['comp-desc'])."', '".mysqli_real_escape_string($dbconnect,$_POST['bc-work'])."', '".mysqli_real_escape_string($dbconnect,$_POST['bc-use'])."', '".mysqli_real_escape_string($dbconnect,$_POST['twitter-handle'])."', '".mysqli_real_escape_string($dbconnect,$_POST['phone'])."', '".mysqli_real_escape_string($dbconnect,$_POST['location'])."','".mysqli_real_escape_string($dbconnect, $image)."',0,'c')");
				
				
				//mysqli_query($dbconnect , "INSERT INTO `employer-login`(`logo`) VALUES ('".$image."')");
				
				//Uploading the logo to /img folder.
				include ('upload_logo.php');

				
				//Displaying the inserted image.
				$query = mysqli_query($dbconnect , "Select * from `employer-login`");
				
				while($q = mysqli_fetch_array($query)){
					
					//header("Content-type: image/png"); 
					echo '<img src="data:image/png;base64,'.base64_encode($q['logo']).'" />';
					
					 //Render image
			        
			        //echo $q['logo']; 
					//echo '<tr><td><img src="data:image/png;base64, '.$q['logo'].'" /></td></tr>';

					}
					
				
			
	
			
			?>
			<p>You have successfully created an account.</p>
			<p>You can proceed to <a href = 'index.php?page=login'> login </a> page for better experience.
			
			<?php
				}
				else{
					echo '<p><font color="red"><strong>Please accept the Terms of use to proceed.</strong></font></p>';
					include('employer-signup-form.php');
					}
		
			}
			else{
				//Reload the form if password and confirm donot match.
				?>
				The passwords entered are not identical. PLease enter the passwords again.
				<?php
				include('employer-signup-form.php');
			}
		}
		else if(isset($_POST['register_jobseeker'])){
			if($_POST['password']===$_POST['password_conf']){
				if($_POST['tou']){
			//Inserting the jobseeker info into the database.
			$space_string = ' ';
			
			
			// Perform a query, check for error
			
			 
			mysqli_query($dbconnect , "INSERT INTO `job-seeker-login`(`name`, `username`, `email`, `password`, `jobs-applied`) VALUES ('".mysqli_real_escape_string($dbconnect,$_POST['name'])."', '".mysqli_real_escape_string($dbconnect,$_POST['username'])."', '".mysqli_real_escape_string($dbconnect,($_POST['email']))."', '".mysqli_real_escape_string($dbconnect,sha1($_POST['password']))."', ' ')");
			
			?>
			<p>You have successfully created an account.</p>
			<p>You can proceed to <a href = 'index.php?page=login'> login </a> page for better experience.
			<?php
				}
				else{
					echo '<p><font color="red"><strong>Please accept the Terms of use to proceed.</strong></font></p>';
					include('jobseeker-signup-form.php');
					}

			}
			else{
				//Reload the form if password and confirm donot match.
				?>
				The passwords entered are not identical. PLease enter the passwords again.
				<?php
				include('jobseeker-signup-form.php');
			}
		}
		
		else if(isset($_GET['stype'])){
			if($_GET['stype']=='employer'){
				
			//including the employer signup form.
			include('employer-signup-form.php');
			}
			else if($_GET['stype']=='jobseeker')
			{
				//including the jobseeker signup form.
				include('jobseeker-signup-form.php');
			
			}
		}
	?>
	
	
	
	
		
	<?php	}
	// message 
if((isset($_SESSION['employer']['username'])) or (isset($_SESSION['jobseeker']['username']))){
	?>
	<p><a href = "index.php?page=login"> In order to sign up, you must log out first </a></p>
	<?php
}	?>
<center>
