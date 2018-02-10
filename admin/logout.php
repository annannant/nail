<?php
session_start();
$_SESSION['employees'] = [];
echo "<script>window.location='login.php'</script>";