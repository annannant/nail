<?php
include 'mysql_connection.php';

//echo "<pre>";
//print_r($_POST);
//die;
$booking_id = $_SESSION['booking_id'];
$data       = [];
if (!empty($_POST['data'])) {
    $data = $_POST['data'];
}
$data       = array_filter($data);
$update_ids = array_keys($data);

$sql       = "SELECT * FROM booking_lists WHERE booking_id = $booking_id";
$result    = $mysqli->query($sql);
$cart_list = [];

while ($row = $result->fetch_assoc()) {
    // Update
    $row_id = $row['id'];
    if (in_array($row['id'], $update_ids)) {
        $qty        = $data[$row_id];
        $sql_update = "UPDATE `booking_lists` SET `qty` = $qty,  amount = price * $qty WHERE `booking_lists`.`id` = $row_id;";
        $query      = $mysqli->query($sql_update);
    } else { // Delete
        $sql_del = "DELETE FROM `booking_lists` WHERE `booking_lists`.`id` = $row_id;";
        $query   = $mysqli->query($sql_del);
    }
}

