<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>	



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
						href="writeCode.php">Use Quiz Code<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="newFlashcardSet.php">New Flashcard<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div>
					<li class="nav-item active"><a class="nav-link"
						href="myFlashcards.php">My Flashcards<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="writeCodeF.php">Use Flashcard Code<span class="sr-only">(current)</span>
					</a></li>
				</div>
			</div>
			

			<div class="navbar-nav ml-auto">
				<button id="logoutBtn" 
					class=" btn btn-danger float-right">Logout</button>
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
						href="writeCode.php">Use Quiz Code<span class="sr-only">(current)</span>
					</a></li>
				</div>
				<div >
					<li class="nav-item active"><a class="nav-link"
						href="writeCodeF.php">Use Flashcard Code<span class="sr-only">(current)</span>
					</a></li>
				</div>
			</div>
			
			<div class="navbar-nav ml-lg-auto ml-sm-3">
				<div class="row">
				
				<div class="col-lg-auto mt-2 mt-lg-0">
					<button id="registerBtn" 
						class=" btn btn-primary btn-block">Register</button>
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
						class=" btn btn-primary btn-block">Login</button>
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