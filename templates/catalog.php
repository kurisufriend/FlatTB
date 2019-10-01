<?php
$catalog = array_map("str_getcsv", file("data/globalcatalog.csv"));
include_once "data/config.php";
?>
<?php
if (!empty($catalog)) {
    echo "<table><tr><th>Board</th><th>Post</th><th>Time</th></tr>";
    foreach ($catalog as $post) {
        echo "<tr><td>" . $post[0] . "</td>" . "<td>" . $post[1] . "</td>" . "<td>" . $post[2] . "</td>" . "</tr>";
    }
    echo "</table>";
}else {
    echo "No Posts Yet";
}
?>