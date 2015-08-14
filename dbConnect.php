<?php

$servername = "localhost";
$username = "jerixigx_user";
$password = "myPW!";
$dbname = "jerixigx_ToDoDB";
$dbname = "ToDoDB";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    
} catch (Exception $ex) {
    $error = "Unable to connect to the database. ";
    
    include 'error.html.php';
    exit();
}

