<?php
function increment_postid() {
    $current = file_get_contents("content/postid");
    file_put_contents("content/postid", $current+1);
    return 0;
}
function get_postid() {
    return file_get_contents("content/postid");
}
?>