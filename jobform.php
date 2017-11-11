<?php
//RETRIEVING THE CURRENT DATA
$jobs = mysqli_query($dbconnect , "Select * from `jobs` where `job-id`='".$_GET['jobId']."'"); 
$jobs = mysqli_fetch_assoc($jobs);
if(isset($_GET['request'])){
?>
			<p>Job title*: <input type = 'text'  name = 'jobtitle' value = <?php echo("'".$jobs['job-title']."'"); ?> required='required'/></p>
			<p>Job description*: <input type = 'text'  name = 'jobdesc' value = <?php echo("'".$jobs['job-desc']."'"); ?> required='required'/></p>
			<p>Desired job type(drop)*:   <select name="jobtype" value = <?php echo("'".$jobs['job-type']."'"); ?>>
										  <option value="permanent">Permanent</option>
										  <option value="internship">Internship</option>
										  <option value="contractor">Contractor</option>
										  <option value="remote">Remote</option>
										</select> </p>
			<p>Job title Category(drop)*:  <select name="jobcat" value = <?php echo("'".$jobs['job-type-cat']."'"); ?>>
										 
			<option value = 'Application Support | Blockchain'>Application Support | Blockchain</option>
			<option value = 'Software Architect | Blockchain'>Software Architect | Blockchain</option>
			<option value = 'Business Analyst | Blockchain'>Business Analyst | Blockchain</option>
			<option value = 'Business Development | Blockchain'>Business Development | Blockchain</option>
			<option value = 'Compliance | Blockchain'>Compliance | Blockchain</option>
			<option value = 'Consultant | Blockchain'>Consultant | Blockchain</option>
			<option value = 'Cryptography | Blockchain'>Cryptography | Blockchain</option>
			<option value = 'CTO/Head Of IT | Blockchain'>CTO/Head Of IT | Blockchain</option>
			<option value = 'CXO | Blockchain'>CXO | Blockchain</option>
			<option value = 'Data Scientist | Blockchain'>Data Scientist | Blockchain</option>
			<option value = 'Database Developer, Engineer and Administrator | Blockchain'>Database Developer, Engineer and Administrator | Blockchain</option>
			<option value = 'Developer/Engineer | Blockchain'>Developer/Engineer | Blockchain</option>
			<option value = 'Developer/Engineer Front End | Blockchain'>Developer/Engineer Front End | Blockchain</option>
			<option value = 'Developer/Engineer Smart Contract | Blockchain'>Developer/Engineer Smart Contract | Blockchain</option>
			<option value = 'Development Manager | Blockchain'>Development Manager | Blockchain</option>
			<option value = 'DevOps | Blockchain'>DevOps | Blockchain</option>
			<option value = 'Graduate | Blockchain'>Graduate | Blockchain</option>
			<option value = 'Growth Hacker | Blockchain'>Growth Hacker | Blockchain</option>
			<option value = 'ICO | Blockchain'>ICO | Blockchain</option>
			<option value = 'Innovation | Blockchain'>Innovation | Blockchain</option>
			<option value = 'Intern | Blockchain'>Intern | Blockchain</option>
			<option value = 'Legal | Blockchain'>Legal | Blockchain</option>
			<option value = 'Manager-Financial Services | Blockchain'>Manager-Financial Services | Blockchain</option>
			<option value = 'Manager-Technology | Blockchain'>Manager-Technology | Blockchain</option>
			<option value = 'Marketing | Blockchain'>Marketing | Blockchain</option>
			<option value = 'Operations | Blockchain'>Operations | Blockchain</option>
			<option value = 'Product Management | Blockchain'>Product Management | Blockchain</option>
			<option value = 'Project/Programme Manager | Blockchain'>Project/Programme Manager | Blockchain</option>
			<option value = 'Security Specialist | Blockchain'>Security Specialist | Blockchain</option>
			<option value = 'Recruiter | Blockchain'>Recruiter | Blockchain</option>
			<option value = 'Risk (Credit/Market) | Blockchain'>Risk (Credit/Market) | Blockchain</option>
			<option value = 'UX Designer | Blockchain'>UX Designer | Blockchain</option>
			<option value = 'Other | Blockchain'>Other | Blockchain</option>
										</select> </p>
			<p>Preffered location: <input type = 'text' id='GooglePlace' name = 'location' value = <?php echo("'".$jobs['location']."'"); ?> required='required'/></p>
			<p>Expiration date(put calander)*: 
				<input type="date" id="datepicker" name = 'exp-date'  value = <?php echo("'".$jobs['exp-date']."'"); ?> required='required'/></p>
			<p>Pay rate: <input type = 'text'  name = 'pay' value = <?php echo("'".$jobs['pay']."'"); ?>/></p>
			<p>Contact*: <input type = 'text'  name = 'contact' value = <?php echo("'".$jobs['contact']."'"); ?> required='required'/></p>			
			<p><input type = 'submit'  name = 'editbutton' value = 'Edit Job Post' /></p>
		<?php
}
else{
	?>
			<p>Job title*: <input type = 'text'  name = 'jobtitle' required='required'/></p>
			<p>Job description*: <input type = 'text'  name = 'jobdesc' required='required'/></p>
			<p>Desired job type(drop)*:   <select name="jobtype">
										  <option value="permanent">Permanent</option>
										  <option value="internship">Internship</option>
										  <option value="contractor">Contractor</option>
										  <option value="remote">Remote</option>
										</select> </p>
			<p>Job title Category(drop)*:  <select name="jobcat">
										 
			<option value = 'Application Support | Blockchain'>Application Support | Blockchain</option>
			<option value = 'Software Architect | Blockchain'>Software Architect | Blockchain</option>
			<option value = 'Business Analyst | Blockchain'>Business Analyst | Blockchain</option>
			<option value = 'Business Development | Blockchain'>Business Development | Blockchain</option>
			<option value = 'Compliance | Blockchain'>Compliance | Blockchain</option>
			<option value = 'Consultant | Blockchain'>Consultant | Blockchain</option>
			<option value = 'Cryptography | Blockchain'>Cryptography | Blockchain</option>
			<option value = 'CTO/Head Of IT | Blockchain'>CTO/Head Of IT | Blockchain</option>
			<option value = 'CXO | Blockchain'>CXO | Blockchain</option>
			<option value = 'Data Scientist | Blockchain'>Data Scientist | Blockchain</option>
			<option value = 'Database Developer, Engineer and Administrator | Blockchain'>Database Developer, Engineer and Administrator | Blockchain</option>
			<option value = 'Developer/Engineer | Blockchain'>Developer/Engineer | Blockchain</option>
			<option value = 'Developer/Engineer Front End | Blockchain'>Developer/Engineer Front End | Blockchain</option>
			<option value = 'Developer/Engineer Smart Contract | Blockchain'>Developer/Engineer Smart Contract | Blockchain</option>
			<option value = 'Development Manager | Blockchain'>Development Manager | Blockchain</option>
			<option value = 'DevOps | Blockchain'>DevOps | Blockchain</option>
			<option value = 'Graduate | Blockchain'>Graduate | Blockchain</option>
			<option value = 'Growth Hacker | Blockchain'>Growth Hacker | Blockchain</option>
			<option value = 'ICO | Blockchain'>ICO | Blockchain</option>
			<option value = 'Innovation | Blockchain'>Innovation | Blockchain</option>
			<option value = 'Intern | Blockchain'>Intern | Blockchain</option>
			<option value = 'Legal | Blockchain'>Legal | Blockchain</option>
			<option value = 'Manager-Financial Services | Blockchain'>Manager-Financial Services | Blockchain</option>
			<option value = 'Manager-Technology | Blockchain'>Manager-Technology | Blockchain</option>
			<option value = 'Marketing | Blockchain'>Marketing | Blockchain</option>
			<option value = 'Operations | Blockchain'>Operations | Blockchain</option>
			<option value = 'Product Management | Blockchain'>Product Management | Blockchain</option>
			<option value = 'Project/Programme Manager | Blockchain'>Project/Programme Manager | Blockchain</option>
			<option value = 'Security Specialist | Blockchain'>Security Specialist | Blockchain</option>
			<option value = 'Recruiter | Blockchain'>Recruiter | Blockchain</option>
			<option value = 'Risk (Credit/Market) | Blockchain'>Risk (Credit/Market) | Blockchain</option>
			<option value = 'UX Designer | Blockchain'>UX Designer | Blockchain</option>
			<option value = 'Other | Blockchain'>Other | Blockchain</option>
										</select> </p>
			<p>Preffered location: <input type = 'text' id='GooglePlace' name = 'location'/></p>
			<p>Expiration date(put calander)*: 
				<input type="date" id="datepicker" name = 'exp-date' value="2011-01-13" required='required'/></p>
			<p>Pay rate: <input type = 'text'  name = 'pay'/></p>		
			<p>Contact*: <input type = 'text'  name = 'contact' value = <?php echo("'".$jobs['contact']."'"); ?> required='required'/></p>	
			<p><input type = 'submit'  name = 'submit' value = 'Post Job'/></p>
			<?php
}

		?>
