<?php
    session_start();
	if(isset($_SESSION['log_in']))
	{
		header("Location: index.php");
		exit();
	} 
	if(isset($_POST['email']))
	{
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            require_once "db_connect.php";
            // mysqli_report(MYSQLI_REPORT_STRICT);
            try
            {
                $conn  = new mysqli($host,$db_user,$db_password,$db_name);
                if($conn->connect_errno!=0)
                {
                    throw new exception(mysqli_connect_errno());
                }
                $sql_email = "SELECT * FROM users WHERE email = ?";
                $st_email = $conn->prepare($sql_email);
                $st_email->bind_param("s",$email);
                if(!$st_email->execute())
                {
                    throw new exception("st_email_error");
                }
                $r = $st_email->get_result();
                $w = $r->fetch_assoc();
                $number_email = $r->num_rows;
                if($number_email == 1 && $w['verified'] == true && password_verify($pass,$w['haslo']))
                {
                    $_SESSION['log_in'] = true;
                    $_SESSION['log_in_info'] = "You logged in!";
                    $_SESSION['user_id'] = $w['id_user'];
                    header("Location: index.php");
                    exit();
                }
                else
                {
                    if($w['verified'] == false && $number_email == 1)
                    {
                        $_SESSION['log_in_error'] = "You must verify your account on email!";
                    }
                    else
                    {
                        $_SESSION['log_in_error'] = "Email or password are not correct";
                    }
                    $st_email->close();
                    $conn->close();
                    header("Location: login.php");
                    exit();
                }

            }
            catch(exception $e)
            {
                $st_email->close();
                $conn->close();
                $_SESSION['error_conn'] = "Sorry we have problems with servers, please check out website in another time :(";
            }
    }
    else
    {
        header("Location: index.php");
    }



?>