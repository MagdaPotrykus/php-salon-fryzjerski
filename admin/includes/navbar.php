
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Panel Administracyjny</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/php-salon-fryzjerski/admin/reservations/showReservations.php">Rezerwacje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-salon-fryzjerski/admin/services/showServices.php">Dostępne usługi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-salon-fryzjerski/admin/customers/showCustomers.php">Lista klientów</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-salon-fryzjerski/admin/info.php">Twoje dane</a>
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