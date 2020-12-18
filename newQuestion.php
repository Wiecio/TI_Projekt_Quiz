<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add a new question</title>
</head>
<body>
	<?php include 'header.php';?>
	
	<div class="container" style="margin-top:1.5em;">
		<h1><p class="text-primary mt-5">Add a new question</p></h1>	
		<form action="" method="post">
			<div class="form-check">
		
				<div class="row mt-5">
					<label for="question" class="col-sm-2 col-form-label"><h4><p class="text-secondary">Question</p></h4></label>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<textarea class="form-control" id="question" rows="3"></textarea>
					</div>
				</div>
			
			 
			 
				<div class="ml-3">
					<div class="row mt-3">
						<h4><p class="text-secondary">Answers</p></h4>
					</div>
				</div>
			 
				<div class="row">
					<div class="col-12">
						<div class="col-sm-10">
						   <div class="row mb-3">
							   <div class="col-1 mt-4">
									<label for="A" class="col-sm-2 col-form-label"><h5><p class="text-secondary">A</p></h5></label>
								</div>
								<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
									<textarea name="A" class="form-control" id="A" rows="4"></textarea>
								</div>
								
								<div class="col-1 form-check mt-4">
									<input class="form-check-input" type="radio" name="correctAnswer" id="r1" value="A" checked>
									<label class="form-check-label" for="r1">
									  <p class="text-info">Correct answer</p>
									</label>
								</div>
								
							</div>
							
							<div class="row mb-3">
							   <div class="col-1 mt-4">
									<label for="B" class="col-sm-2 col-form-label"><h5><p class="text-secondary">B</p></h5></label>
								</div>
								<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
									<textarea name="B" class="form-control" id="B" rows="4"></textarea>
								</div>
								
								<div class="col-1 form-check mt-4">
									<input class="form-check-input" type="radio" name="correctAnswer" id="r2" value="B">
									<label class="form-check-label" for="r2">
									  <p class="text-info">Correct answer</p>
									</label>
								</div>
								
							</div>
							
							<div class="row mb-3">
							   <div class="col-1 mt-4">
									<label for="C" class="col-sm-2 col-form-label"><h5><p class="text-secondary">C</p></h5></label>
								</div>
								<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
									<textarea name="C" class="form-control" id="C" rows="4"></textarea>
								</div>
								
								<div class="col-1 form-check mt-4">
									<input class="form-check-input" type="radio" name="correctAnswer" id="r3" value="C">
									<label class="form-check-label" for="r3">
									  <p class="text-info">Correct answer</p>
									</label>
								</div>
								
							</div>
							
							
							<div class="row mb-3">
							   <div class="col-1 mt-4">
									<label for="D" class="col-sm-2 col-form-label"><h5><p class="text-secondary">D</p></h5></label>
								</div>
								<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
									<textarea name="D" class="form-control" id="D" rows="4"></textarea>
								</div>
								
								<div class="col-1 form-check mt-4">
									<input class="form-check-input" type="radio" name="correctAnswer" id="r4" value="D">
									<label class="form-check-label" for="r4">
									  <p class="text-info">Correct answer</p>
									</label>
								</div>
								
							</div>
							 
							
						</div>
					</div>	
				</div>
			  
			  
			  
				<div class="row mb-4 mt-3"> 
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success float-left">Finish</button>
					</div>
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-primary float-right">Next</button>
					</div>
					
				</div>
			
			</div>
		</form>	
	</div>
	
</body>
</html>