<?php

require_once "db_connect.php";
if(isset($_GET['vkey']))
{
    $polaczenie  = new mysqli($host,$db_user,$db_password,$db_name);
    $vkey = $_GET['vkey'];
    $vkey_t = htmlentities($vkey,ENT_QUOTES, "UTF-8");
    $vkey_t2 =  mysqli_real_escape_string($polaczenie,$vkey);
    $polaczenie->close();
    if($vkey != $vkey_t || $vkey != $vkey_t2)
    { 
        $info = "Coś poszło nie tak :/";
    }
    else
    {
        $polaczenie  = new mysqli($host,$db_user,$db_password,$db_name);
        try
        {
            if($polaczenie->connect_errno!=0)
            {
                    throw new exception(mysqli_connect_errno());
            }
            else
            {
                $sql = "SELECT verified, vkey FROM users WHERE verified=0 AND vkey='$vkey' LIMIT 1";
                $result = $polaczenie->query($sql);
                if($result->num_rows == 1)
                {
                    $update = $polaczenie->query("UPDATE users SET verified = 1 WHERE vkey='$vkey' LIMIT 1");
                    if($update)
                    {
                        $info =  "You have successfully verified your account, you can login now :)";
                        $polaczenie->close();
                    }
                    else
                    {
                        $polaczenie->close();
                        throw new exception($polaczenie->error);
                    }
                }
                else
                {
                    $polaczenie->close();
                    $info =  "The account does not exist or has already been verified";
                }
            }
        }
        catch(Exception $e)
        {
            $info = "Błąd serwera! Przepraszamy za niedogodności i prosimy o weryfikacje w innym terminie!";
        }
    }
}
else
{
    $info = "Something goes wrong :/";
}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quizzzzzz Main Page</title>
<link rel="stylesheet" href="styles/basic_style.css">
</head>
<body>

	<?php include 'header.php';?>
	<!--Zawartość -->
	
<div class="container" ><!--style="margin-top:1.5em;"-->
	<div class="row">
		
    <div class="info">
        <?php echo $info?>
        <div class="margines"><a href="login.php"> <button type="button" class="button_Log_in">Log in</button> </a></div>
    </div>
	
	</div>
</div>
	
</body>
</html>

