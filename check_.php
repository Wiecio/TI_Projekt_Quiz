<?php
if(/*$_SERVER['REQUEST_METHOD'] == 'POST'*/true)
{
    if(isset($_POST['check']))
    {
        
    }
    else if(isset($_POST['next']))
    {

    }
    else
    {
        require_once "db_connect.php";
        $tab_name = "flash2_1";
        try
        {
            $_SESSION['countf'] = 0;
            $conn  = new mysqli($host,$db_user,$db_password,$db_name);
            if($conn->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            $_SESSION['tab_flash'] = array();
            $sql = "SELECT * FROM $tab_name";
            $r = $conn->query($sql);
            $i=0;
            while($w = $r->fetch_assoc())
            {
                $_SESSION['tab_flash'][$i][0] = $w['first_p'];
                $_SESSION['tab_flash'][$i][1] = $w['second_p']; 
                $i++;
            }
            $_SESSION['max'] = $i-1;
            $_SESSION['loadf'] = true;
            $conn->close();
                
                
        }
        catch(Exception $e)
        {

        }
        for($i=0;$i<$_SESSION['max'];$i++)
        {

        }
    }
    
}