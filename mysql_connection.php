<?php

date_default_timezone_set("Asia/Bangkok");

include 'debug.php';
include 'config.php';

$mysqli = new mysqli("localhost", "root", null, "story_db");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->set_charset("utf8");
