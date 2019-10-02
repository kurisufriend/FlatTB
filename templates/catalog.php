<?php
$catalog = array_map("str_getcsv", file("data/globalcatalog.csv"));
include_once "data/config.php";
?>
<?php
if (!empty($catalog)) {
    echo "<table><tr><th>Board</th><th>Post</th><th>Time</th></tr>";
    foreach ($catalog as $post) {
        $post[1] = rawurldecode($post[1]);
        $link = $root . "view.php?board=" . $post[0] . "&" . "thread=" . $post[1];
        echo "<tr><td>" . $post[0] . "</td>" . "<td><a href='" . $link . "'>" . $post[1] . "</a></td>" . "<td>" . $post[2] . "</td>" . "</tr>";
    }
    echo "</table>";
}else {
    echo "No Posts Yet";
}
?>