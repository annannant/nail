<div class="sidebar-wrapper">
    <div class="logo">
        <a href="index.php" class="simple-text">
            My Story Nail
        </a>
    </div>

    <ul class="nav">
        <li class="<?php echo ($page == 'users')? 'active' : ''; ?>  ">
            <a href="users.php">
                <i class="ti-user"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'booking')? 'active' : ''; ?>">
            <a href="booking.php">
                <i class="ti-receipt"></i>
                <p>Booking</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'nails')? 'active' : ''; ?>">
            <a href="nails.php">
                <i class="ti-slice"></i>
                <p>Nail</p>
            </a>
        </li>
        <li class="<?php echo ($page == 'history')? 'active' : ''; ?>">
            <a href="history.php">
                <i class="ti-timer"></i>
                <p>History</p>
            </a>
        </li>

        <li class="active-pro">
            <a href="upgrade.html">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</div>
