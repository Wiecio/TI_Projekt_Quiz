<?php
session_start();
if(isset($_SESSION['flash']))
{
    unset($_SESSION['flash']);
    unset($_SESSION['loadf']);
    unset($_SESSION['tab_falsh']);
    unset($_SESSION['max']);
    unset($_SESSION['countf']);
}
if(isset($_SESSION['load']))
{
unset($_SESSION['quiz']);
unset($_SESSION['load']);
unset($_SESSION['I']);
unset($_SESSION['corrAns']);
unset($_SESSION['tab_q']);
unset($_SESSION['score']);
unset($_SESSION['tab_name']);
unset($_SESSION['load']);
unset($_SESSION['I']);
unset($_SESSION['corrAns']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz Code</title>
</head>
<body>

	<?php include 'header.php';?>
	<!--Zawartość -->
    <div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="mt-3 text-center">
		<h1>Insert Code</h1>		
	</div>
	<form action="goToFlashCode.php" method="post">
		<div class="mt-5 mx-auto">
			<div class="mb-3">
				<input type="text" id="flash_code" name="flash_code" placeholder="Flashcard Code" required class="form-control" />
			</div> 
				<?php if(isset($_SESSION['bad_code'])) : ?>
						<div class="alert alert-danger mt-3"><?=$_SESSION['bad_code']?></div>
						<?php unset($_SESSION['bad_code']) ?>
				<?php endif; ?>	
			<div>
				<button type="submit" class="btn btn-primary mb-2">Go to Flashcard</button>
			</div>
		</div>						
	</form>	
</div>
	
</body>
</html>