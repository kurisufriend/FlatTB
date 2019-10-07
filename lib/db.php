<?php
function csv_add_top($csv, $line) {
    $ex = file_get_contents($csv);
    file_put_contents($csv, $line . $ex);
}

function csv_search($csv, $needle) {
    $haystack = array_map("str_getcsv", file($csv));
    $b = 0;
    foreach ($haystack as $line) {
        if ($line[0] == $needle) {
            $b = 1;
            return true;
        }
    }
    if (!$b = 1) {
        return false;
    }
}
?>