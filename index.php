<!DOCTYPE html>
<html>
    <head>
<?php include "templates/head.php"; ?>
    </head>
    <body>
<?php include "templates/header.php"; ?><br>
        <div id="boards" class="infobox">
<b>Boards:</b><br><?php include "templates/boards.php"; ?>
        </div>
        <div id="latest" class="infobox">
<b>Latest Post:</b><br><?php $root = file_get_contents("data/latest");echo $root;?>
        </div>
    </body>
</html>