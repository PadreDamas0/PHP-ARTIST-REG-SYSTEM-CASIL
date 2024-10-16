<?php
$host = "localhost";  
$user = "root"; 
$password = "";      
$dbname = "casil_music_label";  

$dsn = "mysql:host=$host;dbname=$dbname"; 
$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
?>
