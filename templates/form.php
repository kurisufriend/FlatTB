<div id="postform" class="infobox">
<form method="POST" action="submit.php">
    <strong>Name (opt.)</strong><br><input type="text" size="25" maxlength="25" name="name"><br>
    <strong>Tripcode (opt.)</strong><br><input type="text" size="25" maxlength="25" name="trip"><br>
    <strong>Subject</strong><br><input type="text" size="35" maxlength="35" name="subject"><br>
    <strong>Body</strong><br><textarea rows="10" cols="50" name="body"></textarea><br>
    <select name="board">
<?php
// lifted straight from templates/boards.php
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
//read boards from .csv file to populate select options
foreach ($boards as $lines) {
    echo "<option value='" . $lines[0] . "'>" . $lines[1] . "</option><br>";
}
?>
    </select>
    <input type="submit" name="submit" value="submit">
</form>
</div>