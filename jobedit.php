<form name = 'jobedit' method = 'post' action = 'index.php?page=account&sec=posting'>
	<?php
		include('jobform.php');
	?>	
</form>
<?php
	$_SESSION['employer']['jobId'] = $_GET['jobId'];
?>	