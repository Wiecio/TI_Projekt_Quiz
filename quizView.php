<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz View</title>
</head>
<body>
<?php include 'header.php';?>
	
	
	
<div class="container mt-5" >
	<div class="row">
		<div class="col-12 text-center">
			<div class="card">
				<h1 class="text-primary">Quiz name quiz view</h1>	
				<div class="mb-3 custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="is_public" name="is_public" checked>
					<label class="custom-control-label" for="is_public">This quiz is public</label>
				</div>		
			</div>						
			<div class="card mt-2 mb-5 ">								
				<div class="card-body ">
					<div class="row col-12">		
						<div class="mx-auto">
							<form action="" method="post">	
								
								<ul class="list-group list-group-flush ">
						
									<h2 class="list-group-item text-primary mt-3">Pytanie 1</h2>
									<h3 class="text-success mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
								
									
									<h2 class="list-group-item text-primary mt-3">Pytanie 2</h2>
									<h3 class="text-secondary mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-success mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
									
									
									<h2 class="list-group-item text-primary mt-3">Pytanie 3</h2>
									<h3 class="text-secondary mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-success mx-auto">D. Treść odpowiedzi D</h3>
									
									
									<h2 class="list-group-item text-primary mt-3">Pytanie 4</h2>
									<h3 class="text-success mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
								  
								 
								</ul>
								
								<div class="form-div row mt-5">
									<button type="submit" class="btn btn-lg btn-primary col-12">Save</button>
								</div>
								
							</form>	
						</div>
																																			
					</div>							
				</div>	
			</div>			
		</div>		
	</div>
</div>
	
	
	
	
</body>
</html>