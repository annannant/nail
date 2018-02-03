<?php
session_start();
$_SESSION['member'] = [];
echo "<script>window.location='login.php'</script>";