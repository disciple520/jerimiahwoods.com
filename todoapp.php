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
            <button type="submit" name="addTask">Add</button><br><br>
        </form>
        
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
            print ("Hello<br><br>");
            
            if (isset($_POST['addTask'])) {
                print ("You got here by clicking Add<br><br>");
                $insertStatement = "INSERT INTO Tasks (task, status)
                VALUES ('$_POST[newTask]', 0)";
                
                if ($conn->query($insertStatement) === TRUE) {
                    echo "New record created successfully<br>";
                } else {
                    echo "Error: " . $insertStatement . "<br>" . $conn->error;
                }

                header('Location: todoapp.php');
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
