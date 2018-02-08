<?php
include 'mysql_connection.php';
session_start();

$name      = $_POST['name'];
$last_name = $_POST['last_name'];
$email     = $_POST['email'];
$phone     = $_POST['phone'];
$username  = $_POST['username'];
$password  = $_POST['password'];

$sql    = "INSERT INTO `members` (`id`, `name`, `last_name`, `tel`, `email`, `password`) 
VALUES (NULL, 'name', 'last_name', 'tel', 'email', 'password')";
$result = $mysqli->query($sql);
if (empty($result)) {
    echo "<script>alert('Register fail!');</script>";
    echo "<script>window.location.href='register.php'</script>";
} else {
    $booking_id               = $mysqli->insert_id;
    $_SESSION['member']       = $_POST;
    $_SESSION['member']['id'] = $booking_id;
    echo "<script>window.location.href='index.php'</script>";
}
