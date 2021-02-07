<?php
session_start();

if( !isset($_SESSION['log_in']) || !isset($_SESSION['quizInProgress']) )
{
    header('Location: index.php');
    exit();
}
require_once "db_connect.php";

try
{
    $conn  = new mysqli($host,$db_user,$db_password,$db_name);
    if($conn->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    if(!$conn->query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE")) throw new exception($conn->error);
    $conn->begin_transaction();

    /* get current id_quiz */
    $sql_quiz_id = "SELECT * FROM quiz_user WHERE id_user = ?";
    $st_quiz_id = $conn->prepare($sql_quiz_id);
    $st_quiz_id->bind_param("i",$_SESSION['user_id']);
    if(!$st_quiz_id->execute())
    {
        throw new Exception("st_quiz_id");
    }
    $r = $st_quiz_id->get_result();
    $w = $r->fetch_assoc();
    $id_quiz = $w['number_quiz'];
    $corr_id_quiz = $id_quiz +1;
    $st_quiz_id->close();

    /* update current id_quiz */
    $sql_up_id = "UPDATE quiz_user SET number_quiz=? WHERE id_user=?";
    $st_up_id = $conn->prepare($sql_up_id);
    $st_up_id->bind_param("ii",$corr_id_quiz,$_SESSION['user_id']);
    if(!$st_up_id->execute())
    {
        throw new Exception("st_up_id");
    }
    $st_up_id->close();

    /* Add name of quiz */
    $name_tab = "namequiz_".$_SESSION['user_id'];
    $sql_add = "INSERT INTO $name_tab VALUES(?,?,?,'')";
    $st_add = $conn->prepare($sql_add);
    $st_add->bind_param("isi",$corr_id_quiz,$_SESSION['quiz_name'],$_SESSION['is_public']);
    if(!$st_add->execute())
    {
        throw new Exception("st_add");
    }

    /*Create Table QuizX_Y*/
    $name_table = "quiz".$corr_id_quiz."_".$_SESSION['user_id'];
    $sql_table = "CREATE TABLE $name_table (id_question INT(11) NOT NULL PRIMARY KEY, question text NOT NULL, answers text NOT NULL)";
    $r = $conn->query($sql_table);
    if(!$r) throw new Exception($conn->error);

    /* Add answers and questions */
    $id_question = 1;
    for($i=0; $i<$_SESSION['quest_count'];$i++)
    {
        $answers= "";
        for($j=0;$j<count($_SESSION['answers'][$i]);$j++)
        {
            $answers = $answers."|".$_SESSION['answers'][$i][$j];
        }
        $sql_addq = "INSERT INTO $name_table VALUES(?,?,?)";
        $st_addq = $conn->prepare($sql_addq);
        $st_addq->bind_param("iss",$id_question,$_SESSION['questions'][$i],$answers);
        if(!$st_addq->execute())
        {
            throw new Exception("st_addq");
        }
        $st_addq->close();
        $id_question++;

    }
    if(!$conn->commit())
    {
        throw new Exception("commit");
    }
    $conn->autocommit(true);
    $conn->close();
    $_SESSION['good_ADD'] = "Your quiz was added!";
    unset($_SESSION['quizInProgress']);
    unset($_SESSION['answers']);
    unset($_SESSION['questions']);
    unset($_SESSION['quest_count']);
    unset($_SESSION['quiz_name']);
    if(isset($_SESSION['quest_add']))
    {
        unset($_SESSION['quest_add']);
    }
    if(isset($_SESSION['bad_quest']))
    {
        unset($_SESSION['bad_quest']);
    }
    header("Location: index.php");
    
}
catch(Exception $e)
{
    $conn->rollback();
    $conn->close();
    $_SESSION['error_conn'] = "Sorry we have problems with servers, please check out website in another time :(";
    //echo $e;
    header("Location: index.php ");
    exit();
}

?>