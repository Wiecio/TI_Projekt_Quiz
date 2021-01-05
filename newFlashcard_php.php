<?php
session_start();
if(!isset($_SESSION['log_in']) || (!isset($_SESSION['flash_name'])) || (!isset($_SESSION['flash_progres'])))
{
	header("Location: index.php");
	exit();
}
if(isset($_POST['Finish']) || isset($_POST['Next']))
{
    require_once "functions_PHP.php";
    if(!isset($_SESSION['flash_count']))
    {
        $_SESSION['flash_count'] = 0;
        $_SESSION['tab_flash'] = array();
    }
    if(isset($_POST['front'])) 
    {
        $front = $_POST['front'];
        if(empty($front))
        {
            if(isset($_POST['Finish']) &&  $_SESSION['flash_count']>0)
            {
                header("Location: addFlash.php");
                exit();
            }
            $_SESSION['empty_flash'] = "You can't leave empty filed!";
            header("Location: newFlashcard.php");
            exit();
            
        }
    }
    if(isset($_POST['back'])) 
    {
        $back = $_POST['back'];
        if(empty($back))
        {
            if(isset($_POST['Finish']) &&  $_SESSION['flash_count']>0)
            {
                header("Location: addFlash.php");
                exit();
            }
            $_SESSION['empty_flash'] = "You can't leave empty filed!";
            header("Location: newFlashcard.php");
            exit();
        }
        
       
    }
    /*if(!Check_name_quiz($front) || !Check_name_quiz($back))
    {
         $_SESSION['bad_name'] = "The given name contains illegal characters, the name may only contain letters and spaces";
         header("Location: newFlashcard.php");
         exit();
    }*/
    $_SESSION['tab_flash'][$_SESSION['flash_count']][0] = $front;
    $_SESSION['tab_flash'][$_SESSION['flash_count']][1] = $back;
    $_SESSION['flash_count']++;
    if(isset($_POST['Next']))
    {
        header("Location: newFlashcard.php");
    }
    if(isset($_POST['Finish']) &&  $_SESSION['flash_count']>0)
    {
        header("Location: addFlash.php");
    }

    

}

?>