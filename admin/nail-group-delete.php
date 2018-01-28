<?php

include '../mysql_connection.php';


// -------------------- GET NAIL --------------- //
$id = $_GET['id'];
$sql_nail    = "DELETE FROM `nail_groups` WHERE `nail_groups`.`id` = $id";
$result_nail = $mysqli->query($sql_nail);
if($result_nail){
	echo "<script>alert('Successfully');</script>";
}else{
    echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
}

echo "<script>window.location='nail-group.php'</script>"; // พาไปหน้า nails
die;
