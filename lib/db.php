<?php
function csv_add_top($csv, $line) {
    $ex = file_get_contents($csv);
    file_put_contents($csv, $line . $ex);
}
?>