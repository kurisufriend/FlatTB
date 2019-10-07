<?php
function ban_check() {
    if (csv_search("data/baninfo.csv", $ip)) {
        return true;
    } else {
        return false;
    }
}
?>