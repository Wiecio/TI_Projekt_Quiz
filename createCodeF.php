<?php
session_start();
if(!isset($_SESSION['log_in']) || !isset($_SESSION['codef']))
{
    header("Location: index.php");
    exit();
}
$rand = mb_substr(md5(microtime()),rand(0,26),5,'UTF-8');
$rand = $rand.$_SESSION['user_id'];
$_SESSION['RAND'] = $rand;
$id_flash =  substr($_SESSION['flash'], -1);
try
{
    require_once "db_connect.php";
    $conn  = new mysqli($host,$db_user,$db_password,$db_name);
    if($conn->connect_errno!=0)
    {
        throw new exception(mysqli_connect_errno());
    }
    $tab_name = "nameflash_".$_SESSION['user_id'];
    $sql = "UPDATE $tab_name SET code_q = ? WHERE id_flash = ?";
    $st = $conn->prepare($sql);
    $st->bind_param("si",$rand,$id_flash);
    if(!$st->execute())
    {
        throw new Exception($conn->error);
    }
    $conn->close();
    header("Location: myFlashcards.php");
}
catch(Exception $e)
{
    echo $e;
}



unset($_SESSION['codef']);


?>