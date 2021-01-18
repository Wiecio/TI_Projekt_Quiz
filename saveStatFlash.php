<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
if(isset($_POST['save_stat']))
{
    $id_flash = substr($_SESSION['flash'],5,strlen($_SESSION['flash']));
    if(isset($_POST['is_public']))
    {
        $state = true;
        require_once "db_connect.php";
        try
        {
                $conn  = new mysqli($host,$db_user,$db_password,$db_name);
                if($conn->connect_errno!=0)
                {
                    throw new Exception(mysqli_connect_errno());
                }
                $tab_name = "nameflash_".$_SESSION['user_id'];
                $sql = "UPDATE $tab_name SET is_public=? WHERE id_flash = ?";
                $st_s = $conn->prepare($sql);
                $st_s->bind_param("ii",$state,$id_flash);
                if(!$st_s->execute())
                {
                    throw new Exception("st_s");
                }
                $st_s->close();
                $conn->close();
                $_SESSION['change_saved'] = "Changes was saved!";
                header('Location: myFlashcards.php');
        }
        catch(Exception $e)
        {

        }
    }
    else
    {
        $state = false;
        require_once "db_connect.php";
        try
        {
                $conn  = new mysqli($host,$db_user,$db_password,$db_name);
                if($conn->connect_errno!=0)
                {
                    throw new Exception(mysqli_connect_errno());
                }
                $tab_name = "nameflash_".$_SESSION['user_id'];
                $sql = "UPDATE $tab_name SET is_public=? WHERE id_flash = ?";
                $st_s = $conn->prepare($sql);
                $st_s->bind_param("ii",$state,$id_flash);
                if(!$st_s->execute())
                {
                    throw new Exception("st_s");
                }
                $st_s->close();
                $conn->close();
                $_SESSION['change_saved'] = "Changes was saved!";
                header('Location: myFlashcards.php');
        }
        catch(Exception $e)
        {
            
        }
    }
}
else
{
    header("Location: index.php");
}
?>