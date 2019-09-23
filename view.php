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
</head>
<body>
<?php include_once "templates/header.php"; ?>
<?php
$info = array_map("str_getcsv", file("content/" . $board . "/" . $thread . "/threadinfo.csv"));
foreach ($info as $posts) {
    $posts[6] = str_replace('&comma', ',', $posts[6]);
    $posts[2] = str_replace('&comma', ',', $posts[2]);
    $posts[1] = str_replace('&comma', ',', $posts[1]);
    if ($posts[0] == "op") {
        echo "<div id='op'>
        <h1 class='center'>" . $posts[1] . "</h1>
        <div id='banner'><b>" . $posts[2] . "</b>!" . $posts[3] . "  " . $posts[4] . "  No." . $posts[5] . "<a id='report' href='localhost/report.php?id=" . $posts[5] . "'>Report</a></div>
        <hr>
        " . $posts[6] . "
    </div>";
    }
    elseif ($posts[0] == "reply") {
        echo "<div id='post'>
        <div id='banner'><b>" . $posts[2] . "</b>!" . $posts[3] . "  " . $posts[4] . "  No." . $posts[5] . "<a id='report' href='localhost/report.php?id=" . $posts[5] . "'>Report</a></div>
        <hr>
        " . $posts[6] . "
    </div>";
    }
}
?>
</body>
</html>