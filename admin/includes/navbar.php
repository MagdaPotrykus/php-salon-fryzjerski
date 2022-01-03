
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Panel Administracyjny</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../admin/reservation.php">Rezerwacje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin/info.php">Twoje dane</a>
                </li>
            </ul>          
        </div>
    </div>
    <div class="navbar-collapse collapse justify-content-end">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <span class="navbar-text">
            <?php echo 'Zalogowany/-a jako ' . $_SESSION['first_name']?>
            </span>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary" href="../admin/logout.php" role="button">Wyloguj</a>
            </li>
        </ul>
    </div>
</nav>