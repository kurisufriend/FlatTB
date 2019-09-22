<!DOCTYPE html>
<html>
    <head>
<?php //include_once "templates/head.php";?>
<meta http-equiv="Content-Type" content="text/html" />
<link rel="stylesheet" href="/assets/css/main.css" title="FlatTB" />
<link rel="icon" href="/assets/images/icon.png" />
<?php
$boards = array_map("str_getcsv", file("threadinfo.csv"));
$boards[0][1] = str_replace('&_', ' ', $boards[0][1]);
echo "<title>" . $boards[0][1] . "</title>";
?>
    </head>
    <body>
<?php //include_once "templates/header.php";?>
<?php
foreach ($boards as $lines) {
    $lines[6] = str_replace('&comma', ',', $lines[6]);
    $lines[2] = str_replace('&comma', ',', $lines[2]);
    $lines[1] = str_replace('&comma', ',', $lines[1]);
    if ($lines[0] == "op") {
        echo "<div id='op'>
        <h1 class='center'>" . $lines[1] . "</h1>
        <div id='banner'><b>" . $lines[2] . "</b>!" . $lines[3] . "  " . $lines[4] . "  No." . $lines[5] . "<a id='report' href='localhost/report.php?id=" . $lines[5] . "'>Report</a></div>
        <hr>
        " . $lines[6] . "
    </div>";
    }
    elseif ($lines[0] == "reply") {
        echo "<div id='post'>
        <div id='banner'><b>" . $lines[2] . "</b>!" . $lines[3] . "  " . $lines[4] . "  No." . $lines[5] . "<a id='report' href='localhost/report.php?id=" . $lines[5] . "'>Report</a></div>
        <hr>
        " . $lines[6] . "
    </div>";
    }
}
?>
</body>
</html>