<?php
    
    session_start();

    if((isset($_SESSION['logged'])) && ($_SESSION['logged'])==true)
    {
        header('Location: info.php');
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Panel Administracyjny</title>
</head>
<body>

<div class="row justify-content-center" style="text-align: center; margin-top:10%"> 
    <div class="col-3">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="emailInput" autofocus="autofocus" required="required">
            </div>
            <div class="mb-3">
                <label for="passInput" class="form-label">Hasło:</label>
                <input type="password" class="form-control" name="password" id="passInput" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
        </form>
    </div>
</div>

<?php
    if(isset($_SESSION['error']))
    {
        echo $_SESSION['error'];
    }
?>


        
</body>
</html>