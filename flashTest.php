<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
			if(isset($_POST['check']))
			{
					$_SESSION['check'] = true;
					$back = mb_strtolower($_POST['back'],'UTF-8');
					$back_corr = mb_strtolower($_SESSION['tab_flash'][$_SESSION['counter']][1],'UTF-8');
					if($back == $back_corr)
					{
						$_SESSION['comm'] = "Good!";
					}
					else
					{
						$_SESSION['comm'] = "Wrong! :("." Your answer: ".$back."  "."Correct answer: ".$back_corr;
					}
			}
			else if(isset($_POST['next']))
			{
				if($_SESSION['counter']==	$_SESSION['max'])
				{
					$_SESSION['comm'] = "You are on the last flashcard!";
				}
				else
				{
					$_SESSION['counter']++;
					$_SESSION['check'] = false;
				}
			}
			else if(isset($_POST['jump']))
			{
				$_SESSION['counter']=0;
			}
			else
			{
					require_once "db_connect.php";
					$tab_name = key($_POST);
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
							$conn->close();
							$_SESSION['check'] = false;
							$_SESSION['counter']=0;
									
									
					}
					catch(Exception $e)
					{
	
					}
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
<title>Test</title>
</head>

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
	<?php if($_SESSION['check']) : ?>
		<?php if(isset($_SESSION['comm']) && $_SESSION['comm'] == "Good!" ) : ?>
			<div class="alert alert-success mt-3"><?=$_SESSION['comm']?></div>
				<?php if(isset($_SESSION['comm'])) unset($_SESSION['comm']) ?>
		<?php elseif(isset($_SESSION['comm'])) :?>
				<div class="alert alert-danger mt-3"><?=$_SESSION['comm']?></div>
				<?php if(isset($_SESSION['comm'])) unset($_SESSION['comm']) ?>
		<?php endif;?>
	<?php endif ;?>
			<form action="" method="POST">
				<div class="mt-3">
					<div class="flip-card mt-3">
						<div id="flashCard" class="flip-card-inner">
							<div class="flip-card-front">
								<h1 style="margin-top:65px;"><?=$_SESSION['tab_flash'][$_SESSION['counter']][0]?></h1>		
							</div>
						
						</div>
					</div>	
					<?=	$_SESSION['counter']+1?>/<?=$_SESSION['max']+1?>
						<?php if($_SESSION['check'] == false): ?>
								<div class="col-12 mt-2">
									<input type="text" id="back" name="back" placeholder="Back" required class="form-control" />
								</div>		
						<?php else :?>
								<div class="col-12 mt-2">
									<input type="text" id="back" name="back" placeholder="Back" class="form-control" />
								</div>
						<?php endif; ?>	
				
					
					<div class="row mt-4"> 				
						<div class="col-6">
							<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="check" >Check</button>
						</div>
						<?php if($_SESSION['check'] == false): ?>
							<div class="col-6">
								<button disabled type="submit" class="btn btn-lg btn-block btn-success float-right" name="next">Next</button>
							</div>		
						<?php else :?>
							<div class="col-6">
								<button type="submit" class="btn btn-lg btn-block btn-success float-right" name="next">Next</button>
							</div>
						<?php endif; ?>	
						<?php if($_SESSION['check'] == false): ?>
							<div class="col-12">
								<button disabled type="submit" class="btn btn-lg btn-block btn-outline btn-outline-info float-right mt-2" name="jump">Jump to the begining</button>
							</div>		
						<?php else :?>
							<div class="col-12">
									<button type="submit" class="btn btn-lg btn-block btn-outline btn-outline-info float-right mt-2" name="jump">Jump to the begining</button>
							</div>	
						<?php endif; ?>			
								
					</div>
				</div>	
			</form>
		</div>		
	</div>
</div>
	
	
</body>
</html>