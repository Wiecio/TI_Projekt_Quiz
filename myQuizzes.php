<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Quizzes</title>
</head>
<body>
<?php include 'header.php';?>
	
	
	
<div class="container mt-5" >
	<div class="row">
		<div class="col-12 text-center">
			<div class="card">
				<h1 class="text-primary">My Quizzes</h1>				
			</div>						
			<div class="card mt-2 mb-5 ">								
				<div class="card-body ">
					<div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 mx-auto col-md-8">		
					
						<a class="btn btn-fix text-left mx-auto" id="quiz1">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title text-center">Quiz name</h5>
								</div>
								
								<h6 class="text-center">private</h6>
								
								<script type="text/javascript">
									$(function() {
										$("#quiz1").click(function() {
											window.location.href = "/TI_Projekt_Quiz/";
										});
									});
								</script>
								
								
							</div>
						</a>
						
							<a class="btn btn-fix text-left mx-auto " id="quiz1">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title text-center">Quiz name</h5>
								</div>
								
								<h6 class="text-center">private</h6>
								
								<script type="text/javascript">
									$(function() {
										$("#quiz1").click(function() {
											window.location.href = "/TI_Projekt_Quiz/";
										});
									});
								</script>
								
								
							</div>
						</a>
						
						<a class="btn btn-fix text-left mx-auto " id="quiz1">		
							<div class="card text-white bg-success mb-3 float-center">
								<div class="card-body">
									<h5 class="card-title text-center">Quiz name</h5>
								</div>
								
								<h6 class="text-center">private</h6>
								
								<script type="text/javascript">
									$(function() {
										$("#quiz1").click(function() {
											window.location.href = "/TI_Projekt_Quiz/";
										});
									});
								</script>
								
								
							</div>
						</a>																													
					</div>							
				</div>	
			</div>			
		</div>		
	</div>
</div>
	
	
	
	
</body>
</html>