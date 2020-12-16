<?php 
session_start();
if(isset($_SESSION['log_in']))
{
        session_unset(); // usuwa zmienne sesyjne czyli dla wylogowania
        $_SESSION['logout'] = "You logged out!";
        header('Location: index.php');
}
else
{

    header('Location: index.php');

}
?>