<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error Code Output</title>
    </head>
    <body>
        <p style="color:red;font-weight:800;">
            <?php
            echo $error . "---" . $ex->getMessage();
            ?>
        </p>
        <p>If this problem persists, please don't hesitate to contact support</p>
</html>
