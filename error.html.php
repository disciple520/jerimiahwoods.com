<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Code Output</title>
    </head>
    <body>
        <p style="color:red;font-weight:800;">
        <?php
        echo $error;
        echo $ex->getMessage();
        ?>
        </p>
</html>
