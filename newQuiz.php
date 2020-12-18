<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Quiz</title>
</head>
<body>
<?php include 'header.php';?>
	
<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="mt-3 text-center">
		<h1>Create a new quiz</h1>		
	</div>
	<form action="" method="post">
		<div class="mt-5 mx-auto">
			<div class="mb-3">
				<input type="text" id="quiz_name" name="quiz_name" placeholder="Quiz Name" required class="form-control" />
			</div> 
						
			<div class="mb-3 custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="is_public">
				<label class="custom-control-label" for="is_public">This quiz is public</label>
			</div>
				
			<div>
				<button type="submit" class="btn btn-primary mb-2">Add questions</button>
			</div>
		</div>						
	</form>	
</div>
	
</body>
</html>