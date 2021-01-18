<?php
session_start();
if(isset($_SESSION['flash_progres']))
{
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
    
        /* get current id_flash */
        $sql_flash_id = "SELECT * FROM flashcards_user WHERE id_user = ?";
        $st_flash_id = $conn->prepare($sql_flash_id);
        $st_flash_id->bind_param("i",$_SESSION['user_id']);
        if(!$st_flash_id->execute())
        {
            throw new Exception("st_quiz_id");
        }
        $r = $st_flash_id->get_result();
        $w = $r->fetch_assoc();
        $id_flash = $w['number_flash'];
        $corr_id_flash = $id_flash +1;
        $st_flash_id->close();
    
        /* update current number of flash */
        $sql_up_id = "UPDATE flashcards_user SET number_flash=? WHERE id_user=?";
        $st_up_id = $conn->prepare($sql_up_id);
        $st_up_id->bind_param("ii",$corr_id_flash,$_SESSION['user_id']);
        if(!$st_up_id->execute())
        {
            throw new Exception("st_up_id");
        }
        $st_up_id->close();

         /* Add name of flash */
        $name_tab = "nameflash_".$_SESSION['user_id'];
        $sql_add = "INSERT INTO $name_tab VALUES(?,?,?,'')";
        $st_add = $conn->prepare($sql_add);
        $st_add->bind_param("isi",$corr_id_flash,$_SESSION['flash_name'],$_SESSION['is_public']);
        if(!$st_add->execute())
        {
            throw new Exception($conn->error);
        }

        /*Create Table flashX_Y*/
        $name_table = "flash".$corr_id_flash."_".$_SESSION['user_id'];
        $sql_table = "CREATE TABLE $name_table (id_flash INT(11) NOT NULL PRIMARY KEY, first_p varchar(255) NOT NULL, second_p varchar(255) NOT NULL)";
        $r = $conn->query($sql_table);
        if(!$r) throw new Exception($conn->error);

        /* Add first and second side of flashcard */
        $id_flash = 1;
        for($i=0; $i<$_SESSION['flash_count'];$i++)
        {
            $front = $_SESSION['tab_flash'][$i][0];
            $back = $_SESSION['tab_flash'][$i][1];
            $sql = "INSERT INTO $name_table VALUES(?,?,?)";
            $st = $conn->prepare($sql);
            $st->bind_param("iss",$id_flash,$front,$back);
            if(!$st->execute())
            {
                throw new exception($conn->error);
            }
            $id_flash++;
        }
        if(!$conn->commit())
        {
            throw new Exception("commit");
        }
        $conn->autocommit(true);
        $conn->close();
        $_SESSION['good_ADD'] = "Your flashcards was added!";





        header("Location: index.php");

    }
    catch(Exception $e)
    {
        echo $e;
    }
}
else
{
    header("Location: index.php");
}

?>