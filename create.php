<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;


$factory = (new Factory)
    ->withServiceAccount(__DIR__.'/firebase-secret/fir-notification-6ab85-ee6d4afa9106.json')  # Overwrite with your firebase credential
    ->withDatabaseUri('https://fir-notification-6ab85.firebaseio.com/');                       # put your Project Database URL properly
    

$dbname = 'Person';                         # replase with Table name Ex. Vechicle or USER
$database = $factory->createDatabase();     # Load databse URL Reference

$newPost = $database
    ->getReference('Person')
    ->push([
        'title' => 'Post title',
        'body' => 'This should probably be longer.'
    ]);

$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

$newPost->getChild('title')->set('Changed post title');
$data = $newPost->getValue(); // Fetches the data from the realtime database
//$newPost->remove();           # Remove That Item
echo 'Save data successfully';
