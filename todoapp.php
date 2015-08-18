<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>To Do App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/todoapp.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="content">
            <div id="header" class="center">
                <form id="add_task_form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="text" id= "newTaskField" name="newTaskField" size="30" maxlength="60" autofocus="true" autocomplete="false">
                    <button id="add_button" type="submit" name="addTaskButton">Add Task</button>
                </form>
            </div> <!-- end of header div -->
          <hr>
          <div id="page_content">
            <div class="row">
              <div class="col-md-2 heading">
                To Do
              </div> <!-- end of heading div -->
              <div class="col-md-8" id="task_div">
                  <table id="task_table">
                    </tr>
                        <?php
                            require 'dbConnect.php';

                            if (isset($_POST['addTaskButton'])) {
                                $insertStatement = $pdo->prepare("INSERT INTO Tasks (task) VALUES (:newTask)");
                                $insertStatement->bindParam(':newTask', strip_tags($_POST['newTaskField']), PDO::PARAM_STR, 60);
                                $insertStatement->execute();
                            }

                            try {
                                $sql = "SELECT id, task, status FROM Tasks WHERE status=0";
                                $toDoTasks = $pdo->query($sql);
                            } catch(PDOException $ex) {
                                $error = "Unable to retrieve tasks";

                                include 'error.html.php';
                                exit();
                            }

                            while ($task = $toDoTasks->fetch()) {
                                echo "<tr><td id='checkmark_cell'><a href=\"removeTask.php?taskID=" . $task['id'] . "&action=complete\"><img src='img/green_checkmark.png' width='16' height='16' border='0'></a></td>";
                                echo "<td>" . $task['task'] . "</td>";
                                echo "<td><a href=\"removeTask.php?taskID=" . $task['id'] . "&action=delete\"><img src='img/red_x.png' width='16' height='16' border='0'></a></td></tr>";
                            }
                        ?>
                  </table>
              </div> <!-- end of feedback div -->
              <div class="col-md-2 heading">
              </div> <!-- end of heading div -->
            </div> <!-- end of row div -->
            <hr>
            <div class="row">
              <div class="col-md-2 heading">
                Completed Tasks
              </div> <!-- end of heading div -->
              <div class="col-md-8" id="completed_tasks">
                  <?php
                  try {
                      $sql = "SELECT id, task, status FROM Tasks WHERE status=1";
                      $completedTasks = $pdo->query($sql);
                  } catch (PDOException $ex) {
                      $error = "Unable to retrieve tasks";

                      include 'error.html.php';
                      exit();
                  }

                  while ($task = $completedTasks->fetch()) {
                      echo " - " . $task['task'];
                  }
                  ?>
              </div> <!-- end of feedback div -->
              <div class="col-md-2 heading">
              </div> <!-- end of heading div -->
            </div> <!-- end of row div -->
          </div> <!-- end of page_content div -->
          <hr>
          <footer>
            <p>Site designed by Jerry Woods 2015</p>
          </footer>
        </div> <!-- end of content div -->
        
        
          
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/todoapp.js"></script>

        <!-- Google Analytics: -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-63553555-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
