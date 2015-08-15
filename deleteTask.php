<?php

require 'dbConnect.php';

try {
    $insertStatement = $pdo->prepare("DELETE FROM Tasks WHERE id=:taskID");
    $insertStatement->bindParam(':taskID', $_GET['taskID']);
    $insertStatement->execute();
} catch(PDOException $ex) {
    $error = "Unable to retrieve tasks";

    include 'error.html.php';
    exit();
}
header("Location: todoapp.php");
?>
