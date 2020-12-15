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
        $emailB = filter_var($email,FILTER_SANITIZIE_EMAIL);

        if( (filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB != $email) )
        {
            $data_ok = false;
            $_SESSION['error_email'] = "Invalid Email";
            $email_ok = false;
        }

        /* check password */
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

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
    }
    else
    {

    }

?>