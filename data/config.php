<?php
/* user defined */
$title = "FlatTB"; // the site title
$root = "http://localhost" . "/"; // the root web directory (the directory containing index.php) without trailing slash. used for making links.
$salt = "l34jb5hn23nji4r"; // something nice and random for generating tripcodes
$ph = "002c75c20f1ce0c8e54f032b92c1bbe27ab88a427dfed5f972638b04e3d01ad8"; // salted and hashed password. default is "admin"
/* generated */
// generate approved boards via the all-powerful CSV file
$approved_boards = [];
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
foreach ($boards as $lines) {
    array_push($approved_boards,$lines[0]); // push the first entry in the line to the end of our array
}
?>