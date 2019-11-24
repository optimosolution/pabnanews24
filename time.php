<?php
function GmtTimeToLocalTime($time) {
    date_default_timezone_set('UTC');
    $new_date = new DateTime($time);
    $new_date->setTimeZone(new DateTimeZone('Asia/Dhaka'));
    return $new_date->format("M j, Y, g:i:s A");
}
print GmtTimeToLocalTime("2017-03-02 03:18:05");
print "<br>";
print date("M j, Y, g:i:s A");
?>