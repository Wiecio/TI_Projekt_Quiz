<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz|learn</title>
</head>
<body>
<?php include 'header.php';?>
	
	
<script>
function answerClicked(id) {
  <!-- Tutaj zapamiętanie wybranej przez użytkownika odpowiedzi za pomocą id -->
  document.getElementById("A").innerHTML = "Nowa treść odpowiedzi A wczytana przez php";
  document.getElementById("B").innerHTML = "Nowa treść odpowiedzi B wczytana przez php";
  document.getElementById("C").innerHTML = "Nowa treść odpowiedzi C wczytana przez php";
  document.getElementById("D").innerHTML = "Nowa treść odpowiedzi D wczytana przez php";
  document.getElementById("question").innerHTML = "Nowa treść pytania wczytana przez php";
  	

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
		
		
	<div class="card-group">
		<div class="row row-cols-2">
		
			<a class="btn btn-fix text-left" onClick="answerClicked('A')">		
				<div class="card text-white bg-secondary mb-3" >
					<div class="card-body">
						<h5 class="card-title">A</h5>
						<p class="card-text" id="A">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
		
		
		
			<a class="btn btn-fix text-left" onClick="answerClicked('B')">		
				<div class="card text-white	bg-secondary mb-3">
					<div class="card-body">
						<h5 class="card-title">B</h5>
						<p class="card-text" id="B">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
		
		
			<a class="btn btn-fix text-left" onClick="answerClicked('C')">		
				<div class="card text-white bg-secondary mb-3">
					<div class="card-body">
						<h5 class="card-title">C</h5>
						<p class="card-text" id="C">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>

			<a class="btn btn-fix text-left" onClick="answerClicked('D')">		
				<div class="card text-white bg-secondary mb-3" >
					<div class="card-body">
						<h5 class="card-title">D</h5>
						<p class="card-text" id="D">Treść odpowiedzi wczytana przez php</p>
					</div>
				</div>
			</a>
			
		</div>	
			
	</div>
			
</div>

	
</body>
</html>