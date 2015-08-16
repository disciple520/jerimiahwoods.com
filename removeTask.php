<?php

require 'dbConnect.php';

try {
    if ($_GET['action'] == "delete") {
        $insertStatement = $pdo->prepare("DELETE FROM Tasks WHERE id=:taskID");
    } else {
        $insertStatement = $pdo->prepare("UPDATE Tasks SET status = 1 WHERE id=:taskID");
    }
    $insertStatement->bindParam(':taskID', $_GET['taskID']);
    $insertStatement->execute();
} catch(PDOException $ex) {
    $error = "Unable to remove task";

    include 'error.html.php';
    exit();
}
header("Location: todoapp.php");
?>
