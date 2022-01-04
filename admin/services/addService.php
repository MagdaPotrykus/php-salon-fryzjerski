<?php

    session_start();

    if(!isset($_SESSION['logged_admin'])) 
    { 
        header('Location: ../index.php');
        exit(); 
    }
    include('../includes/header.php'); 

    if(isset($_POST['add']))
    {
        require_once "../connection.php";

        $connection = @new mysqli($host, $db_user, $db_password, $db_name); 
        if($connection->connect_errno!=0)
        {
            echo "Error: ". $connection->connect_errno;
        }
        else
        {
            if(isset($_POST['service_name'])&& isset($_POST['service_price']))
            {
                $service_name=$_POST['service_name'];
                $service_price=$_POST['service_price'];
                if(@$connection->query(
                    sprintf("INSERT INTO services (service_name,service_price)
                    VALUES('$service_name','$service_price')")))
                    {
                        $_SESSION['updated'] = '</br><div style="text-align:center">
                        <span style="color:green">Dane zostały DODANE.</span></div>';
                        header('Location: showServices.php');
                        unset($service_name);
                        unset($_SESSION['error']);
                        unset($_POST['service_name']);
                        unset($_POST['service_price']);
                    }
                    else
                    {
                        echo 'bląd3';
                        $_SESSION['error'] = '</br><div style="text-align:center">
                        <span style="color:red">Dane nie zostały zmienione!</span></div>';
                    }

            }
        }       
        $connection->close();
    }
?>
<form method="post">
  <div class="form-group">
    <label for="service_name_input">Nazwa usługi</label>
    <input type="text" class="form-control" minlength='3' maxlength='254' name='service_name'id="service_name_input" placeholder="Wprowadź nazwę">
  </div>
  <div class="form-group">
    <label for="service_price_input">Cena usługi w pln:</label>
    <input type="number" class="form-control" min='1' max='10000' step='0.01' id="service_price_input" name='service_price' placeholder="Wprowadź cenę">
  </div>
  <button type="submit" class="btn btn-primary" name="add">Dodaj nową usługę</button>
</form>

</body>
</html>