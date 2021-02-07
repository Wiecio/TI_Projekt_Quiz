<?php
session_start();
if(isset($_POST['flash_code']))
{
    $code = $_POST['flash_code'];
    $id_u = substr($code,5,strlen($code));
    $tab_name = "nameflash_".$id_u;
   // echo "Tabname: ".$tab_name;
   // echo "<br>";
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
            header("Location: writeCodeF.php");
            exit();
        }
        $w = $r->fetch_assoc();
        $id_flash = $w['id_flash'];
        $_SESSION['flash'] = "flash".$id_flash."_".$id_u;
        $_SESSION['id_flash'] = $id_flash;
        //echo "quize: ". $_SESSION['flash'];
        $conn->close();
        header("Location: flashcard.php");
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