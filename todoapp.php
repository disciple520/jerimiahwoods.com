<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <td>Add a Task</td>
                <td>
                    <input type="text" name="newTaskField" size="50">
                </td>
                <td>
                    <button type="submit" name="addTaskButton">Add</button>
                </td>
                </form>
            </tr>
            <tr><td><br></td></tr>
        
        <?php
            require 'dbConnect.php';
            
            if (isset($_POST['addTaskButton'])) {
                $insertStatement = $pdo->prepare("INSERT INTO Tasks (task) VALUES (:newTask)");
                $insertStatement->bindParam(':newTask', $_POST['newTaskField'], PDO::PARAM_STR, 60);
                $insertStatement->execute();
            }
            
            try {
                $sql = "SELECT id, task, status FROM Tasks";
                $allTasks = $pdo->query($sql);
            } catch(PDOException $ex) {
                $error = "Unable to retrieve tasks";
    
                include 'error.html.php';
                exit();
            }
            
            while ($task = $allTasks->fetch()) {
                
                echo "<tr><td>Complete</td>";
                echo "<td>" . $task['task'] . "</td>";
                echo "<td><a href=\"deleteTask.php?taskID=" . $task['id'] . "\">Delete</td></tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
