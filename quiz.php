<?php
session_start();
require_once "db_connect.php";
/* sprawdzamy czy jest ustawiony 'quiz'*/
if( isset($_SESSION['quiz']) && !isset($_SESSION['load']) )
{
	//echo "jestem1";
	$check = mb_substr($_SESSION['quiz'], 0, 1, 'UTF-8'); /* wyciagamy pierwsza literę zmiennej jeśli to 's' to znaczy, że zaczynamy quiz*/
	if($check == "s")
	{
		$id_quiz = mb_substr($_SESSION['quiz'], 9, mb_strlen($_SESSION['quiz'],'UTF-8'), 'UTF-8'); /* wyciągamy id quizu */
		$tab_name = "quiz".$id_quiz."_".$_SESSION['user_id']; /* towrzymy nazwe tabeli z quizem */
		$_SESSION['id_quiz'] = $id_quiz; /* do zmiennej sesyjnej wkladamy id_quizu */
	}
	else if($check == "q")
	{
		$tab_name = $_SESSION['quiz'];
	}
}
else if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['load']))
{
	$tab_name = key($_POST);
	$_SESSION['tab_name'] = $tab_name;
	//echo "jestem2";
}
else if(!isset($_SESSION['load']))
{
	header("Location: index.php");
	exit();
}
if(!isset($_SESSION['load']) && (isset($_SESSION['quiz']) || isset($_SESSION['tab_name'])) ) /* jeśli nie ma load, to znaczy ze jest 1 pytanie */
{
	//echo "jestem3";
	try
	{
			$_SESSION['userAns'][0] = " ";
			$_SESSION['score'] = 0; // score na 0
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			$sql = "SELECT * FROM $tab_name"; /* ściągmy wszystko z tabeli gdzie mamy pytania i odp */
			$r = $conn->query($sql);
			$i=0;
			while($w = $r->fetch_assoc())
			{
				$_SESSION['tab_q'][$i][0] = $w['question']; /* do tabeli sesyjnej wkladamy pytania i odpowiedzi */
				$_SESSION['tab_q'][$i][1] = $w['answers'];
				$i++;
			}
			$_SESSION['load'] = true; // ustawiamy load
			$ans_tab = explode("|",$_SESSION['tab_q'][0][1]); // oddzielamy odpowiedzi dla 1 pytania
			$tab = array(" ","A","B","C","D"); // look-up table z ABCD
			for($i=1;$i<count($ans_tab);$i++) // od 1 do ilosc odp w tabeli
			{	
				if( mb_substr($ans_tab[$i], mb_strlen($ans_tab[$i])-1, mb_strlen($ans_tab[$i]), 'UTF-8') == ":") // jesli na koncu jest ":" to jest odpowiedź poprawna
				{
					$_SESSION['corrAns'] = 'card'.$tab[$i]; // ustaw zmienna sesjną z dobrą odpowiedzią
					//echo $_SESSION['corrAns'];

					$ans_tab[$i] = mb_substr($ans_tab[$i], 0, mb_strlen($ans_tab[$i])-1, 'UTF-8'); // nadpisz odpowiedź bez ":"
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
	//echo "jestem4";
	// jeśli juz ktoś odpowie na 1 pytanie, to ściągamy dobrą odpowiedź i porównujemy czy przyszła taka w zmiennej POST
	$corr_Ans = mb_substr($_SESSION['corrAns'], mb_strlen($_SESSION['corrAns'])-1, mb_strlen($_SESSION['corrAns']), 'UTF-8');
	if(isset($_POST[$corr_Ans]))
	{
		$_SESSION['score']++;
	 	//echo "<br>";
		//echo "Jestem".$_SESSION['score'];
	}
	$_SESSION['userAns'][$_SESSION['I']+1] = key($_POST);
	//echo $_SESSION['userAns'][$_SESSION['I']+1];
	$_SESSION['I']++;
	/*echo count($_SESSION['tab_q']);
	echo "<br>";
	echo $_SESSION['I'];*/
	// jeśli zmienna "I" będzie >= od ilości pytań  to przejdź do podsumowania
	if($_SESSION['I'] >= count($_SESSION['tab_q']))
	{
		header("Location: summary.php");
		exit();
	}
	// rozdzielamy odpowiedzi dla nastepnego pytania
	$ans_tab = explode("|",$_SESSION['tab_q'][$_SESSION['I']][1]);
			$tab = array(" ","A","B","C","D");
			for($l=1;$l<count($ans_tab);$l++)
			{	
				if( mb_substr($ans_tab[$l], mb_strlen($ans_tab[$l])-1, mb_strlen($ans_tab[$l]), 'UTF-8') == ":")
				{
					$_SESSION['corrAns'] = 'card'.$tab[$l];
					//echo $_SESSION['corrAns'];
					$ans_tab[$l] = mb_substr($ans_tab[$l], 0, mb_strlen($ans_tab[$l])-1, 'UTF-8');
				}
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
	<form method="post">
		<div class="card">
			
			<div class="card-title mt-5 text-center text-secondary">
				<h2 id="question"><?=$_SESSION['tab_q'][$_SESSION['I']][0]?></h2>		
			</div>
			
			
			<div class="card-body">
				<div class="row row-cols-1 row-cols-sm-2">
				
				<?php for($j=1; $j<count($ans_tab); $j++) :?>
					<div class="col-12">
						<label class="col-12">
							<input type="radio" name="<?=$tab[$j]?>" value="<?=$tab[$j]?>" id="<?=$tab[$j]?>" style="display: none;">
							<a class="btn btn-block text-left" onClick="answerClicked('card<?=$tab[$j]?>')">	
								<div id='card<?=$tab[$j]?>' class="card card-block text-white bg-secondary mb-3"  >
									<div class="card-body">
										<h5 class="card-title"><?=$tab[$j]?></h5>
										<p class="card-text col"><?=$ans_tab[$j]?></p>
										
									</div>
								</div>
							</a>
						</label>
					</div>
					
				<?php endfor ;?>
				
				<br>					
				</div>	
			</div>		
		</div>
		<div class="row">
			<button type="submit" id="nextButton" class="btn btn-lg btn-primary col-6 col-lg-3 text-center mx-auto mt-3 mb-3 float-center" disabled>
								Next </button>
		</div>
	</form>
</div>
	
</body>
</html>
