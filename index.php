<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;


$factory = (new Factory)
    ->withServiceAccount(__DIR__.'/firebase-secret/fir-notification-6ab85-ee6d4afa9106.json')  # Overwrite with your firebase credential
    ->withDatabaseUri('https://fir-notification-6ab85.firebaseio.com/');                       # put your Project Database URL properly
    

$dbname = 'Person';                         # replase with Table name Ex. Vechicle or USER
$database = $factory->createDatabase();     # Load databse URL Reference

if ($database->getReference($dbname)->getSnapshot()) {

    $data = $database->getReference($dbname)->getValue();   # Get Values
    echo json_encode($data);        # Print value in UI

    echo '<br><br><hr><hr>';
    echo '<h1 style="color:red;">Load Data From Firebase.</h1>';
    echo '<hr><hr><br>';

    foreach($data as $item) {

        echo '<h3><span style="color:green;">Title: </span>'. $item['title'] .'</h3>';
        echo '<h3><span style="color:green;">Body: </span>'. $item['body'] .'</h3><hr>';
    }

} else {
     echo 'No Data Found';
}



