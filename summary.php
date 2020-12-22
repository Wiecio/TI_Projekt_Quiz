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
	<form>
		<div class="card mt-2 mb-5">								
			<div class="card-body">
				<div class="row col-12 mx-auto">		
					<div class="mx-auto">
						<ul class="list-group list-group-flush ">
				
			
							<h2 class="list-group-item text-primary mt-3 text-center">Pytanie 1</h2>
							<h3 class="text-success mx-auto">A. Treść odpowiedzi A</h3>
							<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
							<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
							<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
						
							
							<h2 class="list-group-item text-primary mt-3 text-center">Pytanie 2</h2>
							<h3 class="text-danger mx-auto">A. Treść odpowiedzi A</h3>
							<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
							<h3 class="text-success mx-auto">C. Treść odpowiedzi C</h3>
							<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
							
							
							<h2 class="list-group-item text-primary mt-3 text-center">Pytanie 3</h2>
							<h3 class="text-secondary mx-auto">A. Treść odpowiedzi A</h3>
							<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
							<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
							<h3 class="text-success mx-auto">D. Treść odpowiedzi D</h3>
							
							
							<h2 class="list-group-item text-primary mt-3 text-center">Pytanie 4</h2>
							<h3 class="text-success mx-auto">A. Treść odpowiedzi A</h3>
							<h3 class="text-danger mx-auto">B. Treść odpowiedzi B</h3>
							<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
							<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
						  						 
						</ul>						
					</div>																																	
				</div>							
			</div>	
		</div>		
		
		<div class="row mt-5 col-4 mx-auto">
			<div class="col-12">
				<button id="restart_btn" type="submit" class="float-right col-12 btn btn-primary btn-fix  mb-5">
					<svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
						<path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
					</svg>           
				</button>		
			</div>			
		</div>
	</form>
</div>
	
</body>
</html>