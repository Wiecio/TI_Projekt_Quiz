<?php
session_start();
if(isset($_SESSION['flash']) && !isset($_SESSION['loadf']))
{
	$check = mb_substr($_SESSION['flash'], 0, 1, 'UTF-8'); /* wyciagamy pierwsza literę zmiennej jeśli to 's' to znaczy, że zaczynamy quiz*/
	if($check == "s")
	{
		$id_flash = mb_substr($_SESSION['flash'], 10, mb_strlen($_SESSION['flash'],'UTF-8'), 'UTF-8'); /* wyciągamy id flasha */
		$tab_name = "flash".$id_flash."_".$_SESSION['user_id']; /* towrzymy nazwe tabeli z flashem */
		$_SESSION['id_flash'] = $id_flash; /* do zmiennej sesyjnej wkladamy id_flasha */
		$_SESSION['tab_namef'] = $tab_name;
	}
	else if($check == "f")
	{
		$tab_name = $_SESSION['flash'];
		$_SESSION['tab_namef'] = $tab_name;
	}
}
else if(!isset($_SESSION['loadf']))
{
	header("Location: index.php");
	exit();
}
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
				
					<div class="btn flip-card " onClick="flipCard()">
						<div id="flashCard" class="flip-card-inner">
							<div class="flip-card-front">
								<h1 style="margin-top:65px;"><?=$_SESSION['tab_flash'][$_SESSION['countf']][0]?></h1>
								
							</div>
							<div class="flip-card-back">
								<h1 style="margin-top:65px;"><?=$_SESSION['tab_flash'][$_SESSION['countf']][1]?></h1>	
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
				<div class="col-12 text-left">
				<?=$_SESSION['countf']+1?>/<?=$_SESSION['max']+1?>
				</div>
				<div class="row mt-4"> 
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="Previous" >Previous</button>
					</div>
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success float-right" name="Next">Next</button>
					</div>								
				</div>
			</form>
			<form action="flashTest.php" method="POST">
				<button type="submit" name="<?=$_SESSION['tab_namef']?>" class="btn btn-lg btn-block btn-outline btn-outline-info mt-3 mb-4">Check your knowledge</button>
			</form>
			
		</div>		
	</div>
</div>
	
	
</body>
</html>