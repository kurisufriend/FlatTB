<?php
$catalog = array_map("str_getcsv", file("data/globalcatalog.csv"));
?>
<?php
if (!empty($catalog)) {
    foreach ($catalog as $post) {
        echo "<table><tr><th>Board</th><th>Post</th><th>Time</th></tr><tr><td>" . $post[0] . "</td>" . "<td>" . $post[1] . "</td>" . "<td>" . $post[2] . "</td>" . "</tr></table>";
    }
}else {
    echo "No Posts Yet";
}
?>