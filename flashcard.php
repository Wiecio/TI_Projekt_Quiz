<?php
session_start();

$tab_name = "flash2_1";
require_once "db_connect.php";
if(!isset($_SESSION['loadf']))
{
		try
		{
			$_SESSION['countf'] = 0;
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
				$_SESSION['tab_flash'] = array();
				$sql = "SELECT * FROM $tab_name";
				$r = $conn->query($sql);
				$i=0;
				while($w = $r->fetch_assoc())
				{
					$_SESSION['tab_flash'][$i][0] = $w['first_p'];
					$_SESSION['tab_flash'][$i][1] = $w['second_p']; 
					$i++;
				}
				$_SESSION['max'] = $i-1;
				$_SESSION['loadf'] = true;
				$conn->close();
				
				
		}
		catch(Exception $e)
		{

		}
}
else
{
	if($_SERVER['REQUEST_METHOD'] =='POST')
	{
		$btn = key($_POST);
		if($btn=="Previous")
		{
			if($_SESSION['countf'] ==0)
			{
				$_SESSION['er_prev'] = "You are on the first flashcard!";
			}
			else
			{
				$_SESSION['countf']--;
			}

		}
		else
		{
			if($_SESSION['countf'] ==$_SESSION['max'])
			{
				$_SESSION['er_next'] = "You are on the last flashcard!";
			}
			else
			{
				$_SESSION['countf']++;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz</title>
</head>

<script>
var isFlipped = false;
function flipCard(){
	const flashCard = document.getElementById("flashCard");
	
	if(isFlipped)
		flashCard.style.transform = "rotateY(0deg)";
	else
		flashCard.style.transform = "rotateY(180deg)";
		
	isFlipped = !isFlipped;
}
</script>


<style>
.flip-card {
  background-color: transparent;
  width: 100%;
  height: 200px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #2980b9;
  color: white;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
</style>



<body>
<?php include 'header.php';?>

<div class="container mt-5" >
	<div class="row">
		<div class="mx-auto mt-5 col-12 col-md-8 col-lg-6">
			<form action="" method="POST">
				<div class="mt-5">
					<div class="btn flip-card mt-5" onClick="flipCard()">
						<div id="flashCard" class="flip-card-inner">
							<div class="flip-card-front">
							<p class="mt-5"><h1><?=$_SESSION['tab_flash'][$_SESSION['countf']][0]?></h1></p>
								
							</div>
							<div class="flip-card-back">
								<p class="mt-5"><h1><?=$_SESSION['tab_flash'][$_SESSION['countf']][1]?></h1></p>	
							</div>
						</div>
					</div>				
				</div>	
				<?php if(isset($_SESSION['er_prev'])): ?>
						<div class="alert alert-danger mt-3"><?=$_SESSION['er_prev']?></div>
						<?php unset($_SESSION['er_prev']);?>
				<?php endif; ?>
				<?php if(isset($_SESSION['er_next'])): ?>
						<div class="alert alert-danger mt-3"><?=$_SESSION['er_next']?></div>
						<?php unset($_SESSION['er_next']);?>
				<?php endif; ?>
				<?=$_SESSION['countf']+1?>/<?=$_SESSION['max']+1?>
				<div class="row mt-4"> 
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="Previous" >Previous</button>
					</div>
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success float-right" name="Next">Next</button>
					</div>								
				</div>

			</form>
		</div>		
	</div>
</div>
	
	
</body>
</html>