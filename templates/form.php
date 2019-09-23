<div id="postform" class="infobox">
<form method="POST" action="submit.php">
    <table>
    <tr><td class="tableEntry"><strong>Name (opt.)</strong></td><td><br><input type="text" size="25" maxlength="25" name="name"><br></td></tr>
    <tr><td class="tableEntry"><strong>Tripcode (opt.)</strong></td><td><br><input type="text" size="25" maxlength="25" name="trip"><br></td></tr>
    <tr><td class="tableEntry"><strong>Subject</strong></td><td><br><input type="text" size="35" maxlength="35" name="subject"><br></td></tr>
    <tr><td class="tableEntry"><strong>Body</strong></td><td><br><textarea rows="10" cols="50" name="body"></textarea><br></td></tr>
    </table>
    <select name="board">
<?php
// lifted straight from templates/boards.php
$boards = array_map("str_getcsv", file("data/boardinfo.csv"));
//read boards from .csv file to populate select options
foreach ($boards as $lines) {
    echo "<option value='" . $lines[0] . "'>" . $lines[1] . "</option><br>";
}
?>
    </select><br>
    <input type="submit" name="submit" value="submit">
</form>
</div>