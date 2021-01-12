<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['quiz'] = key($_POST);
	$check = mb_substr($_SESSION['quiz'], 0, 1, 'UTF-8');
	if($check == "s")
	{
		header("Location: quiz.php");
		exit();
	}
	else if($check == "d")
	{
		header("Location: deleteQuiz.php");
		exit();
	}
	elseif($check =="A")
	{
		$_SESSION['code'] = true;
		header("Location: createCode.php");
		exit();
	}
	else if($check == "q")
	{
		try
		{
			require_once "db_connect.php";
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new exception(mysqli_connect_errno());
			}
			$tab_name = $_SESSION['quiz']."_".$_SESSION['user_id'];
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
<form action="saveStatQuiz.php" method="post">
	<div class="row">
		<div class="col-12">
			
			<div class="text-center">
				<h1 class="text-dark ">View your quiz</h1>	
				<div class="mb-3 mx-auto custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="is_public" name="is_public" checked>
					<label class="custom-control-label mb-3" for="is_public">This quiz is public</label>
				</div>
			</div>
			<div class="card mt-2 mb-5">								
			<div class="card-body">				
			<div class="mt-2 mb-5 ">								
				
					<div class="row">		
						<div class="mx-auto col-12 col-md-8">			
							<ul class="list-group list-group-flush ">
								<?php $counter = 0; ?>
								<?php while($w = $r->fetch_assoc()) :?>
									<h3 class="list-group-item text-dark text-left mt-3"><?=++$counter?>. <?=$w['question']?></h3>
									<?php 
										$ans_tab = explode(",",$w['answers']);

									?>
									<?php for($i=1;$i<count($ans_tab);$i++) :?>
									
											<?php if( mb_substr($ans_tab[$i], mb_strlen($ans_tab[$i])-1, mb_strlen($ans_tab[$i]), 'UTF-8') == ":") :?>
											<?php $ans_tab[$i] = mb_substr($ans_tab[$i], 0, mb_strlen($ans_tab[$i])-1, 'UTF-8') ?>
												<h4 class='text-success ml-5'><?=$tab[$i]?>. <?=$ans_tab[$i]?></h4>
											<?php else :?>
												<h4 class="text-secondary ml-5"><?=$tab[$i]?>. <?=$ans_tab[$i]?></h4>
											<?php endif;?>
									<?php endfor ;?>
								<?php endwhile ;?>
							 
							</ul>							
							
						</div>
																																			
					</div>							
					
			</div>	
			</div>
			</div>
		</div>		
	</div>
	<div class="row mb-5 mx-auto col-12">
		<button type="submit" class="btn btn-lg btn-primary col-3 mx-auto" name="save_stat">Save</button>
	</div>
</form>	
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
								  