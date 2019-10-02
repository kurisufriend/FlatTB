<?php
require_once "data/config.php";

function tripcode($input, $salt) {
    $hash = hash("sha512",$input . $salt . $input[0]);
    $out = base64_encode($hash);
    return $out;
}
function pretty_tripcode($input) {
return substr($input,128,10);
}
?>