<?php 
session_start();

if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
try
{
    require_once "db_connect.php";
    $conn  = new mysqli($host,$db_user,$db_password,$db_name);
    if($conn->connect_errno!=0)
    {
        throw new exception(mysqli_connect_errno());
    }
    $id_u = $_SESSION['user_id'];
    $sql = "SELECT number_quiz FROM quiz_user WHERE id_user=?";
    $st_num = $conn->prepare($sql);
    $st_num->bind_param("i",$id_u);
    if(!$st_num->execute())
    {
        throw new Exception("st_num");
    }
    
    $r = $st_num->get_result();
    $w = $r->fetch_assoc();
    $number_quiz = $w['number_quiz'];
    $st_num->close();

    $tab_name = "namequiz_".$id_u;
    $sql_name = "SELECT * FROM $tab_name";
    $r = $conn->query($sql_name);
}
catch(Exception $e)
{

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Quizzes</title>
</head>
<body>
<?php include 'header.php';?>

<div class="container mt-5" >
		
		<div class="card">
			<h1 class="text-primary card-title text-center">My Quizzes</h1>				
		</div>						
		<?php if(isset($_SESSION['change_saved'])) :?>
				<div class="alert alert-success mt-4"><?=$_SESSION['change_saved']?></div>
				<?php unset($_SESSION['change_saved'])?>
		<?php endif;?>
		<?php if(isset($_SESSION['RAND'])) :?>
				<div class="alert alert-success mt-4">Your code is: <?=$_SESSION['RAND']?></div>
				<?php unset($_SESSION['RAND'])?>
		<?php endif;?>
		
		<form action="quizView.php"	method="POST">	
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					Quiz connot be restored after deleting!
					</div>
					<div class="modal-footer">
					<button type="submit" name="deleteQuiz" class="btn btn-danger">Delete this quiz</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					
					</div>
				</div>
				</div>
			</div>
			<div class="card mt-2 mb-5 ">	
				<div class="card-body ">
					<div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4  mx-auto">	
					<?php while($w = $r->fetch_assoc()) : ?>
								
							<div class="col mb-4">
								<div class="card text-white bg-secondary">
									<div class="col-12">
										<button type="button" id="<?=$w['id_quiz']?>" data-toggle="modal" data-target="#exampleModal" class="close col-1 mt-1 float-right text-right" aria-label="Close">
											<span class="text-danger" style="font-size:30px" aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="card-body">
										<div class="col-12 mb-3">
											<h4 class="text-center"><?=$w['name_quiz']?></h4>
										</div>
										<div class="row mb-1">	
											<button type="submit" class="col-5 btn btn-fix btn-outline-light mx-auto" name="quiz<?=$w['id_quiz']?>">
												Quiz View</button>
																		
											<button type="submit" class="col-5 btn btn-fix btn-outline-light mx-auto" name="startQuiz<?=$w['id_quiz']?>">
												Start Quiz</button>	
										</div>
						
									</div>
									<p class="text-center"><small><?php if($w['is_public'] == true) : ?>public<?php else :?>private<?php endif ;?></small></p>
									<div class="row mb-1">	
											<button type="submit" class="col-5 btn btn-fix btn-outline-light mx-auto" name="ACode<?=$w['id_quiz']?>">
												Create Acces Code</button>
										</div>
									
								</div>
							</div>
						<?php endwhile ; ?>
						
					</div>	
				</div>
			</div>			
		</form>	
	</div>
<?php $conn->close()?>
