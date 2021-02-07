<?php
session_start();
if(!isset($_SESSION['log_in']) || !isset($_SESSION['id_delete']))
{
    header("Location: index.php");
    exit();
}
try
{
    require_once "db_connect.php";
    $conn  = new mysqli($host,$db_user,$db_password,$db_name);
    if(!$conn->query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE")) throw new exception($conn->error);
    $conn->begin_transaction();
    if($conn->connect_errno!=0)
    {
        throw new exception(mysqli_connect_errno());
    }
    $id_delete = substr($_SESSION['id_delete'],10,strlen($_SESSION['id_delete']));
    $id_user = $_SESSION['user_id'];
    $sql = "SELECT number_quiz FROM quiz_user WHERE id_user = $id_user";
    if(!$r = $conn->query($sql))
    {
        throw new Exception($conn->error);
    }
    $w = $r->fetch_assoc();
    $number_quiz = $w['number_quiz'];
    if($id_delete == 1)
    {
        $name_d = "quiz".$id_delete."_".$id_user;
        $sql_d = "DROP TABLE $name_d";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        for($i=1;$i<=$number_quiz-1;$i++)
        {
            $i2 = $i+1;
            $name_t = "quiz".$i2."_".$id_user;
            $name_t_new = "quiz".$i.'_'.$id_user;
            $sql_t = "ALTER TABLE $name_t RENAME TO $name_t_new";
            if(!$r = $conn->query($sql_t))
            {
                throw new Exception($conn->error);
            }
        }
        $tab_name = "namequiz_".$id_user;
        $sql_d = "DELETE FROM $tab_name WHERE id_quiz = $id_delete";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        for($i=1;$i<=$number_quiz-1;$i++)
        {
            $sql_up = "UPDATE $tab_name SET id_quiz = $i WHERE id_quiz = $i+1";
            if(!$r = $conn->query($sql_up))
            {
                throw new Exception($conn->error);
            }

        }
        $sql_q = "UPDATE quiz_user SET number_quiz = $number_quiz-1 WHERE id_user = $id_user";
        if(!$r = $conn->query($sql_q))
        {
            throw new Exception($conn->error);
        }
        $_SESSION['GOOD_DELETE'] = "You deleted quiz succesful.";
        $conn->close();
        header("Location: myQuizzes.php");
        exit();


    }
    else if( ($id_delete > 1) && ($id_delete < $number_quiz) ) 
    {
        $name_d = "quiz".$id_delete."_".$id_user;
        $sql_d = "DROP TABLE $name_d";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        for($i=$id_delete;$i<=$number_quiz-1;$i++)
        {
            $i2 = $i+1;
            $name_t = "quiz".$i2."_".$id_user;
            $name_t_new = "quiz".$i."_".$id_user;
            $sql_t = "ALTER TABLE $name_t RENAME TO $name_t_new";
            if(!$r = $conn->query($sql_t))
            {
                throw new Exception($conn->error);
            }
        }
        $tab_name = "namequiz_".$id_user;
        $sql_d = "DELETE FROM $tab_name WHERE id_quiz = $id_delete";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        for($i=$id_delete;$i<=$number_quiz-1;$i++)
        {
            $sql_up = "UPDATE $tab_name SET id_quiz = $i WHERE id_quiz = $i+1";
            if(!$r = $conn->query($sql_up))
            {
                throw new Exception($conn->error);
            }

        }
        $sql_q = "UPDATE quiz_user SET number_quiz = $number_quiz-1 WHERE id_user = $id_user";
        if(!$r = $conn->query($sql_q))
        {
            throw new Exception($conn->error);
        }
        $_SESSION['GOOD_DELETE'] = "You deleted quiz succesful.";
        $conn->close();
        header("Location: myQuizzes.php");
        exit();
    }
    else if($id_delete == $number_quiz)
    {
        $name_d = "quiz".$id_delete."_".$id_user;
        $sql_d = "DROP TABLE $name_d";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        $sql_q = "UPDATE quiz_user SET number_quiz = $number_quiz-1 WHERE id_user = $id_user";
        if(!$r = $conn->query($sql_q))
        {
            throw new Exception($conn->error);
        }
        $tab_name = "namequiz_".$id_user;
        $sql_d = "DELETE FROM $tab_name WHERE id_quiz = $id_delete";
        if(!$r = $conn->query($sql_d))
        {
            throw new Exception($conn->error);
        }
        $_SESSION['GOOD_DELETE'] = "You deleted quiz succesful.";
        $conn->close();
        header("Location: myQuizzes.php");
        exit();
    }
    
}
catch(Exception $e)
{
    $conn->rollback();
    $conn->close();
    //echo $e;
    $_SESSION['error_conn'] = "Sorry, we have problems with servers, please check out website in another time :(";
    header("Location: index.php");
}

?>