<?php
if (empty($_SESSION['employees'])) {
    echo "<script>window.location.href='login.php'</script>";
}

$employees = $_SESSION['employees'];
