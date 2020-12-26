<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz | Learn</title>
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
	<form>
		<div class="card">
			<div class="row mt-5">
				<div class="col-10 card-title text-center mx-auto mt-2 text-primary">
					<h2 id="question">To jest przykładowe pytanie, które normalnie byłoby wczytane przez php?</h2>		
				</div>
			</div>	
			
			<div class="card-body">
				<div class="row row-cols-2 mt-3 mx-auto col-md-8">
					
				<!--to trzeba zapetlic w php-->	
					<input type="radio" name="answer" value="A" id="A" style="display: none;">
					<label for="A">
						<a class="btn btn-fix text-left" onClick="answerClicked('cardA')">	
							<div id='cardA' class="card text-white bg-secondary mb-3 float-center"  >
								<div class="card-body">
									<h5 class="card-title">A.</h5>
									<p class="card-text">Treść odpowiedzi wczytana przez php</p>
								</div>
							</div>
						</a>
					</label>
				<!--------------------------->	


				</div>	
			</div>	
			<button type="submit" id="nextButton" class="btn btn-lg btn-primary col-6 mx-auto mt-2 mb-3" disabled>
						Next </button>
		</div>
	</form>
</div>

	
</body>
</html>