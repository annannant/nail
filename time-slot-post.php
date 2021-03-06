<?php
include 'mysql_connection.php';

//[date] => 09-02-2018
//    [time-slot] => 13:30:00,14:30:00
$booking_id   = $_SESSION['booking_id'];
$booking_date = date('Y-m-d H:i:s', strtotime($_POST['date']));
$time_slot    = explode(",", $_POST['time-slot']);
$time_start   = $time_slot[0];
$time_end     = $time_slot[1];

$dateBooking = date('d-m-Y', strtotime($booking_date));
// ---------------- Employee ---------------------
$sub_sql = "SELECT employee_id  FROM   `bookings` 
LEFT JOIN employees ON employees.id = bookings.employee_id 
WHERE  booking_status IN ( 'payment_waiting', 'payment_success',  'confirm' ) 
AND Date_format(booking_date, '%d-%m-%Y') = '$dateBooking' 
AND time_start = '$time_start' 
AND time_end = '$time_end' ";

$sql_emp     = "SELECT * 
FROM   `employees` 
WHERE  `id` NOT IN ($sub_sql) 
ORDER  BY `id` ASC ";
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
