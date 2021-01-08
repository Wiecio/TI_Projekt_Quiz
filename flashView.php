<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['flash'] = key($_POST);
	$check = mb_substr($_SESSION['flash'], 0, 1, 'UTF-8');
	if($check == "s")
	{
		header("Location: flashcard.php");
		exit();
	}
	else if($check == "d")
	{
		header("Location: deleteQuiz.php");
		exit();
	}
	elseif($check =="A")
	{
		$_SESSION['codef'] = true;
		header("Location: createCodeF.php");
		exit();
	}
	else if($check == "f")
	{
		try
		{
			require_once "db_connect.php";
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new exception(mysqli_connect_errno());
			}
			$tab_name = $_SESSION['flash']."_".$_SESSION['user_id'];
			$sql = "SELECT * FROM $tab_name";
			$r = $conn->query($sql);
			$tab = array(" ","A","B","C","D");

		}
		catch(Exception $e)
		{

		}
	}
	
}
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
<form action="saveStatQuiz.php" method="post">
							<input type="checkbox" class="custom-control-input" id="is_public" name="is_public" checked>
							<label class="custom-control-label" for="is_public">This flashcards are public</label>
						</div>
					
			</div>						
			<div class="card mt-2 mb-5 ">								
				<div class="card-body ">
					<div class="row col-12">		
						<div class="mx-auto">
								
								
								<ul class="list-group list-group-flush ">
										<?php while($w = $r->fetch_assoc()) :?>
											<?=$w['first_p']?>  <?=$w['second_p']?>
                                            <br>
										<?php endwhile ;?>
								 
								</ul>
								
								<div class="form-div row mt-5">
									<button type="submit" class="btn btn-lg btn-primary col-12" name="save_stat">Save</button>
								</div>
								
							</form>	
						</div>
																																			
					</div>							
				</div>	
			</div>			
		</div>		
	</div>
</div>
	
	
	
<?php $conn->close() ?>
</body>
</html>

									<!--<h2 class="list-group-item text-primary mt-3">Pytanie 2</h2>
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
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>-->
								  