<?php
function csv_encode($input) {
    $out = str_replace(',', '&comma', $input);
    $out = preg_replace("/\r\n|\r|\n/", '<br/>', $out);
    return $out;
}
function csv_decode($input) {
    $out = str_replace('&comma', ',', $input);
    return $out;
}
?>