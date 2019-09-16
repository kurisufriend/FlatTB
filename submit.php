<?php
/*********************

        FlatTB

*********************/

include_once "data/config.php";
include_once "lib/tripcode.php";
include_once "lib/postid.php";

// get POST data
$name = $_POST['name'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$tripcode = $_POST['trip'];
$board = $_POST['board'];

// get/generate other variables
$postid = get_postid();
$timestamp = date("m") . "/" . date("j") . "/" . date("Y") . "(" . date("D") . ")" . date("g") . ":" . date("i") . ":" . date("s");
$approved_boards = ["b", "sudo", "req"];
$op = false;

// hash our tripcode
if (!$tripcode == "") {
    $tripcode = tripcode($tripcode, $salt);
    $tripcode = pretty_tripcode($tripcode);
}
// set name to Anonymous if not provided one already
if ($name == "") {
    $name = "Anonymous";
}
// make sure the "subject" entry was filled
if ($subject == "") {
    die(); // kill the script; replace with suitable error message later
}
// filter bad characters from $subject
$subject = str_replace('\\', '', $subject);
$subject = str_replace('/', '', $subject);
$subject = str_replace('#', '', $subject);
$subject = str_replace('&', '', $subject);
$subject = str_replace('"', '', $subject);
$subject = str_replace('\'', '', $subject);
$subject = str_replace('>', '', $subject);
$subject = str_replace('<', '', $subject);
$subject = str_replace(' ', '_', $subject);
// create post directory and index.php
// if board directory does not exist and is in approved_boards, make new board directory
if (!is_dir("content/" . $board) and in_array($board, $approved_boards)) {
    mkdir("content/" . $board);
}
// make thread directory if it does not already exist
if (!is_dir("content/" . $board . "/" . $subject)) {
    mkdir("content/" . $board . "/" . $subject);
    file_put_contents("content/" . $board . "/" . $subject . "/index.php", ""); // create file with nothing in
    $op = true;
}
// if poster is OP then setup file
if ($op == true) {
    file_put_contents(("content/" . $board . "/" . $subject . "/index.php"),"<?php include \"templates/post_top.php\";?>", FILE_APPEND);
}
?>