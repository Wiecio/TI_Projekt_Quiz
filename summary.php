<?php 
session_start();
require_once "db_connect.php";
if(isset($_SESSION['load']))
{
	try
	{
		$conn  = new mysqli($host,$db_user,$db_password,$db_name);
		if($conn->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		$tab_name = "namequiz_".$_SESSION['user_id'];
		$id_quiz = $_SESSION['id_quiz'];
		$sql = "SELECT name_quiz FROM $tab_name WHERE id_quiz = $id_quiz";
		$r = $conn->query($sql);
		$w = $r->fetch_assoc();
		$nameQuiz = $w['name_quiz'];
		$tab_name = "quiz".$id_quiz."_".$_SESSION['user_id'];
		$sql = "SELECT * FROM $tab_name";
		$r = $conn->query($sql);
		$tab = array(" ","A","B","C","D");
		$j=0;
	}
	catch(Exception $e)
	{

	}
}
else
{
	header("Location: index.php");
	exit();
}

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
			<h1>You completed "<?=$nameQuiz?>" quiz!</h1>		
		</div>
	</div>
	
	<div class="row">
		<div class="col text-center text-success">
			<h5>You scored <?=$_SESSION['score']?>/<?=$_SESSION['I']?> correct answers!</h5>	
		</div>	
	</div>
	<form>
		<div class="card mt-2 mb-5">								
			<div class="card-body">
				<div class="row col-12 mx-auto">		
					<div class="mx-auto">
					<ul class="list-group list-group-flush ">
										<?php while($w = $r->fetch_assoc()) :?>
											<h2 class="list-group-item text-primary mt-3"><?=$w['question']?></h2>
											<?php 
												$ans_tab = explode(",",$w['answers']);
												$j++;

											?>
											<?php for($i=1;$i<count($ans_tab);$i++) :?>
											
													<?php if( mb_substr($ans_tab[$i], mb_strlen($ans_tab[$i])-1, mb_strlen($ans_tab[$i]), 'UTF-8') == ":") :?>
													<?php $ans_tab[$i] = mb_substr($ans_tab[$i], 0, mb_strlen($ans_tab[$i])-1, 'UTF-8'); ?>
														<h3 class='text-success mx-auto'><?=$tab[$i]?>. <?=$ans_tab[$i]?></h3>
													<?php else :?>
														<?php if($_SESSION['userAns'][$j] == $tab[$i]) : ?> 
															<h3 class="text-danger mx-auto"><?=$tab[$i]?>. <?=$ans_tab[$i]?></h3>
														<?php else :?>
															<h3 class="text-secondary mx-auto"><?=$tab[$i]?>. <?=$ans_tab[$i]?></h3>
														<?php endif ;?>
													<?php endif;?>
											<?php endfor ;?>
										<?php endwhile ;?>
								 
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
<?php 
unset($_SESSION['quiz']);
unset($_SESSION['load']);
unset($_SESSION['I']);
unset($_SESSION['corrAns']);
unset($_SESSION['tab_q']);
unset($_SESSION['score']);
$conn->close();
 ?>
</body>
</html>