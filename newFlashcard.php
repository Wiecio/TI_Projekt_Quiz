<?php
session_start();
if(!isset($_SESSION['flash_progres']))
{
	header("Location: index.php");
	exit();
}
/*if(isset($_SESSION['tab_flash']))
{
	print_r($_SESSION['tab_flash']);
}*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add a new flashcard</title>
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
			<h1><p class="text-primary text-center card-title card-header">Add a new flashcard</p></h1>	
			<form action="newFlashcard_php.php" method="post" onSubmit="return submitClicked()">
				<div class="form-check">
					<div class="card-body">
						<div class="list-group list-group-flush">			
							<div class="list-group-item">
								<div class="ml-3">
									<div class="row mt-3">
										<h3><p class="text-secondary">New Flashcard</p></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="col-sm-10">
											<div class="row mb-3">
												<div class="col-1 mt-4 mr-3">
													<label for="front" class="col-form-label"><h5><p class="text-secondary">Front</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="front" class="form-control" id="front" rows="4"></textarea>
												</div>										
											</div>
											
											<div class="row mb-3">
											   <div class="col-1 mt-4 mr-3">
													<label for="back" class="col-form-label"><h5><p class="text-secondary">Back</p></h5></label>
												</div>
												<div class="col-12 col-sm-9 ml-1 ml-sm-2 ml-md-0 mt-sm-2">
													<textarea name="back" class="form-control" id="back" rows="4"></textarea>
												</div>	
												<?php if(isset($_SESSION['empty_flash'])): ?>
														<div class="alert alert-danger mt-3"><?=$_SESSION['empty_flash']?></div>
														<?php unset($_SESSION['empty_flash']);?>
												<?php endif; ?>
												<?php if(isset($_SESSION['bad_name'])): ?>
														<div class="alert alert-danger mt-3"><?=$_SESSION['empty_flash']?></div>
														<?php unset($_SESSION['bad_name']);?>
												<?php endif; ?>
											</div>	
										</div>
									</div>	
								</div>								
							</div>	
								
							<div class="list-group-item">
								<div class="row row-cols-1 row-cols-sm-2 mt-4"> 
									<div class="col">
										<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="Finish" >Finish</button>
									</div>
									<div class="col mt-2 mt-sm-0">
										<button type="submit" class="btn btn-lg btn-block btn-primary float-right" name="Next">Next</button>
									</div>								
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