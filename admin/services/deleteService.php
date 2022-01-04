<?php

    session_start();

    if(!isset($_SESSION['logged_admin'])) 
    { 
        header('Location: ../index.php');
        exit(); 
    }

    if(isset($_GET['id']))
    {
        require_once "../connection.php";

        $connection = @new mysqli($host, $db_user, $db_password, $db_name); 
        if($connection->connect_errno!=0)
        {
            echo "Error: ". $connection->connect_errno;
        }
        else
        {
            if(@$connection->query(
                sprintf("DELETE FROM services WHERE id = ".$_GET['id'])))
            {
                echo "Usługa została usunięta";            
            }
            else
            {
                echo "Usługi nie udało się usunąć";
            }
        }     
        $connection->close();
    }
?>
