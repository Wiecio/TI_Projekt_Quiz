<?php
    session_start();

    if(isset($_SESSION['log_in']))
    {
        header("Location: index.php");
        exit();
    }


    if(isset($_POST['email']))
    {
        /* flags */
        $data_ok = true;
        $email_ok = true;

        /* check email */
        $email = $_POST['email'];
        /*$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);

        if( (filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB != $email) )
        {
            $data_ok = false;
            $_SESSION['error_email'] = "Invalid Email";
            $email_ok = false;
        }*/
		$nick = $_POST['nick'];
        /* check password */
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
		$pass_hash = password_hash($pass1,PASSWORD_DEFAULT);
        if( (strlen($pass1)<8) || (strlen($pass1)>20))
        {
            $data_ok = false;
            $_SESSION['error_pass'] = "Password must have minimum 8, max 20 characters";
        }
        if($pass1!=$pass2)
        {
            $data_ok = false;
            $_SESSION['error_pass'] = "Passwords are not the same";
        }
			if($email_ok == true)
			{
				require_once "db_connect.php";
				try
				{
					$conn = new mysqli($host,$db_user,$db_password,$db_name);
					if(!$conn->query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE")) throw new exception($conn->error);
					$conn->begin_transaction();
					if($conn->connect_errno!=0)
					{
						throw new Exception(mysqli_connect_errno());
					}
					/* check if is email*/
					$sql_check_email = "SELECT email FROM users WHERE email = ?";
					$st_check_email = $conn->prepare($sql_check_email);
					$st_check_email->bind_param("s",$email);

					if(!$st_check_email->execute()) 
					{
						$st_check_email->close();
						throw new Exception($st_check_email->error);
					}

					$r = $st_check_email->get_result();
					$number_email = $r->num_rows;

					if($number_email == 1)
					{
						$_SESSION['error_email'] = "Account with that email acctualy exsist";
						$data_ok = false;
						$st_check_email->close();
						$conn->close();
					}
				}
				catch(Exception $e)
				{
					$conn->rollback();
					$conn->close();
					$_SESSION['error_conn'] = "Sorry we have problems with servers, please check out website in another time :(";
					
				}
			}
			if($data_ok == true)
			{
				try
				{
					$conn = new mysqli($host,$db_user,$db_password,$db_name);
					if(!$conn->query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE")) throw new exception($polaczenie->error);
                	$conn->begin_transaction();
					if($conn->connect_errno!=0)
					{
						throw new Exception(mysqli_connect_errno());
					}
					$sql = "INSERT INTO users VALUES(NULL,?,?,?,'',false)";
					$st = $conn->prepare($sql);
					$st->bind_param("sss",$nick,$email,$pass_hash);
					if(!$st->execute()) 
					{
						$st->close();
						throw new Exception($st_check_email->error);
					}
					$conn->commit();
					$conn->close();
					$_SESSION['good_register'] = "You are now registered, check your email to verify your account";
				}
				catch(Exception $e)
				{
					$conn->rollback();
					$conn->close();
					$_SESSION['error_conn'] = "Sorry we have problems with servers, please check out website in another time :(";
					
				}
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register Page</title>
</head>
<body>

<?php include 'header.php';?>




	<div class="container">
		<div class="card" style="margin-top: 1.5em;">
			<h2 class="card-header">Create New Account</h2>
			<div class="card-body">
				<form action="" method="post">
									
					<label for="name" class="col-12 col-sm-3 col-md-2 col-form-label">Nick:</label>
					<div class="col-12 col-sm-9 col-md-10">
						<input type="text" name="nick" placeholder="nick" required class="form-control"/><br>
					</div>
					<label for="email" class="col-12 col-sm-3 col-md-2 col-form-label">Email:</label>
					<div class="col-12 col-sm-9 col-md-10">
						<input type="email" name="email" placeholder="example@gmail.com" required class="form-control"/><br>
					</div>
					<label for="password" class="col-12 col-form-label">Password:</label>
					<div class="col-12">
						<input type="password" name="pass1" placeholder="password" required class="form-control"/><br>
						<?php if(isset($_SESSION['error_pass'])): ?>

                                <div><?=$_SESSION['error_pass']?></div>

                                <?php unset($_SESSION['error_pass'])?>

                        <?php endif; ?>
					</div>
					<label for="confirmPassword" class="col-12 col-form-label">Confirm Password:</label>
					<div class="col-12">
						<input type="password" name="pass2" placeholder="confirm password" class="form-control" required id="confirmPassword"/><br>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-lg btn-primary" >Register</button>
					</div>
					

				</form>
				<?php if(isset($_SESSION['good_register'])): ?>
						<div><?=$_SESSION['good_register']?></div>
						<?php unset($_SESSION['good_register'])?>
				 <?php endif; ?>
				 
				 <?php if(isset($_SESSION['error_conn'])): ?>
						<div><?=$_SESSION['error_conn']?></div>
						<?php unset($_SESSION['error_conn'])?>
				 <?php endif; ?>

				 <?php if(isset($_SESSION['error_email'])): ?>
                                <div><?=$_SESSION['error_email']?></div>
                                <?php unset($_SESSION['error_email'])?>
				 <?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>