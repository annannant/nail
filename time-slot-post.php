<?php
session_start();
include 'mysql_connection.php';

echo "<pre>";
print_r($_POST);
die;
$booking_id = $_SESSION['booking_id'];