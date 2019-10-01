<?php
function filter_fromcsv($haystack) {
    $needles = array_map("str_getcsv", file("data/filter.csv"));
    foreach ($needles as $rule) {
        $haystack = str_replace($rule[0], $rule[1], $haystack);
    }
    return $haystack;
}

?>