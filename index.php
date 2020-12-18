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
	
	
		
	<!-- Info o zalogowaniu albo wylogowaniu -->
	<div class="row">	
	<?php if(isset($_SESSION['log_in_info'])) :?>			
		<div class="col-12 alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">
			<h4 class="text-center"><?=$_SESSION['log_in_info']?></h4>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php unset($_SESSION['log_in_info'])?>
	<?php endif; ?>
	
	<?php if(isset($_SESSION['logout'])) :?>		
		<div class="col-12 alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">
			<h4 class="text-center"><?=$_SESSION['logout']?></h4>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php unset($_SESSION['logout'])?>
	<?php endif; ?>
	
	</div>
	<!-- Koniec sekcji info -->
		
		

<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="row">
		<div class="col-12 text-center" style="margin-top: 10px">
			<h1>Welcome to Quizzzzzz!</h1>		
		</div>
		
	
	</div>
</div>
	
</body>
</html>