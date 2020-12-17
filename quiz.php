<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz|learn</title>
</head>
<body>
<?php include 'header.php';?>
	
	
<script>

boolean answersActive = true;

function nextClicked(textA,textB,textC,textD,textQuestion,idCorrect){
  document.getElementById("A").innerHTML = textA;
  document.getElementById("B").innerHTML = textB;
  document.getElementById("C").innerHTML = textC;
  document.getElementById("D").innerHTML = textD;
  document.getElementById("question").innerHTML = textQuestion;
  
  const cardList = document.querySelectorAll('.card');
	
  cardList.forEach(element => {
	element.classList.replace('bg-danger','bg-secondary');
  });
	
  document.getElementById(idCorrect).classList.replace('bg-success','bg-secondary');
  document.getElementById('nextButton').setAttribute('disabled','true');
  answersActive = true;
	
}

function answerClicked (idCorrect){
	if(answersActive == true){
		
		const cardList = document.querySelectorAll('.card');
		
		cardList.forEach(element => {
			element.classList.replace('bg-secondary','bg-danger');
			
		});

		document.getElementById(idCorrect).classList.replace('bg-danger','bg-success');
		document.getElementById('nextButton').removeAttribute('disabled');
	}
	answersActive = false;
}

</script>	
	
	

	
<div class="container" style="margin-top:1.5em;">
	<div class="row">
		<div class="col-12 text-center text-primary">
			<h1>Pytanie i z n</h1>		
		</div>
		
		
		<div class="col-12 text-center text-secondary">
			<h3 class="text-dark" id="question">Treść pytania wczytana przez php</h3>		
		</div>
		
	</div>	
	<div class="card-group">
		<div class="row row-cols-2 mt-3">
		
			<a class="btn btn-fix text-left" onClick="answerClicked('cardC')">		
				<div id='cardA' class="card text-white bg-secondary mb-3" >
					<div class="card-body">
						<h5 class="card-title">A.</h5>
						<p class="card-text" id="A">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
		
		
		
			<a class="btn btn-fix text-left" onClick="">		
				<div id='cardB' class="card text-white	bg-secondary mb-3">
					<div class="card-body">
						<h5 class="card-title">B.</h5>
						<p class="card-text" id="B">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
		
		
			<a class="btn btn-fix text-left" onClick="">		
				<div  id='cardC' class="card text-white bg-secondary mb-3">
					<div class="card-body">
						<h5 class="card-title">C.</h5>
						<p class="card-text" id="C">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>

			<a class="btn btn-fix text-left" onClick="">		
				<div id='cardD' class="card text-white bg-secondary mb-3" >
					<div class="card-body">
						<h5 class="card-title">D.</h5>
						<p class="card-text" id="D">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
			
		</div>	
			
	</div>
	
	<button type="button" id="nextButton" class="btn btn-primary" onClick="nextClicked('Nowe A','Nowe B','Nowe C','Nowe D','Nowe pytanie','cardC')" disabled>
	Next
	</button>
			
</div>

	
</body>
</html>