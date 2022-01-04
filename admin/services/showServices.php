<?php

    session_start();

    if(!isset($_SESSION['logged_admin'])) 
    { 
        header('Location: ../index.php');
        exit(); 
    }
    include('../includes/header.php'); 

    require_once "../connection.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name); 
    if($connection->connect_errno!=0)
    {
        echo "Error: ". $connection->connect_errno;
    }
    else
    {
        if($result = @$connection->query(
            sprintf("SELECT * FROM services")))
        {
            echo "<table class=\"table table-striped\">
            <thead class=\"table-dark\">
                <tr>
                    <th scope=\"col\">Id</th>
                    <th scope=\"col\">Nazwa usługi</th>
                    <th scope=\"col\">Cena usługi</th>
                    <th scope=\"col\">Akcje</th>
                </tr>
            </thead><tbody>";
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo"<tr>
                        <th scope=\"row\">". $row["id"]. "</td>
                        <td>" . $row["service_name"] . "</td>
                        <td>" . $row["service_price"] . " pln</td>
                        <td><a href='editService.php?id=".$row['id']."'>Edytuj</a>
                        <a href='deleteService.php?id=".$row['id']."'>Usuń</a>
                        </td>
                    </tr>";
                }    
                echo "</tbody></table><a class=\"btn btn-primary\" href=\"addService.php\" role=\"button\">Dodaj usługę</a>";
            }
            else
            {
                echo "Brak danych do wyświetlenia";
            }
            
        }
        $result->free();
        $connection->close();
    }
?>
</body>
</html>