<?php

    session_start();

    if(!isset($_SESSION['logged_admin'])) 
    { 
        header('Location: index.php');
        exit(); 
    }
    include('includes/header.php'); 

?>

    <div class="row justify-content-center" style="margin-top:5%"> 
        <div class="col-3">
            <div style="text-align:center">Witaj <?php echo $_SESSION['first_name'] ?>!<br><br></div>
            <table class="table align-middle table-striped">
                <tr>
                    <th scope="row">Twoje imię:</th>
                    <td><?php echo $_SESSION['first_name']?></td>
                </tr>
                <tr>
                    <th scope="row">Twoje nazwisko:</th>
                    <td><?php echo $_SESSION['last_name']?></td>
                </tr>
                <tr>
                    <th scope="row">Twój email:</th>
                    <td><?php echo $_SESSION['email']?></td>
                </tr>
            </table>
        </div>
    </div>
      
</body>
</html>