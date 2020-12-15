<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz Main Page</title>
</head>
<body>

	<?php include 'header.php';?>
	<!--Zawartość -->
	
<div class="container" style="margin-top:1.5em;">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Welcome to Quizzzzzz!</h1>		
		</div>
		<?php if(isset($_SESSION['log_in_info'])) :?>
							<div><?=$_SESSION['log_in_info']?> </div>
		<?php unset($_SESSION['log_in_info'])?>
		<?php endif; ?>
		<?php if(isset($_SESSION['logout'])) :?>
							<div><?=$_SESSION['logout']?> </div>
		<?php unset($_SESSION['logout'])?>
		<?php endif; ?>
	</div>
</div>
	
</body>
</html>