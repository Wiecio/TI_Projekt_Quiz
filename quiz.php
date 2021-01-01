<?php
session_start();
require_once "db_connect.php";
if(!isset($_SESSION['load']))
{
	try
	{
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			$tab_name = "quiz3"."_"."1";
			$sql = "SELECT * FROM $tab_name";
			$r = $conn->query($sql);
			$i=0;
			while($w = $r->fetch_assoc())
			{
				$_SESSION['tab_q'][$i][0] = $w['question'];
				$_SESSION['tab_q'][$i][1] = $w['answers'];
				$i++;
			}
			$_SESSION['load'] = true;
			$ans_tab = explode(",",$_SESSION['tab_q'][0][1]);
			$tab = array(" ","A","B","C","D");
			for($i=1;$i<count($ans_tab);$i++)
			{	
				if( mb_substr($ans_tab[$i], mb_strlen($ans_tab[$i])-1, mb_strlen($ans_tab[$i]), 'UTF-8') == ":")
				{
					$_SESSION['corrAns'] = 'card'.$tab[$i];
					$ans_tab[$i] = mb_substr($ans_tab[$i], 0, mb_strlen($ans_tab[$i])-1, 'UTF-8');
				}
			}
			$i=0;
			$_SESSION['I']=0;
			reset($ans_tab);
			

	}
	catch(Exception $e)
	{
			echo "jestem";
	}
}
else
{
	$_SESSION['I']++;
	echo count($_SESSION['tab_q']);
	echo "<br>";
	echo $_SESSION['I'];
	if($_SESSION['I'] >= count($_SESSION['tab_q']))
	{
		header("Location: summary.php");
		exit();
	}
	$ans_tab = explode(",",$_SESSION['tab_q'][$_SESSION['I']][1]);
			$tab = array(" ","A","B","C","D");
			for($l=1;$l<count($ans_tab);$l++)
			{	
				if( mb_substr($ans_tab[$l], mb_strlen($ans_tab[$l])-1, mb_strlen($ans_tab[$l]), 'UTF-8') == ":")
				{
					$_SESSION['corrAns'] = 'card'.$tab[$l];
					$ans_tab[$l] = mb_substr($ans_tab[$l], 0, mb_strlen($ans_tab[$l])-1, 'UTF-8');
				}
			}
	$corr_Ans = mb_substr($_SESSION['corrAns'], mb_strlen($_SESSION['corrAns'])-1, mb_strlen($_SESSION['corrAns']), 'UTF-8');
	if(isset($_POST[$corr_Ans]))
	{
		$_SESSION['score']=1;
		echo "<br>";
		echo "Jestem".$_SESSION['score'];
	}
}
       
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz|learn</title>
</head>
<body>
<?php include 'header.php';?>
	
	
<script>

function answerClicked (idSelected){
			
	const cardList = document.querySelectorAll('.card');
	
	cardList.forEach(element => {
		element.classList.replace('bg-success','bg-secondary');
		
	});
	
	document.getElementById(idSelected).classList.replace('bg-secondary','bg-success');
	document.getElementById('nextButton').removeAttribute('disabled');
			
}

</script>	
	
	

	
<div class="container mt-5">
	
	<div class="card">
		<div class="row mt-5">
			<div class="col-10 card-title text-center mx-auto mt-2 text-primary">
				<h2 id="question"><?=$_SESSION['tab_q'][$_SESSION['I']][0]?></h2>		
			</div>
		</div>	
		
		<div class="card-body">
			<div class="row row-cols-2 mt-3 mx-auto col-md-8">
			<?php for($j=1; $j<count($ans_tab); $j++) :?>

				<input type="radio" name="answer" value="<?=$tab[$j]?>" id="<?=$tab[$j]?>" style="display: none;">
						<label for="<?=$tab[$j]?>">
							<a class="btn btn-fix text-left" onClick="answerClicked('<?= $_SESSION['corrAns']?>')">	
								<div id='card<?=$tab[$j]?>' class="card text-white bg-secondary mb-3 float-center"  >
									<div class="card-body">
										<h5 class="card-title"><?=$tab[$j]?></h5>
										<p class="card-text"><?=$ans_tab[$j]?></p>
									</div>
								</div>
							</a>
						</label>
			<?php endfor ;?>
			<br>
			
			
				
				
				
				
			</div>	
		</div>	
		<form method="post">
		<button type="submit" id="nextButton" class="btn btn-lg btn-primary col-6 mx-auto mt-2 mb-3" disabled>
						Next </button>
		</form>
	</div>
</div>

	
</body>
</html>


<!--<button type="submit" id="nextButton" class="btn btn-lg btn-primary col-6 mx-auto mt-2 mb-3" onClick="nextClicked('Nowe A','Nowe B','Nowe C','Nowe D','Nowe pytanie wczytane przez php?','cardC')" disabled> 
					Next </button>-->
<!--<a class="btn btn-fix text-left" onClick="answerClicked('')">		
					<div id='cardB' class="card text-white	bg-secondary mb-3">
						<div class="card-body">
							<h5 class="card-title">B.</h5>
							<p class="card-text" id="B">Treść odpowiedzi wczytana przez php</p>
						</div>
					</div>
				</a>
			
			
				<a class="btn btn-fix text-left" onClick="answerClicked('')">		
					<div  id='cardC' class="card text-white bg-secondary mb-3">
						<div class="card-body">
							<h5 class="card-title">C.</h5>
							<p class="card-text" id="C">Treść odpowiedzi wczytana przez php</p>
						</div>
					</div>
				</a>

				<a class="btn btn-fix text-left" onClick="answerClicked('')">		
					<div id='cardD' class="card text-white bg-secondary mb-3" >
						<div class="card-body">
							<h5 class="card-title">D.</h5>
							<p class="card-text" id="D">Treść odpowiedzi wczytana przez php</p>
						</div>
					</div>
				</a>-->