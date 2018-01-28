<?php
include '../mysql_connection.php';
include '../config.php';

// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);
// die;

if (empty($_POST)) {
    echo "<script>window.location='nail-new.php'</script>";
    die;
}

// // ------------------------ Upload File ------------------------
$target_file = 'uploads/nail-list/' . 'list-' . date('YmdHis') . '.jpg';
if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
	echo "<script>alert('Upload file ไม่สำเร็จ!');</script>";
    die;
} 

// // ------------------------ Insert Data ------------------------
$name   = $_POST['name'];
$detail   = $_POST['detail'];
$nail_group_id =$_POST['nail_group_id'];
$price   = $_POST['price'];
$pic    = $front_url . 'admin/' . $target_file; 

$sql = "INSERT INTO `nail_lists` (`name`,`detail`,`price`, `pic`,`nail_group_id`) 
VALUES ('$name','$detail','$price', '$pic','$nail_group_id')";

if ($mysqli->query($sql) === true) {
    echo "<script>alert('Successfully');</script>";
	echo "<script>window.location='nail-list.php?nail_group_id=".$nail_group_id."'</script>"; // พาไปหน้า nails
	die;
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
    echo "<script>window.location='nail-new.php?nail_group_id=".$nail_group_id."'</script>"; // พาไปหน้า creat
	die;
}

