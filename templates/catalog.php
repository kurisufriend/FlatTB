<?php
$catalog = array_map("str_getcsv", file("data/globalcatalog.csv"));
?>
<table>
<tr>
<th>Board</th>
<th>Post</th>
<th>Time</th>
</tr>
<?php 
foreach ($catalog as $post) {
    echo "<tr><td>" . $post[0] . "</td>" . "<td>" . $post[1] . "</td>" . "<td>" . $post[2] . "</td>" . "</tr>";
}
?>
</table>