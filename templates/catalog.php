<?php
$catalog = array_map("str_getcsv", file("data/globalcatalog.csv"));
include_once "data/config.php";
if (!empty($catalog)) {
    echo "<table><tr><th>Board</th><th>Post</th><th>Time</th></tr>";
    $i = 0;
    foreach ($catalog as $post) {
        if ($i >= 10) {
            break;
        }
        $post[1] = rawurldecode($post[1]);
        $link = $root . "view.php?board=" . $post[0] . "&" . "thread=" . urlencode(rawurlencode($post[1])); // shit temp fix
        echo "<tr><td>" . $post[0] . "</td>" . "<td><a href='" . $link . "'>" . $post[1] . "</a></td>" . "<td>" . $post[2] . "</td>" . "</tr>";
        $i++;
    }
    echo "</table>";
}else {
    echo "No Posts Yet";
}
?>