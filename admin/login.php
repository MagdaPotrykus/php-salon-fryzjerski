<?php

    session_start();
    if((!isset($_POST['email'])) || (!isset($_POST['password'])) ) 
    { 
        header('Location: index.php');
        exit(); 
    } 

require_once "connection.php";

$connection = @new mysqli($host, $db_user, $db_password, $db_name); //@ operator kontroli bledow, nie wyswietla sie bledy

if($connection->connect_errno!=0)
{
    echo "Error: ". $connection->connect_errno;
}
else
{

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $email = htmlentities($email, ENT_QUOTES, "UTF-8");//sanityzacja kodu, ent takze cudzyslowie i apostrofy zamieniamy na encje
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    if($result = @$connection->query(
        sprintf("SELECT * FROM auth_admin WHERE email = '%s' AND password = '%s'",
        mysqli_real_escape_string($connection,$email),//zabezpiecza przed wstrzykiwaniem sql
        mysqli_real_escape_string($connection,$password))))
    {
        $numAdmins = $result->num_rows;
        if($numAdmins > 0)
        {
            $_SESSION['logged_admin'] = true;
            $row = $result->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            unset($_SESSION['error']);
            $result->close();//pozbywamy sie z pamieci obiektu result
            header('Location: reservations/showReservations.php');//header wysyła surowe nagłówki http
        }
        else
        {
            $_SESSION['error'] = '</br><div style="text-align:center">
            <span style="color:red">Nieprawidłowy login lub hasło!</span></div>';
            header('Location: index.php');
        }
        
    }

    $connection->close();
}

?>