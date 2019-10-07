<?php
include_once "lib/db.php";
$client = $_SERVER['REMOTE_ADDR'];
echo "IP Address: [" . $client. "]";
if (csv_search("data/baninfo.csv", $client)) {
    echo "banned";
}
?>