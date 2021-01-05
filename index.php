<?php 
session_start();
unset($_SESSION['load']);
unset($_SESSION['I']);
if(isset($_SESSION['quizInProgress']))
{
	unset($_SESSION['quizInProgress']);
    unset($_SESSION['answers']);
    unset($_SESSION['questions']);
	unset($_SESSION['quest_count']);
	if(isset($_SESSION['quest_add']))
    {
        unset($_SESSION['quest_add']);
    }
    if(isset($_SESSION['bad_quest']))
    {
        unset($_SESSION['bad_quest']);
	}
	unset($_SESSION['quiz_name']);
	if(isset($_SESSION['quiz']))
    {
        unset($_SESSION['quiz']);
	}
}







?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz Main Page</title>
</head>
<body>

	<?php include 'header.php';?>
		
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
	<?php if(isset($_SESSION['good_ADD'])) :?>			
		<div class="col-12 alert alert-success alert-dismissible fade show mt-0 mb-0" role="alert">
			<h4 class="text-center"><?=$_SESSION['good_ADD']?></h4>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php unset($_SESSION['good_ADD'])?>
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
	<?php if(isset($_SESSION['error_conn'])) :?>		
		<div class="col-12 alert alert-danger alert-dismissible fade show mt-0 mb-0" role="alert">
			<h4 class="text-center"><?=$_SESSION['error_conn']?></h4>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php unset($_SESSION['error_conn'])?>
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
			
			<form action="" method="post">
				<div class="card mt-1 mb-5">
					<div class="row mt-5">
						<div class="col-10 text-center mx-auto text-dark">
							<h2>Check one of our quizzes!</h2>		
						</div>
					</div>	
				
					<div class="card-body">
						<div class="row row-cols-2 mt-4">
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
								
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
						
							
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
								
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
						
							
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
							
							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title ">Quiz name</h2>
									</div>
								</div>
							</button>
													
						</div>							
					</div>	
				</div>
			</form>
		</div>		
	</div>
</div>
	
	
</body>
</html>