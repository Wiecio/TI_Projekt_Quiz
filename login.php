
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Page</title>
<link rel="stylesheet" href="styles/basic_style.css">
</head>
<body>

<?php include 'header.php';?>
	<div class="container">
		<div class="card" style="margin-top: 1.5em;">
			<h2 class="card-header">Please Login</h2>
			<div class="card-body">
				<form action="login_script.php" method="post">
					<div class="form-div row ">
						<label for="email" class="col-12 col-sm-3 col-md-2 col-form-label">Email</label>
						<div class="col-12 col-sm-9 col-md-10 ">
							<input type="email" name="email" id="email" name="email" placeholder="example@gmail.com" required class="form-control" />
						</div> 
					</div>
					<div class="form-div row">
						<label for="pass" class="col-12 col-sm-3 col-md-2 col-form-label">Password</label>
						<div class="col-12 col-sm-9 col-md-10">
							<input type="password" id="pass" name="pass" placeholder="Password" required class="form-control" />
						</div> 
					</div>
					<?php if(isset($_SESSION['log_in_error'])) :?>
							<div class="color_alert"><?=$_SESSION['log_in_error']?> </div>
							<?php unset($_SESSION['log_in_error'])?>
					<?php endif; ?>
					<?php if(isset($_SESSION['log_in_info'])) :?>
							<div class="color_alert"><?=$_SESSION['log_in_info']?> </div>
							<?php unset($_SESSION['log_in_info'])?>
					<?php endif; ?>
					<div class="form-div row col-6" style="margin-top: 1.5em;">
						<button type="submit" class="btn btn-lg btn-primary col-6 align-self-center">Login</button>
					</div>
					
				</form>	
			
			</div>
		</div>
		
	</div>



</body>
</html>