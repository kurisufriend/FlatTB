<?php
/* user defined */
$title = "FlatTB"; // the site title
$root = "http://localhost" . "/"; // the root web directory (the directory containing index.php) without trailing slash. used for making links.
$salt = "l34jb5hn23nji4r"; // something nice and random for generating tripcodes
/* generated */
// generate approved boards via the all-powerful CSV file
$approved_boards = [];
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
foreach ($boards as $lines) {
    array_push($approved_boards,$lines[0]); // push the first entry in the line to the end of our array
}
?>