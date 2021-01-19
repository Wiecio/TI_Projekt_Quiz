<?php 
session_start();
unset($_SESSION['loadf']);
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
if(isset($_SESSION['flash']))
{
    unset($_SESSION['flash']);
    unset($_SESSION['loadf']);
    unset($_SESSION['tab_falsh']);
    unset($_SESSION['max']);
    unset($_SESSION['countf']);
}

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
	
}
if(isset($_SESSION['quiz']))
{
	unset($_SESSION['quiz']);
}
if(isset($_SESSION['flash_progres']))
{
	unset($_SESSION['flash_name']);
	unset($_SESSION['flash_count']);
	unset($_SESSION['tab_flash']);
}
require_once "db_connect.php";
try
{
		$conn  = new mysqli($host,$db_user,$db_password,$db_name);
		if($conn->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		$sql = "SELECT * FROM nquiz";
		$r = $conn->query($sql);

}
catch(Exception $e)
{

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
			
			<form action="quiz.php" method="post">
				<div class="card mt-2 mb-5">
					<div class="row mt-5">
						<div class="col-10 text-center mx-auto text-dark">
							<h2>Check one of our quizzes!</h2>		
						</div>
					</div>	
				
					<div class="card-body">
						<div class="row row-cols-1 row-cols-sm-2 mt-4">
						<?php while($w = $r->fetch_assoc()) :?>

							<button style="height: 300px;" class="btn btn-fix text-left" onClick="" type="submit" name="q<?=$w['id_quiz']?>">		
								<div style="height: 100%;" class="card d-flex text-white bg-success mb-3 float-center">
									<div class="card-body align-items-center d-flex justify-content-center">
										<h2 class="card-title "><?=$w['name_quiz']?></h2>
									</div>
								</div>
							</button>

						<?php endwhile ;?>						
						</div>							
					</div>	
				</div>
			</form>
		</div>		
	</div>
</div>
	
<?php $conn->close();?>
</body>
</html>