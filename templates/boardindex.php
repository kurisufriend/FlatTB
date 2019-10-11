<?php
include_once "data/config.php";
include_once "lib/sanitize.php";
if (!isset($board)) {
    $board = "";
}
$catalog = array_map("str_getcsv", file("content/" . $board . "/catalog.csv"));
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once "templates/head.php"; ?>
</head>
<body>
<?php include_once "templates/header.php"; ?>
<h2 class="center"><?php echo $board; ?></h2>
<div id='boardcatalog' class='center'><table>
<th>Title</th>
<th>Post</th>
<th>Time</th>
<?php
$i = 0;
foreach ($catalog as $post) {
    if ($i >= 25) {
        break;
    }
    $post[2] = csv_decode($post[2]);
    $post[1] = rawurldecode($post[1]);
    echo "<tr><div class='catalogbox'><td>" . $post[1] . "</td><td>" . $post[2] . "</td><td>" . $post[3] . "</td></div></tr>";
    $i++;
}
?>
</table></div>
</body>
</html>