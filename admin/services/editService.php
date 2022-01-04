<?php

    session_start();

    if(!isset($_SESSION['logged_admin'])) 
    { 
        header('Location: ../index.php');
        exit(); 
    }
    include('../includes/header.php');

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
            if($result = @$connection->query(
                sprintf("SELECT * FROM services WHERE id = ".$_GET['id'])))
            {
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo"<div='container'>
                                <div class='row justify-content-center'>
                                    <div class='col-4'>
                                    <h3>Edycja wybranej usługi</h3>
                                        <form method='post'>
                                            <div class='mb-3'>
                                                <label for='idInput' class='form-label'>Nr id:</label>
                                                <input type='text' class='form-control' name='id' id='idInput' value='".$row['id']."'  disabled>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='service_name_input' class='form-label'>Nazwa usługi:</label>
                                                <input type='text' class='form-control' minlength='3' maxlength='254' name='service_name' id='service_name_input' value='".$row['service_name']."'>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='service_price_input' class='form-label'>Cena usługi w pln:</label>
                                                <input type='number' class='form-control' min='1' max='10000' step='0.01' name='service_price' id='service_price_input' value='".$row['service_price']."'>
                                            </div>
                                            <button type='submit' class='btn btn-primary' name='update'>Zapisz zmiany</button>
                                            <button type='reset' class='btn btn-primary'>Wyczyść zmiany</button>
                                        </form>
                                    </div>
                                </div>
                            </div>";
                                                  
                    }    
                }
                else
                {
                    echo "Brak danych do wyświetlenia";
                }
                
            }
            $result->free();
            if(isset($_POST['update']))
            {
                $service_name=$_POST['service_name'];
                if(@$connection->query(
                    sprintf("UPDATE services SET
                    service_name = '$service_name',
                    service_price = ".$_POST['service_price']."
                    WHERE id = ".$_GET['id'])))
                    {
                        $_SESSION['updated'] = '</br><div style="text-align:center">
                        <span style="color:green">Dane zostały zmienione.</span></div>';
                        header('Location: showServices.php');
                        unset($service_name);
                        unset($_SESSION['error']);
                    }
                    else
                    {
                        $_SESSION['error'] = '</br><div style="text-align:center">
                        <span style="color:red">Dane nie zostały zmienione!</span></div>';
                    }

            }
        }       
        $connection->close();
    }
?>
</body>
</html>

