<?php
include_once "data/config.php";
include_once "lib/sanitize.php";
$board = $_GET['board'];
$thread = $_GET['thread'];
if (!is_dir("content/" . $board . "/" . $thread)) {
    echo "Invalid Parameters";
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once "templates/head.php"; ?>
<meta http-equiv="Refresh" content="30">
</head>
<body>
<?php include_once "templates/header.php"; ?>
<?php
$info = array_map("str_getcsv", file("content/" . $board . "/" . $thread . "/threadinfo.csv"));
foreach ($info as $posts) {
    $posts[6] = csv_decode($posts[6]);
    $posts[2] = csv_decode($posts[2]);
    $posts[1] = csv_decode($posts[1]);
    $posts[1] = rawurldecode($posts[1]);
    if ($posts[0] == "op") {
        echo "<div id='op'><div id='" . $posts[5] . "'>
        <h1 class='center' id='header-subject'>" . $posts[1] . "</h1>
        <div id='banner'><b>" . $posts[2] . "</b><i>!" . $posts[3] . "</i>  " . $posts[4] . "  No." . $posts[5] . "<a id='report' href='localhost/report.php?id=" . $posts[5] . "'>Report</a><br></div>
        <hr>
        " . $posts[6] . "
    </div></div>";
    }
    elseif ($posts[0] == "reply") {
        echo "<div id='post'><div id='" . $posts[5] . "'>
        <div id='banner'><b>" . $posts[2] . "</b><i>!" . $posts[3] . "</i>  " . $posts[4] . "  No." . $posts[5] . "<a id='report' href='localhost/report.php?id=" . $posts[5] . "'>Report</a><br></div>
        <hr>
        " . $posts[6] . "
    </div></div>";
    }
}
?>
</body>
</html>