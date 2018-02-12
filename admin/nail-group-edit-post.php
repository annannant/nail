<?php
include '../mysql_connection.php';
include '../config.php';

// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);

// // ------------------------ Prepare Data ------------------------
$id = $_GET['id'];
$name   = $_POST['name'];
$pic    = $_POST['old_pic']; 

// ------------------------ Upload File ------------------------
if(!empty($_FILES["pic"]["tmp_name"])){
    // Upload pic
    $target_file = 'uploads/nail-group/' . 'group-' . date('YmdHis') . '.jpg';
    if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        echo "<script>alert('Upload file ไม่สำเร็จ!');</script>";
        die;
    }     

    $pic = $front_url . 'admin/' . $target_file; 
}


// ------------------------ Update to database ------------------------
$sql = "UPDATE `nail_groups` SET `name` = '$name', 
`pic` = '$pic' WHERE `nail_groups`.`id` = $id";
if ($mysqli->query($sql) === true) {
    echo "<script>alert('Successfully');</script>";
	echo "<script>window.location='nail-group.php'</script>"; // พาไปหน้า nails
	die;
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
    echo "<script>window.location='nail-group-edit.php'</script>"; // พาไปหน้า create
	die;
}

