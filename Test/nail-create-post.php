<?php
include '../mysql_connection.php';
include '../config.php';

if (empty($_POST)) {
    echo "<script>window.location='nail-create.php'</script>";
    die;
}

// ------------------------ Upload File ------------------------
$target_dir  = "uploads/";
$target_file = $target_dir . 'nail-' . date('YmdHis') . '.jpg';
if (move_uploaded_file($_FILES["file_nail"]["tmp_name"], $target_file)) {
//    echo "The file " . basename($_FILES["file_nail"]["name"]) . " has been uploaded.";
} else {
    echo "<script>alert('Upload file ไม่สำเร็จ!');</script>";
    echo "<script>window.location='nail-create.php'</script>";
    die;
//    echo "Sorry, there was an error uploading your file.";
}

// ------------------------ Insert Data ------------------------
$name   = $_POST['name'];
$detail = $_POST['detail'];
$price  = $_POST['price'];
$pic    = $front_url . 'admin/' . $target_file;

$sql = "INSERT INTO nail_lists (name, detail, price, pic) VALUES ('$name', '$detail', '$price', '$pic')";
//alert($sql, 1);
if ($mysqli->query($sql) === true) {
    echo "<script>alert('Successfully');</script>";
} else {
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
}

echo "<script>window.location='nails.php'</script>";
die;


