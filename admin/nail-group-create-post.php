<?php
include '../mysql_connection.php';
include '../config.php';

// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);

if (empty($_POST)) {
    echo "<script>window.location='nail-group-create.php'</script>";
    die;
}

// // ------------------------ Upload File ------------------------
$target_file = 'uploads/nail-group/' . 'group-' . date('YmdHis') . '.jpg';
if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
	echo "<script>alert('Upload file ไม่สำเร็จ!');</script>";
    die;
} 

// // ------------------------ Insert Data ------------------------
$name   = $_POST['name'];
$pic    = $front_url . 'admin/' . $target_file; 

$sql = "INSERT INTO `nail_groups` (`name`, `pic`) VALUES ('$name', '$pic')";
if ($mysqli->query($sql) === true) {
    echo "<script>alert('Successfully');</script>";
	echo "<script>window.location='nail-group.php'</script>"; // พาไปหน้า nails
	die;
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
    echo "<script>window.location='nail-group-create.php'</script>"; // พาไปหน้า creat
	die;
}

