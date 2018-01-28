<?php
include '../mysql_connection.php';
include '../config.php';

// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);
// die;
// // ------------------------ Prepare Data ------------------------
 // [name] => rt
 //    [detail] => yy
 //    [price] => yy
 //    [nail_group_id] => 11
 //    [old_pic] => http://loc

$id = $_GET['id'];
$name   = $_POST['name'];
$detail  = $_POST['detail'];
$price  = $_POST['price'];
$nail_group_id  = $_POST['nail_group_id'];
$pic    = $_POST['old_pic']; 

// ------------------------ Upload File ------------------------
if(!empty($_FILES["pic"]["tmp_name"])){
    // Upload pic
   $target_file = 'uploads/nail-list/' . 'list-' . date('YmdHis') . '.jpg';
if (!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
    echo "<script>alert('Upload file ไม่สำเร็จ!');</script>";
    die;
    }     

    $pic = $front_url . 'admin/' . $target_file; 
}


// ------------------------ Update to ddatabase ------------------------
$sql = "UPDATE `nail_lists` SET `name` = '$name', `detail` = '$detail', `price` = '$price', `pic` = '$pic' WHERE `nail_lists`.`id` = $id";

if ($mysqli->query($sql) === true) {
    echo "<script>alert('Successfully');</script>";
	echo "<script>window.location='nail-list.php?nail_group_id=".$nail_group_id."'</script>"; // พาไปหน้า nails
	die;
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
    echo "<script>window.location='nail-list-edit.php?id=".$id."'</script>"; // พาไปหน้า creat
	die;
}

