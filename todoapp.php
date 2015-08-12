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
        <?php
            echo '<p>Hello World</p>';
            
            $servername = "localhost";
            $username = "jerixigx_user";
            $password = "myPW!";
            $dbname = "jerixigx_ToDoDB";
            //$dbname = "ToDoDB";
            

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
    </body>
</html>
