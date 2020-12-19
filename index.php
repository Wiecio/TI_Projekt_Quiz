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
		
		

<div class="container mt-5" ><!--style="margin-top:1.5em;"-->
	<div class="row">
		<div class="col-12 text-center">
			<div class="card">
				<h1 class="text-primary">Welcome to Quizzzzzz!</h1>	
				<h5 class="text-secondary">A great place to study</h5>
			</div>
			
			
			<div class="card mt-1 mb-5">
				<div class="row mt-3">
					<div class="col-10 text-center mx-auto text-success">
						<h2>Check one of the public quizzes!</h2>		
					</div>
				</div>	
			
				<div class="card-body">
					<div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 mx-auto col-md-8">
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
							
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
							<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
					
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
							<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
					
						
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
							<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
					
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-primary mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
					
						
							<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>
						
						<a class="btn btn-fix text-left" onClick="">		
							<div class="card text-white bg-danger mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title">Quiz name</h5>
								</div>
							</div>
						</a>							
					</div>							
				</div>	
			</div>			
		</div>		
	</div>
</div>
	
</body>
</html>