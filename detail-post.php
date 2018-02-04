<?php
include 'mysql_connection.php';

//echo "<pre>";
//print_r($_POST);

session_start();
if (empty($_SESSION['member'])) {
    echo "<script>window.location.href='login.php'</script>";
}

$member_id       = $_SESSION['member']['id'];
$status          = 'cart';
$qty             = $_POST['qty'];
$nail_list_name  = $_POST['name'];
$nail_group_name = $_POST['group_name'];
$price           = $_POST['price'];
$nail_list_id    = $_POST['nail_list_id'];
$nail_group_id   = $_POST['nail_group_id'];
$amount          = $price * $qty;
// =============== SELECT EXISTING CART ==================
$sql_old    = "SELECT *  FROM `bookings` WHERE `member_id` = $member_id AND `booking_status` = 'cart' ORDER BY id DESC LIMIT 0,1 ";
$result_old = $mysqli->query($sql_old)->fetch_assoc();
// ------------ ถ้าไม่มัให้สร้าง CART ------------
if (empty($result_old)) {
    $sql_booking    = "INSERT INTO `bookings` (`member_id`, `booking_status`, `time_start`, `time_end`) VALUES ($member_id, 'cart', NULL, NULL)";
    $result_booking = $mysqli->query($sql_booking);
    $booking_id     = $mysqli->insert_id;
} else {
    // ------------ ถ้ามีแล้วให้ใช้ id booking cart นั้น ------------
    $booking_id = $result_old['id'];
}

$_SESSION['booking_id'] = $booking_id;


// =============== VALIDATE TOTAL FINGER ==================
$sql_total = "SELECT SUM(qty) as total_qty FROM `booking_lists` WHERE booking_id = $booking_id";
$total_qty = $mysqli->query($sql_total)->fetch_assoc();
if (($total_qty['total_qty'] + $qty) > 10) {
    echo json_encode(['error' => 'Nail over max limit.']);
    die;
}


// =============== SELECT BOOKING ITEM CART ==================
$sql_old_list    = "SELECT *  FROM `booking_lists` WHERE `booking_id` = $booking_id AND `nail_group_id` = $nail_group_id AND `nail_list_id` = $nail_list_id ORDER BY id DESC LIMIT 0,1";
$result_old_list = $mysqli->query($sql_old_list)->fetch_assoc();
if (empty($result_old_list)) {
    $sql_booking_list    = "INSERT INTO `booking_lists` (`booking_id`, `nail_group_id`, `nail_list_id`, `nail_group_name`, `nail_list_name`, `price`, `qty`, `amount`) 
VALUES ('$booking_id', '$nail_group_id', '$nail_list_id', '$nail_group_name', '$nail_list_name', '$price', '$qty', '$amount')";
    $result_booking_list = $mysqli->query($sql_booking_list);

} else {
    $qty                 = $qty + $result_old_list['qty'];
    $amount              = $qty * $result_old_list['price'];
    $sql_booking_list    = "UPDATE `booking_lists` SET `qty` = $qty , `amount` = $amount
WHERE `booking_id` = $booking_id AND `nail_group_id` = $nail_group_id AND `nail_list_id` = $nail_list_id";
    $result_booking_list = $mysqli->query($sql_booking_list);
}

echo $booking_id;
