<?php

require __DIR__.'/../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount(__DIR__.'/../config/php-zal-firebase-adminsdk-tt8pl-aa99fbe563.json')
    ->withDatabaseUri('https://php-zal-default-rtdb.europe-west1.firebasedatabase.app/');

$database = $factory->createDatabase();

?>