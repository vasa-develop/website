<!doctype html>
<?php


?>

<html class="no-js" lang="">
  <?php
	include('header.php');
	session_start();
  ?>
  <body>
  	

<div class="container search" >
	<br>
	    <div class="form-group">
		<div class="quick-search__frontpage">
        
	<div class="quick-search__wrapper well">
		<form action="index.php?page=jobs" class="form-inline row" method = 'post' name = 'filter'>
			
			<div class="form-group form-group__input ">
				<input type="text" value="" class="form-control form-control__centered" name="keywords" id="keywords" placeholder="keywords" />
			</div>
							<div class="form-group form-group__input">
					<input type="text" name="location" id="GooglePlace" class="form-control form-control__google-location" value="" placeholder="Location"/>
<input type="hidden" name="GooglePlace[location][radius]" value="50" id="radius" class="hidden-radius"/>

				</div>
									<div class="form-group form-group__btn">
				<button type="submit" class="quick-search__find btn btn__orange btn__bold " name = 'search'>Find Jobs</button>
			</div>
		</form>
	</div>

    </div>
		</div>
	</div>

	
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3">
				<strong>Refine by Job Title Category:</strong>
				<ul>
					<li><a href = 'index.php?page=jobs&cat=Application'>Application Support | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Software'>Software Architect | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Analyst'>Business Analyst | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Business Development'>Business Development | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Compliance'>Compliance | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Consultant'>Consultant | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Cryptography'>Cryptography | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=CTO/Head'>CTO/Head Of IT | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=CXO'>CXO | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Data'>Data Scientist | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Database'>Database Developer, Engineer and Administrator | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Developer/Engineer'>Developer/Engineer | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Front'>Developer/Engineer Front End | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Smart'>Developer/Engineer Smart Contract | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Development Manager'>Development Manager | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=DevOps'>DevOps | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Graduate'>Graduate | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Growth'>Growth Hacker | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=ICO'>ICO | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Innovation'>Innovation | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Intern'>Intern | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Legal'>Legal | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Manager-Financial'>Manager-Financial Services | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Manager-Technology'>Manager-Technology | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Marketing'>Marketing | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Operations'>Operations | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Product'>Product Management | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Project/Programme'>Project/Programme Manager | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Security'>Security Specialist | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Recruiter'>Recruiter | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Risk'>Risk (Credit/Market) | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=UX'>UX Designer | Blockchain</a></li>
					<li><a href = 'index.php?page=jobs&cat=Other'>Other | Blockchain</a></li>
				</ul>
				<br><br>
				<?php 
				//Fetching unique locations
				$locations = mysqli_query($dbconnect , "SELECT distinct `location` from `jobs`");
				$loc_list = mysqli_fetch_assoc($locations);
				
				?>
				
				
				<strong>Refine by Location:</strong>
				<ul>
				<?php
				//looping through all possible locations.
				do{
					?><li><a href = "index.php?page=jobs&location=<?php echo $loc_list['location']; ?>"><?php echo $loc_list['location']; ?></a></li><?php
				}while($loc_list = mysqli_fetch_assoc($locations));
				?>
				</ul>
			</div>
			<script>
			
			</script>
			<?php
			
					if(isset($_POST['search'])){
						$_GET['cat'] = $_POST['keywords'];
						$_GET['location'] = $_POST['location'];	
						
					}
					
					if((isset($_SESSION['jobseeker']['username']))){
						//filtering out according to the category choosen.
						if((!isset($_GET['cat'])) and (!isset($_GET['location']))){
						$query = mysqli_query($dbconnect , "Select * from `jobs`");
						$jobs = mysqli_fetch_assoc($query);
						}
						else if ((isset($_GET['cat'])) and (isset($_POST['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where (`job-type-cat` like '%".$_GET['cat']."%' or `job-title` like '%".$_GET['cat']."%' or `comp-name` like '".$_GET['cat']."' or `job-type` like '%".$_GET['cat']."%') and `location` like '%".$_GET['location']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}
						else if ((isset($_GET['cat'])) and (!isset($_POST['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where `job-type-cat` like '%".$_GET['cat']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}
						else if (!(isset($_GET['cat'])) and (isset($_GET['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where `location` like '%".$_GET['location']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}

						
						do{
							//Checking of the current job in the loop has been applied by the jobseeker or not.
							

							date_default_timezone_set('Asia/Kolkata');

						    // Then call the date functions
						    $date = date('Y-m-d');
						   
						    if($jobs['exp-date']>$date){
						    
						    	
							
							$rows = mysqli_query($dbconnect , "SELECT `job-id` from `applications` where `username`='".$_SESSION['jobseeker']['username']."' and `job-id`='".$jobs['job-id']."'");
							
							//If the jobseeker has applied for the job, remove it from the list.
							if((!mysqli_num_rows($rows)>0) and (mysqli_num_rows($query)) ){
								
								?>
								<div class="col-xs-9 col-sm-9" >
									<div class="card container" style="color:#c8fff1">
										<div class="row">
											<div class="col-xs-3 col-sm-3">
												<!-- company logo -->
												<?php
												$logo = mysqli_query($dbconnect , "Select `logo` from `employer-login` where `username`='".$jobs['username']."'");
												$comp_logo = mysqli_fetch_assoc($logo);
												echo('<img src="data:image/png;base64,'.base64_encode($comp_logo['logo']).'" height="100" width="100"/>');

												?>
											</div>
											<div class="col-xs-9 col-sm-9">
												<div class="row">
													<div class="col-xs-6 col-sm-6">
														<div>
															<a href="#"> <?php echo ($jobs['job-title']); ?></a> <!-- POST -->
															<br>(<?php echo($jobs['job-type-cat']); ?>)
													
														</div>
														<div>
															<span>
																<i class="fa fa-camera-retro fa-lg"></i> 
																<?php echo ($jobs['comp-name']); ?>  <!-- Company name -->
															</span>
															<br/>
															<span>
																<i class="fa fa-map-marker fa-lg"></i> 
																&nbsp;<?php echo ($jobs['location']); ?>  <!-- Job location -->
															</span>
															
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<div class="date">
															<?php echo ($jobs['exp-date']); ?>  <!-- Expiration date -->
														</div>
														<div class="tag">
															<?php echo ($jobs['job-type']); ?>   <!-- Job type -->
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="description">
													<?php echo ($jobs['job-desc']); ?>    <!-- Job description -->
												</div>	
												<div>
													<a href = 'index.php?page=apply&job_id=<?php echo($jobs['job-id']); ?>'>Apply</a>
												</div>
					
											</div>
										</div>
									</div>
								</div>
								
								
								<?php
								
							}
							else{
								continue;
							}
						}
						}while($jobs = mysqli_fetch_assoc($query));
					}

					else if(isset($_SESSION['employer']['username'])){
						$query = mysqli_query($dbconnect , "Select * from `jobs`");
						$jobs = mysqli_fetch_assoc($query);
						
						//filtering out according to the category choosen.
						if(!isset($_GET['cat'])){
						$query = mysqli_query($dbconnect , "Select * from `jobs`");
						$jobs = mysqli_fetch_assoc($query);
						}
						else if (isset($_GET['cat'])){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where `job-type-cat` like '%".$_GET['cat']."%'");
							$jobs = mysqli_fetch_assoc($query);
						}
						
						
						//filtering out according to the category choosen.
						if((!isset($_GET['cat'])) and (!isset($_GET['location']))){
						$query = mysqli_query($dbconnect , "Select * from `jobs`");
						$jobs = mysqli_fetch_assoc($query);
						}
						else if ((isset($_GET['cat'])) and (isset($_POST['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where (`job-type-cat` like '%".$_GET['cat']."%' or `job-title` like '%".$_GET['cat']."%' or `comp-name` like '".$_GET['cat']."' or `job-type` like '%".$_GET['cat']."%') and `location` like '%".$_GET['location']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}
						else if ((isset($_GET['cat'])) and (!isset($_POST['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where `job-type-cat` like '%".$_GET['cat']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}else if (!(isset($_GET['cat'])) and (isset($_GET['location']))){
							$query = mysqli_query($dbconnect , "Select * from `jobs` where `location` like '%".$_GET['location']."%' ");
							$jobs = mysqli_fetch_assoc($query);
						}
						
						
						do{	
							date_default_timezone_set('Asia/Kolkata');

						    // Then call the date functions
						    $date = date('Y-m-d');
						    
						    if($jobs['exp-date']>$date){


							if(mysqli_num_rows($query)){
							?>
								<div class="col-xs-9 col-sm-9">
									<div class="card container">
										<div class="row">
											<div class="col-xs-3 col-sm-3">
												<!-- company logo -->
												<?php
												$logo = mysqli_query($dbconnect , "Select `logo` from `employer-login` where `username`='".$jobs['username']."'");
												$logo = mysqli_fetch_assoc($logo);
												echo('<img src="data:image/jpg;base64,'.base64_encode($logo['logo']).'" height="100" width="100"/>');
												?>
											</div>
											<div class="col-xs-9 col-sm-9">
												<div class="row">
													<div class="col-xs-6 col-sm-6">
														<div>
															<a href="#"> <?php echo $jobs['job-title'] ?> <!-- POST --></a>
															<br>(<?php echo($jobs['job-type-cat']); ?>)
														</div>
														<div>
															<span>
																<i class="fa fa-camera-retro fa-lg"></i> 
																<?php echo $jobs['comp-name'] ?>  <!-- Company name -->
															</span>
															<br/>
															<span>
																<i class="fa fa-map-marker fa-lg"></i> 
																&nbsp;<?php echo $jobs['location'] ?>  <!-- Job location -->
															</span>
															
														</div>
													</div>
													<div class="col-xs-6 col-sm-6">
														<div class="date">
															<?php echo $jobs['exp-date'] ?>  <!-- Expiration date -->
														</div>
														<div class="tag">
															<?php echo $jobs['job-type'] ?>   <!-- Job type -->
														</div>
													</div>
												</div>
												<br/><br/>
												<div class="description">
													<?php echo $jobs['job-desc'] ?>    <!-- Job description -->
												</div>
												<div>
													<a href = 'index.php?page=apply&job_id=<?php echo($jobs['job-id']); ?>'>Apply</a>
												</div>		
											</div>
										</div>
									</div>
								</div>
							
							
							<?php
							}
							}
						}while($jobs = mysqli_fetch_assoc($query));
					}

					else if((!isset($_SESSION['employer']['username'])) and (!isset($_SESSION['jobseeker']['username']))){
						?>
						<p>Please <a href = 'index.php?page=login' >login</a> to explore.</p>
						<?php
					}
			?>
			
			
		</div>
	
	</div>

		
	
  </body>
</html>
