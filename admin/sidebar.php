<?php
if (!isset($mysqli)) {
    include '../mysql_connection.php';
}
?>
<div class="sidebar-wrapper">
    <div class="logo text-center">
        <a href="index.php" class="simple-text">
            My Story Nail
        </a>
        <span> <i class="far fa-user"></i> <?php echo $_SESSION['employees']['name'] ?></span>
    </div>

    <ul class="nav">
        <li class="<?php echo ($page == 'customer') ? 'active' : ''; ?>  ">
            <a href="customer.php">
                <i class="ti-user"></i>
                <p>Customer</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'booking') ? 'active' : ''; ?>">
            <a href="booking.php">
                <i class="ti-receipt"></i>
                <p>Booking</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'nail-group') ? 'active' : ''; ?>">
            <a href="nail-group.php">
                <i class="ti-slice"></i>
                <p>Nail</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'history') ? 'active' : ''; ?>">
            <a href="history.php">
                <i class="ti-timer"></i>
                <p>History</p>
            </a>
        </li>


        <li class="active-pro">
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</div>
