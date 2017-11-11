<!-- form for the jobseeker-->
			<div class="card container">
			<form name = 'signup_jobseeker' action = 'index.php?page=signup' method='post'>
				Name*: <input name = 'name' type = 'text'/ required='required'><br>
				Username*: <input name = 'username' type = 'text' required='required'/><br>
				Email*: <input name = 'email' type = 'text' required='required'/><br>
				Password*: <input name = 'password' type = 'password' required='required'/><br>
				Comnfirm Password*: <input name = 'password_conf' type = 'password' required='required'/><br>
				<input type="checkbox" name="tou" value="tou">
				<a href = 'index.php?page=tou'>I agree to the terms of use</a><br>
				<input name = 'register_jobseeker' value = 'register' type = 'submit'/><br>
				<p><a href = 'index.php?page=login'>Already have an account. </a></p>
			</form>
			</div>	