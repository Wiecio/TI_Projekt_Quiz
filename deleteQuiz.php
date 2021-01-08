<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header("Location: index.php");
    exit();
}
$check = key($_POST);
echo $check;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
   // $id_quiz = mb_substr($check,9,mb_strlen($checkm,'UTF-8'),'UTF-8');
    //echo $id_quiz;
    //echo "jestem2";
}


?>