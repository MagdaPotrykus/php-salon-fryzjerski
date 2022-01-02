<?php
if(isset($_SESSION['status'])){
    echo "<p class='alert alert-success'>".$_SESSION['status']."</p>";
    unset($_SESSION['status']);
}
?>

<form action="src/testDB.php" method="post">
    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group mb-3">
        <button name="save-name" class="btn btn-primary">Submit</button>
    </div>
</form>