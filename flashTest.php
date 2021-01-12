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
		<div class="alert alert-danger mt-3">Komunikat</div>
			<form action="" method="POST">
				<div class="mt-3">
					<div class="flip-card mt-3">
						<div id="flashCard" class="flip-card-inner">
							<div class="flip-card-front">
								<h1 style="margin-top:65px;">Front</h1>		
							</div>
						
						</div>
					</div>	
					1/10
					<div class="col-12 mt-2">
						<input type="text" id="back" name="" placeholder="Back" required class="form-control" />
					</div>
					
					<div class="row mt-4"> 				
						<div class="col-6">
							<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="" >Check</button>
						</div>
						<div class="col-6">
							<button type="submit" class="btn btn-lg btn-block btn-success float-right" name="">Next</button>
						</div>								
					</div>
				</div>	
			</form>
		</div>		
	</div>
</div>
	
	
</body>
</html>