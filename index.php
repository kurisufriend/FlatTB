<?php
$req = $_SERVER['REQUEST_URI'];
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
foreach ($boards as $lines) {
    if ($req == "/" . $lines[0]) {
        $board = $lines[0];
        include_once "templates/boardindex.php";
        die();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
<?php include "templates/head.php"; ?>
    </head>
    <body>
<?php include "templates/header.php"; ?><br>
        <div id="main-container">
            <div id="boards" class="infobox">
<b>Boards:</b><br><?php include "templates/boards.php"; ?>
            </div>
            <div id="catalog" class="infobox">
<b>Catalog:</b><br><?php include "templates/catalog.php";?>
            </div>
            <div id="latest" class="infobox">
<b>Latest Post:</b><br><?php $root = file_get_contents("data/latest");echo $root;?>
            </div>
        </div>
    </body>
</html>