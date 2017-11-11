<br><br><br>
<center>
<?php
include('header.php');
//Starting the session.
session_start();

//checking if the user has logged out.
if(isset($_GET['status']) and ((isset($_SESSION['employer']['username'])) or (isset($_SESSION['jobseeker']['username'])) )){
	if($_GET['status']=="logout"){
		if(isset($_SESSION['employer']['username'])){
			unset($_SESSION['employer']['username']);
		}
		if(isset($_SESSION['jobseeker']['username'])){
			unset($_SESSION['jobseeker']['username']);
		}
		
		
		echo 'You have succesfully logged out.';
	}
}



if(isset($_POST['username']) and isset($_POST['password'])){
	// Checking if the username/email and passwoed matches in any of the 2 databases namely employer-login and job-seeker-login.
		$query1 = mysqli_query($dbconnect , "Select * from `employer-login` where username='".$_POST['username']."' and password='".sha1($_POST['password'])."'");
		$query2 = mysqli_query($dbconnect , "Select * from `employer-login` where email='".$_POST['username']."' and password='".sha1($_POST['password'])."'");
		
		$query3 = mysqli_query($dbconnect , "Select * from `job-seeker-login` where `username`='".$_POST['username']."' and `password`='".sha1($_POST['password'])."'");
		$query4 = mysqli_query($dbconnect , "Select * from `job-seeker-login` where `email`='".$_POST['username']."' and `password`='".sha1($_POST['password'])."'");
		if((mysqli_num_rows($query1)>0) or (mysqli_num_rows($query2)>0)){
			
			echo "You have successfully logged in as an employer.";
		
			$_SESSION['employer']['username'] = $_POST['username'];
		}
		else if((mysqli_num_rows($query3)>0) or (mysqli_num_rows($query4)>0)){
			echo "You have successfully logged in as an jobseeker.";
		
			$_SESSION['jobseeker']['username'] = $_POST['username'];
		}
		else {
			echo "please try again.";
		}
		
	}


if(isset($_POST['empname'])){
		?><h3>Please login to your account to post a job.</h3><?php
		//mysqli_query($dbconnect , "INSERT INTO `first-table` (`c1`, `c2`, `c3`, `c4`, `c5`,`c6`) VALUES ('".mysqli_real_escape_string($dbconnect,$_POST['empname'])."', '".mysqli_real_escape_string($dbconnect,$_POST['empusername'])."', '".mysqli_real_escape_string($dbconnect,sha1($_POST['password']))."', '".mysqli_real_escape_string($dbconnect,$_POST['compname'])."', '".mysqli_real_escape_string($dbconnect,$_POST['companydesc'])."','".mysqli_real_escape_string($dbconnect , $_POST['contact'])."')"); 
		}

	//Checking if the user is logged in or not and displaying the login form accordingly.
		if((!isset($_SESSION['employer']['username'])) and (!isset($_SESSION['jobseeker']['username']))){
		?>	
	<h1>Log In form</h1>
	<br>
	<div class="card container">
		<form name = 'login' action = 'index.php?page=login' method='post'>
			User Name: <input name = 'username' type = 'text'/><br>
			Password: <input name = 'password' type = 'password'/><br>
			<input name  = 'submit' type = 'submit'/>
		</form>
		<p><a href = 'index.php?page=signup'>New to BlockMart?</a></p>
	</div>	
<?php
		}
	
	if((isset($_SESSION['employer']['username'])) or (isset($_SESSION['jobseeker']['username']))){
		if(isset($_SESSION['employer']['username'])){
			?><br>You are logged in as <?php echo"<strong>".($_SESSION['employer']['username'])."</strong>";
		}else if(isset($_SESSION['jobseeker']['username'])){
			?><br>You are logged in as <?php echo("<strong>".$_SESSION['jobseeker']['username']."</strong>");
		}
		?>
		<p><a href="index.php?page=login&status=logout">Logout</a></p>
		<?php
	}
?>		
</center>