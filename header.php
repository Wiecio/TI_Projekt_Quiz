
<body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
		crossorigin="anonymous"></script>

	<link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
		crossorigin="anonymous">
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
		crossorigin="anonymous"></script>

<!--Pasek Nawigacji -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/TI_Projekt_Quiz/index.php">Quizzzzzz</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarText" aria-controls="navbarText"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">

		<?php if(isset($_SESSION['log_in'])) :?>
			<div class="navbar-nav mr-auto">
				<div>
					<li class="nav-item active"><a class="nav-link"
						href="myQuizzes.php">My Quizzes<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="newQuiz.php">New Quiz<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="writeCode.php">Go to quiz using Code<span class="sr-only">(current)</span>
					</a></li>
				</div>
			</div>

			<div class="navbar-nav ml-auto">
				<button id="logoutBtn" 
					class=" btn btn-lg btn-danger float-right">Logout</button>
				<script type="text/javascript">
					$(function() {
						$("#logoutBtn").click(function() {
							window.location.href = "/TI_Projekt_Quiz/logout.php";
						});
					});
				</script>
			</div>
			
		<?php endif ;?>
		<?php if(!isset($_SESSION['log_in'])) :?>			
		<div class="navbar-nav mr-auto">
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="writeCode.php">Go to private quiz<span class="sr-only">(current)</span>
					</a></li>
				</div>
			</div>
			
			<div class="navbar-nav ml-lg-auto ml-sm-3">
				<div class="row">
				
				<div class="col-lg-auto mt-2 mt-lg-0">
					<button id="registerBtn" 
						class=" btn btn-lg btn-primary btn-block">Register</button>
					<script type="text/javascript">
						$(function() {
							$("#registerBtn").click(function() {
								window.location.href = "/TI_Projekt_Quiz/register.php";
							});
						});
					</script>
				</div>
				
				<div class="col-lg-auto mt-2 mt-lg-0 mr-lg-2">
					<button id="loginBtn" 
						class=" btn btn-lg btn-primary btn-block">Login</button>
					<script type="text/javascript">
						$(function() {
							$("#loginBtn").click(function() {
								window.location.href = "/TI_Projekt_Quiz/login.php";
							});
						});
					</script>
				</div>
				
				</div>
				
			</div>
		<?php endif ;?>
		</div>
	</nav>
	
</body>