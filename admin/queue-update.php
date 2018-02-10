<?php
include '../mysql_connection.php';
$booking_id = $_GET['booking_id'];
$status     = $_GET['status'];

$sql    = "UPDATE `bookings` SET `booking_status` = '$status' WHERE `bookings`.`id` = $booking_id;";
//echo $sql;die;
$result = $mysqli->query($sql);
if (!$result) {
    echo "<script>alert('Update Fail!');</script>";
    echo "<script>window.location='queue.php?booking_id=$booking_id'</script>";
} else {
    echo "<script>window.location='customer.php'</script>";
}

?>