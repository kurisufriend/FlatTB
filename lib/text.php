<?php
function filter_fromcsv($haystack) {
    $needles = array_map("str_getcsv", file("data/filter.csv"));
    foreach ($needles as $rule) {
        $haystack = str_replace($rule[0], $rule[1], $haystack);
    }
    return $haystack;
}
function roll_replace($input) {
    $out = str_replace("+roll", "<b class='roll'>Roll: " . mt_rand(1,99) . "</b>", $input);
    return $out;
}
?>