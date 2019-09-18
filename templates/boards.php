<?php
include_once "data/config";
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
foreach ($boards as $lines) {
    echo "<a href='" . $root . "content/" . $lines[0] . "'>" . $lines[1] . "</a><br>";
}
?>