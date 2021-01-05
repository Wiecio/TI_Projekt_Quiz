
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Flashcard Set</title>
</head>
<body>
<?php include 'header.php';?>
	
<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="mt-3 text-center">
		<h1>Create a new Flashcard set</h1>		
	</div>
	<form action="" method="post">
		<div class="mt-5 mx-auto">
			<div class="mb-3">
				<input type="text" id="flashcard_set_name" name="flashcard_set_name" placeholder="Flashcard set name" required class="form-control" />
			</div> 
	
			<div>
				<button type="submit" class="btn btn-primary mb-2">Add flashcards</button>
			</div>
		</div>						
	</form>	
</div>
	
</body>
</html>