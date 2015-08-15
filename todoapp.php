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
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            Add a Task<br>
            <input type="text" name="newTask" size="50">
            <button type="submit" name="addTaskButton">Add</button><br><br>
        </form>
        
        <div id="taskList">
        
        <?php
            require 'dbConnect.php';
            
            if (isset($_POST['addTaskButton'])) {
                $insertStatement = "INSERT INTO Tasks (task, status)
                VALUES ('$_POST[newTask]', 0)";
                
                if ($conn->query($insertStatement) !== TRUE) {
                    echo "Error: " . $insertStatement . "<br>" . $conn->error;
                }

            }
            
            $sql = "SELECT id, task, status FROM Tasks";
            $allTasks = $pdo->query($sql);

            while ($row = $allTasks->fetch()) {
                echo $row["task"] . ": " . $row["status"]. "<br>";
            }
        ?>
        </div>
    </body>
</html>
