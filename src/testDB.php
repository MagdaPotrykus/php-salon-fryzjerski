<?php
session_start();
include(__DIR__.'/../config/dbcon.php');

if(isset($_POST['save-name'])){
    $name = $_POST['name'];

    $postData = [
        'name'=>$name
    ];

    $table ='users';
    $postRef_result = $database->getReference($table)->push($postData);

    if($postRef_result){
        $_SESSION['status'] = 'Name saved successuflly';
        header('Location: /index.php');
    }
    else{
        $_SESSION['status'] = 'Name not added';
        header('Location: /index.php');
    }
}
