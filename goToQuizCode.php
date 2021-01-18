<?php
session_start();
if(isset($_SESSION['flash']))
{
    unset($_SESSION['flash']);
    unset($_SESSION['loadf']);
    unset($_SESSION['tab_falsh']);
    unset($_SESSION['max']);
    unset($_SESSION['countf']);
}
if(isset($_SESSION['load']))
{
unset($_SESSION['quiz']);
unset($_SESSION['load']);
unset($_SESSION['I']);
unset($_SESSION['corrAns']);
unset($_SESSION['tab_q']);
unset($_SESSION['score']);
unset($_SESSION['tab_name']);
unset($_SESSION['load']);
unset($_SESSION['I']);
unset($_SESSION['corrAns']);
}
if(isset($_POST['quiz_code']))
{
    $code = $_POST['quiz_code'];
    $id_u = substr($code,5,strlen($code));
    $tab_name = "namequiz_".$id_u;
    //echo "Tabname: ".$tab_name;
    //echo "<br>";
    try
    {
        require_once "db_connect.php";
        $conn  = new mysqli($host,$db_user,$db_password,$db_name);
        if($conn->connect_errno!=0)
        {
            throw new exception(mysqli_connect_errno());
        } 
        $sql = "SELECT * FROM $tab_name WHERE code_q = '$code'";
        if(!$r = $conn->query($sql))
        {
            throw new Exception($conn->error);
        }
        $num = $r->num_rows;
        if($num == 0)
        {
            $_SESSION['bad_code'] = "Incorrect code!";
            $conn->close();
            header("Location: writeCode.php");
            exit();
        }
        $w = $r->fetch_assoc();
        $id_quiz = $w['id_quiz'];
        $_SESSION['quiz'] = "quiz".$id_quiz."_".$id_u;
        $_SESSION['id_quiz'] = $id_quiz;
       // echo "quize: ". $_SESSION['quiz'];
        $conn->close();
        header("Location: quiz.php");
    }
    catch(Exception $e)
    {
        echo $e;
    }    
}
else
{
    header("Location: index.php");
    exit();
}
?>