<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz summary</title>
</head>
<body>

	<?php include 'header.php';?>
	

<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="row mt-5">
		<div class="col-12 text-center text-primary">
			<h1>You completed "Nazwa quizu" quiz!</h1>		
		</div>
		
		
	</div>
	
	<div class="row">
		<div class="col text-center text-success">
			<h5>You scored 5/10 correct answers!</h5>	
		</div>
	
	</div>
	
	<div class="row mt-5">
		<h3 class="text-primary text-right mt-2 col-6">Start again</h3>
		<button id="restart_btn" type="button" class="btn btn-primary float-right col-1">
			<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
				<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
			</svg>           
		</button>	
	</div>
</div>
	
</body>
</html>