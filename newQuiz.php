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
if(isset($_SESSION['quiz']))
{
	unset($_SESSION['quiz']);
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
if(!isset($_SESSION['log_in']))
{
	header("Location: index.php");
	exit();
}
if(isset($_POST['quiz_name']))
{
	require_once "functions_PHP.php";
	$_SESSION['quiz_name'] = $_POST['quiz_name'];
	if(isset($_POST['is_public']))
	{
		$_SESSION['is_public'] = true;
	}
	else
	{
		
		$_SESSION['is_public'] = false;
	}
	if(!Check_name_quiz($_SESSION['quiz_name']))
	{
		$_SESSION['bad_name'] = "Podana nazwa zawiera znaki niedozwolone, nazwa może tylko zawierać litery i spacje";
	}
	else
	{
		$_SESSION['quizInProgress'] = true;
		header('Location: newQuestion.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Quiz</title>
</head>
<body>
<?php include 'header.php';?>
	
<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="mt-3 text-center">
		<h1>Create a new quiz</h1>		
	</div>
	<form action="" method="post">
		<div class="mt-5 mx-auto">
			<div class="mb-3">
				<input type="text" id="quiz_name" name="quiz_name" placeholder="Quiz Name" required class="form-control" />
			</div> 
				<?php if(isset($_SESSION['bad_name'])) : ?>
						<div class="alert alert-danger mt-3"><?=$_SESSION['bad_name']?></div>
						<?php unset($_SESSION['bad_name']) ?>
				<?php endif; ?>		
			<div class="mb-3 custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="is_public" name="is_public">
				<label class="custom-control-label" for="is_public">This quiz is public</label>
			</div>
				
			<div>
				<button type="submit" class="btn btn-primary mb-2">Add questions</button>
			</div>
		</div>						
	</form>	
</div>
	
</body>
</html>