<?php
/* loading the image uploading file
			if(isset($_FILES['img'])){
				//path to store the uploaded image.
				$target = "img/".basename($_FILES['img']['name']);
				
				//Get all the submitted data form the form
				$images = $_FILES['img']['name'];
				$sql = "INSERT INTO `img` (`img`,`text`) VALUES ('".$images."','text')";
				mysqli_query($dbconnect , $sql); // stores the submitted data to the database.
				
				//Moving the uploaded images to the folder: img
				if(move_uploaded_file($_FILES['img']['tmp_name'],$target)){
					$msg = "You have suceessfully created an employer's account.";
				}else{
					$msg = "There was a problem in setting up your account.";
				}
			} */
			?>
<!-- form for the employer-->
			<div class="card container">
			<form name = 'signup_employer' action = 'index.php?page=signup' method='post'enctype = 'multipart/form-data'>
				Name*: <input name = 'name' type = 'text' required='required'/><br>
				Username*: <input name = 'username' type = 'text' required='required'/><br>
				Email*: <input name = 'email' type = 'text' required='required'/><br>
				Password*: <input name = 'password' type = 'password' required='required'/><br>
				Comnfirm Password*: <input name = 'password_conf' type = 'password' required='required'/><br>
				Website: <input name = 'website' type = 'text'/><br>
				Company name*: <input name = 'comp-name' type = 'text' required='required'/><br>
				Company Description*: <textarea type='text' name='comp-desc' rows="5" cols="40" style="text-align: justify;"></textarea><br>
				Work in Blockchain*: <textarea type='text' name='bc-work' rows="5" cols="40" style="text-align: justify;"></textarea><br>
				BlockChain use(drop)*: <textarea type='text' name='bc-work' rows="5" cols="40" style="text-align: justify;"></textarea><br>
				Twitter handle for promotion: <input name = 'twitter-handle' type = 'text'/><br>
				Phone*: <input name = 'phone' type = 'text' required='required'/><br>
				Location*: <input name = 'location' type = 'text' id='GooglePlace' required='required'/><br>
				Logo(png,jpeg allowed): <input name = 'img' type = 'file'/><br>
				<input type="checkbox" name="tou" value="tou" > 
				<a href = 'index.php?page=tou'>I agree to the terms of use</a><br>
				<input name = 'register_employer' value = 'register' type = 'submit'/><br>
				<p><a href = 'index.php?page=login'>Already have an account. </a></p>
			</form>
			</div>	
			<!--<button type = 'button' name = 'back'/>--> 