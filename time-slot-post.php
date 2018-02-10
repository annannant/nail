<?php
include 'mysql_connection.php';

//[date] => 09-02-2018
//    [time-slot] => 13:30:00,14:30:00
$booking_id   = $_SESSION['booking_id'];
$booking_date = date('Y-m-d H:i:s', strtotime($_POST['date']));
$time_slot    = explode(",", $_POST['time-slot']);
$time_start   = $time_slot[0];
$time_end     = $time_slot[1];

// ---------------- Employee ---------------------
$sql_emp     = "SELECT * FROM `employees` LIMIT 0,1";
$res_emp     = $mysqli->query($sql_emp)->fetch_assoc();
$employee_id = $res_emp['id'];

// ---------------- update ---------------------
$sql_update = "UPDATE `bookings` SET `employee_id` = '$employee_id',  `booking_status` = 'payment_waiting', 
`total_price` = (SELECT sum(amount) as sum FROM `booking_lists` WHERE booking_id = $booking_id) , 
`booking_date` = '$booking_date', 
`time_start` = '$time_start', 
`time_end` = '$time_end', 
`create_date` = NOW() 
WHERE `bookings`.`id` = $booking_id";
$res_update = $mysqli->query($sql_update);

echo "<script>window.location.href='bill.php?booking_id=$booking_id'</script>";
