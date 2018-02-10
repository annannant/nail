<?php
include 'mysql_connection.php';

//echo "<pre>";
//print_r($_POST);
//die;
$back_page = $_SERVER['HTTP_REFERER'];

$booking_list_id = $_GET['id'];
$sql             = "DELETE FROM `booking_lists` WHERE `booking_lists`.`id` = $booking_list_id";
$result          = $mysqli->query($sql);
echo "<script>window.location.href='" . $back_page . "'</script>";
