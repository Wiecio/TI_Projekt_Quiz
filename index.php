<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz Main Page</title>
<link rel="stylesheet" href="styles/basic_style.css">
</head>
<body>

	<?php include 'header.php';?>
	<!--Zawartość -->
	
<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="row">
		<!-- Info o zalogowaniu albo wylogowaniu -->
				<?php if(isset($_SESSION['log_in_info'])) :?>
						<div class="log_in_out_alert"><?=$_SESSION['log_in_info']?> </div>
						<?php unset($_SESSION['log_in_info'])?>
				<?php endif; ?>
				<?php if(isset($_SESSION['logout'])) :?>
						<div class="log_in_out_alert"><?=$_SESSION['logout']?> </div>
						<?php unset($_SESSION['logout'])?>
				<?php endif; ?>
		<!-- Koniec sekcji info -->
		<div class="col-12 text-center" style="margin-top: 10px">
			<h1>Welcome to Quizzzzzz!</h1>		
		</div>
		
	
	</div>
</div>
	
</body>
</html>