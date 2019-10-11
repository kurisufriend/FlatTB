<?php
if (isset($_POST['pass'])) {
	$inp = $_POST['pass'];
	$out = hash("sha256", $inp . $inp[3] . $inp[2]);
	echo $out;
	die();
}

?>
<!DICTYPE html>
<html>
<body>
<form method="POST" action="#">
<input type="text" name="pass">
<input type="submit" value="submit">
</form>
</body>
</html>
