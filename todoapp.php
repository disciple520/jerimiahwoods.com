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
        <form>
            Add a Task<br>
            <input type="text" name="newTask" size="50">
        </form>
        <button type="submit" value="addTask" onclick="addTask()">Add</button><br><br>
        <div id="taskList">
        
        <script>
        function addTask() {
            var para = document.createElement("p");
            var node = document.createTextNode("Hello again, World!");
            para.appendChild(node);

            var element = document.getElementById("taskList");
            element.appendChild(para);
        }
        </script>
        
        
        <?php
            $servername = "localhost";
            $username = "jerixigx_user";
            $password = "myPW!";
            $dbname = "jerixigx_ToDoDB";
            $dbname = "ToDoDB";
            

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT id, task, status FROM Tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Task: " . $row["task"]. " - Status: " . $row["status"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            
        ?>
        </div>
    </body>
</html>
