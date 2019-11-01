<?php
if (isset($_POST['CSSselect'])) {
    $selected = $_POST['CSSselect'];
    setcookie("CSS", $selected);
    header("Refresh:0");
}

?>
<form method="POST" action="#">
<div id="footer">
<select name="CSSselect">
<option value="main">FlatTB</option>
<option value="yotsuba">Youtuba Bad</option>
</select>
<input type="submit" value="change">
</div>
</form>