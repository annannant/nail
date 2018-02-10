<?php
include 'mysql_connection.php';

// [qty] => 4
// [price] => 20
// [name] => Chin-jang 03-4 (finger)
// [group_name] => Chin-jang 03 -finger
// [nail_list_id] => 34
// [nail_group_id] => 7

// -------- check login -----------
if (empty($_SESSION['member'])) {
    echo json_encode(['error' => 'nologin']);
    die;
}

// -------- end check login -----------

$data            = [];
$member_id       = $_SESSION['member']['id'];
$status          = 'cart';
$nail_group_id   = $_POST['nail_group_id'];
$nail_group_name = $_POST['group_name'];

if ($_POST['type'] == 'group') {

    $set        = '';
    $sql_set    = "SELECT *  FROM `nail_lists` WHERE `nail_group_id` = 1";
    $result_set = $mysqli->query($sql_set);
    while ($row = $result_set->fetch_assoc()) {
        $set .= $row['name'] . ', ';
    }

    $qty            = 1;
    $nail_list_name = 'SET : ' . rtrim($set, ",") . '  10 nail';
    $pic            = $_POST['pic'];
    $price          = $_POST['price_set'];
    $nail_list_id   = 0;
    $amount         = $_POST['price_set'];
    $type           = 'group';

} else {
    $qty            = $_POST['qty'];
    $nail_list_name = $_POST['name'];
    $pic            = $_POST['pic'];
    $price          = $_POST['price'];
    $nail_list_id   = $_POST['nail_list_id'];
    $amount         = $_POST['price'] * $_POST['qty'];
    $type           = 'list';
}

// =============== SELECT EXISTING CART ==================
$sql_old    = "SELECT *  FROM `bookings` 
WHERE `member_id` = $member_id AND `booking_status` = 'cart' 
ORDER BY id DESC LIMIT 0,1 ";
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
// $sql_total = "SELECT SUM(qty) as total_qty FROM `booking_lists` WHERE booking_id = $booking_id";
// $total_qty = $mysqli->query($sql_total)->fetch_assoc();
// if (($total_qty['total_qty'] + $qty) > 10) {
//     echo json_encode(['error' => 'Nail over max limit.']);
//     die;
// }

// =============== SELECT BOOKING ITEM CART ==================
$sql_old_list    = "SELECT *  FROM `booking_lists` 
WHERE `booking_id` = $booking_id 
AND `nail_group_id` = $nail_group_id 
AND `nail_list_id` = $nail_list_id 
AND `type` = '$type' ORDER BY id DESC LIMIT 0,1";
$result_old_list = $mysqli->query($sql_old_list)->fetch_assoc();

if (empty($result_old_list)) {
    $sql_booking_list    = "INSERT INTO `booking_lists` (`type`,`booking_id`, `nail_group_id`, `nail_list_id`, `nail_group_name`, `nail_list_name`, `pic`, `price`, `qty`, `amount`) 
VALUES ('$type','$booking_id', '$nail_group_id', '$nail_list_id', '$nail_group_name', '$nail_list_name', '$pic', '$price', '$qty', '$amount')";
    $result_booking_list = $mysqli->query($sql_booking_list);
} else {
    $qty                 = $qty + $result_old_list['qty'];
    $amount              = $qty * $result_old_list['price'];
    $sql_booking_list    = "UPDATE `booking_lists` SET `qty` = $qty , `amount` = $amount
WHERE `booking_id` = $booking_id AND `nail_group_id` = $nail_group_id AND `nail_list_id` = $nail_list_id";
    $result_booking_list = $mysqli->query($sql_booking_list);
}

//echo $booking_id
echo json_encode(['data' => $booking_id]);
die;
