<?php

include '../mysql_connection.php';


// -------------------- GET NAIL --------------- //
$id = $_GET['id'];
$nail_group_id = $_GET['nail_group_id'];
$sql_nail    = "DELETE FROM `nail_lists` WHERE `nail_lists`.`id` = $id";
$result_nail = $mysqli->query($sql_nail);
if($result_nail){
	echo "<script>alert('Successfully');</script>";
}else{
    echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
}

echo "<script>window.location='nail-list.php?nail_group_id=".$nail_group_id."'</script>"; // 
die;
