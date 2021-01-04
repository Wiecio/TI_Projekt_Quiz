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
			<div class="card-body" >
				 <div class="btn flip-card" onClick="flipCard()">
					<div id="flashCard" class="flip-card-inner">
						<div class="flip-card-front">
						<p class="mt-5"><h1>Dzień dobry</h1></p>
							
						</div>
						<div class="flip-card-back">
							<p class="mt-5"><h1>Good morning</h1></p>	
						</div>
					</div>
				</div>				
			</div>	
		</div>		
	</div>
</div>
	
	
</body>
</html>