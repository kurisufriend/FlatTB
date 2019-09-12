<?php
require_once "data/config.php";
function tripcode($input, $salt) {
    $hash = hash("sha256",$input . $salt);
    $out = base64_encode($hash);
    return $out;
}
?>