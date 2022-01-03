<?php

    session_start();

    if(!isset($_SESSION['logged'])) 
    { 
        header('Location: index.php');
        exit(); 
    }
    include('includes/header.php'); 

?>

<h1>Tu będzie lista rezerwacji</h1>
</body>
</html>