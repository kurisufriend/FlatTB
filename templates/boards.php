<?php
$root = file_get_contents("data/root") . "/";
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
foreach ($boards as $lines) {
    echo "<a href='" . $root . $lines[0] . "'>" . $lines[1] . "</a><br>";
}
?>