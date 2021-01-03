<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header("Location: index.php");
    exit();
}
//if($_SERVER['REQUEST_METHOD'] == 'POST')
//{
    $check = key($_POST);
    echo $check;
   // $id_quiz = mb_substr($check,9,mb_strlen($checkm,'UTF-8'),'UTF-8');
    //echo $id_quiz;
    //echo "jestem2";
//}


?>