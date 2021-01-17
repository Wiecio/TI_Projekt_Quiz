
<?php
session_start();
if(!isset($_SESSION['log_in']) || (!isset($_SESSION['quiz_name'])) || (!isset($_SESSION['quizInProgress'])))
{
	header("Location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add a new question</title>
</head>
<body>
	<?php include 'header.php';?>
	
<script>

//Alert podczas opuszczania strony
function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}   

docReady(function() {
    // DOM is loaded and ready for manipulation here
	
	window.onbeforeunload = function (e) {
        
		var message = "Are you sure you want to leave this page? You may lose unsaved changes", e = e || window.event;
		if (e) {
			e.returnValue = message;
		}
		return message;
        
    }
	
});


function submitClicked(){
	
	window.onbeforeunload = null;
	return true;
}
//koniec części potrzebnej do alertu alertu
</script>
	
	<div class="container">
		<div class="card mt-3 mb-3">
		
			<h1><p class="text-primary text-center card-title card-header">Add a new question</p></h1>	
			<form action="newQuestion_php.php" method="post" onSubmit="return submitClicked()">
				<div class="form-check">
					<div class="card-body">
						<div class="list-group list-group-flush">
							<div class="list-group-item">
								<div class="row">
									<label for="question" class=" col-12 col-form-label"><h4 class="text-secondary">Question</h4></label>
								</div>
								<div class="row">
									<div class="col-sm-8">
										<textarea class="form-control" name="question" id="question" rows="3"></textarea>
									</div>
								</div>
								<?php if(isset($_SESSION['bad_answers_order'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_answers_order']?></div>
										<?php unset($_SESSION['bad_answers_order']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['quest_add'])): ?>
										<div class="alert alert-success mt-3"><?=$_SESSION['quest_add']?></div>
										<?php unset($_SESSION['quest_add']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['bad_quest'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_quest']?></div>
										<?php unset($_SESSION['bad_quest']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['zero_quest_err'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['zero_quest_err']?></div>
										<?php unset($_SESSION['zero_quest_err']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['bad_char'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_char']?></div>
										<?php unset($_SESSION['bad_char']);?>
								<?php endif; ?>
								
							</div>
						
							<div class="list-group-item">
								<div class="ml-3">
									<div class="row mt-3">
										<h4><p class="text-secondary">Answers</p></h4>
									</div>
								</div>
								<div class="row">
	
										<div class="col-sm-10">
											<div class="row mb-3">
												<div class="col-1 mt-4">
													<label for="A" class="col-sm-2 col-form-label"><h5><p class="text-secondary">A</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="A" class="form-control" id="A" rows="4"></textarea>
												</div>
												
												<div class="col-1 ml-3 ml-sm-0 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r1" value="A" checked>
													<label class="form-check-label" for="r1">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>										
											</div>
											
											<div class="row mb-3">
											   <div class="col-1 mt-1 mt-sm-4">
													<label for="B" class="col-sm-2 col-form-label"><h5><p class="text-secondary">B</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="B" class="form-control" id="B" rows="4"></textarea>
												</div>
												
												<div class="col-1 ml-3 ml-sm-0 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r2" value="B">
													<label class="form-check-label" for="r2">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
											
											<div class="row mb-3">
											   <div class="col-1 mt-1 mt-sm-4">
													<label for="C" class="col-sm-2 col-form-label"><h5><p class="text-secondary">C</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="C" class="form-control" id="C" rows="4"></textarea>
												</div>
												
												<div class="col-1 ml-3 ml-sm-0 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r3" value="C">
													<label class="form-check-label" for="r3">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
											
											
											<div class="row mb-3">
												<div class="col-1 mt-1 mt-sm-4">
													<label for="D" class="col-sm-2 col-form-label"><h5><p class="text-secondary">D</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="D" class="form-control" id="D" rows="4"></textarea>
												</div>
												
												<div class="col-1 ml-3 ml-sm-0 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r4" value="D">
													<label class="form-check-label" for="r4">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
										</div>
									</div>	
								</div>
								<?php if(isset($_SESSION['bad_correct_order'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_correct_order']?></div>
										<?php unset($_SESSION['bad_correct_order']);?>
								<?php endif; ?>
							</div>	
								
							
							<div class="row row-cols-1 row-cols-sm-2 mt-4"> 
								<div class="col">
									<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="Finish" >Finish</button>
								</div>
								<div class="col">
									<button type="submit" class="btn btn-lg btn-block btn-primary float-right mt-2 mt-sm-0" name="Next">Next</button>
								</div>								
							</div>
											  
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
	
	
</body>
</html>