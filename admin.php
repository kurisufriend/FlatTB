<?php
include_once "data/config.php";
if (isset($_POST['pass']) and isset($_POST['action']) and isset($_POST['arg'])) { // make sure everything's here
    $pass = $_POST['pass']; // get all the input values
    $pass = hash("sha256", $pass . $pass[3] . $pass[2]);
    $act = $_POST['action'];
    $arg = $_POST['arg'];
    if ($pass !== $ph) { // check the password against what's provided in the config file
        echo "Bad Password";
        die();
    } else { // actions
        if ($act == "ban") {
            file_put_contents("data/baninfo.csv", $arg . "\n", FILE_APPEND); // write given ip to ban file
            echo $arg . " has been banned.";echo $pass . "\n" . $ph;
            die();
        }
        else {
            echo "Not supported.";
            die();
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>admin</title>
</head>
<body>
<form method="POST" action="#">
password: <input type="text" size="30" maxlength="120" name="pass"><br>
<select name="action">
<option value="ban">ban</option>
<option value="delete">delete</option>
</select><br>
argument(s): <input type="text" size="50" name="arg"><br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>