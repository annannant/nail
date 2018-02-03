<?php
session_start();
if (empty($_SESSION['member'])) {
    echo "<script>window.location.href='login.php'</script>";
}

$member = $_SESSION['member'];
