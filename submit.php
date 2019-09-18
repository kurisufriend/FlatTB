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
$body = htmlspecialchars($body); // clean up body
$latest = $body; // ew
$tripcode = $_POST['trip'];
$board = $_POST['board'];

// get/generate other variables
$postid = get_postid();
$timestamp = date("m/j/Y(D)G:i:s");
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
$subject = str_replace(' ', '&_', $subject);
// sanitize the body for csv (we'll re-replace these after)
$body = str_replace(',', '&comma', $body);
$body = preg_replace("/\r\n|\r|\n/", '<br/>', $body);
// create post directory and index.php
// if board directory does not exist and is in approved_boards, make new board directory
if (!is_dir("content/" . $board) and in_array($board, $approved_boards)) {
    mkdir("content/" . $board);
}
// make thread directory if it does not already exist
if (!is_dir("content/" . $board . "/" . $subject)) {
    $op = true;
    mkdir("content/" . $board . "/" . $subject);
    file_put_contents("content/" . $board . "/" . $subject . "/index.php", ""); // create file with nothing in
    file_put_contents("content/" . $board . "/" . $subject . "/threadinfo.csv", "");
    file_put_contents("content/" . $board . "/" . $subject . "/index.php",file_get_contents("templates/post.php"), FILE_APPEND); // the file_get_contents is a hack, but it's probably better than include
}
// if poster is OP then add to csv
if ($op == true) {
    file_put_contents("content/" . $board . "/" . $subject . "/threadinfo.csv","op," . $subject . "," . $name . "," . $tripcode . "," . $timestamp . "," . $postid . "," . $body . "\n", FILE_APPEND); // format is type, title, name, trip, date, id, body
}
else {
    file_put_contents("content/" . $board . "/" . $subject . "/threadinfo.csv","reply," . $subject . "," . $name . "," . $tripcode . "," . $timestamp . "," . $postid . "," . $body . "\n", FILE_APPEND);
}
// update latest
file_put_contents("data/latest", $latest);
increment_postid();
// redirect to thread and die
header("Location: " . $root . "content/" . $board . "/" . $subject);
die();
?>