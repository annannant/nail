<?php

include '../mysql_connection.php';
include "check_login_admin.php";

$page = 'customer'; // for menu

$date_now        = date('Y-m-d');
$sql_customer    = "SELECT bookings.*, members.name as  member_name, employees.name as  employee_name   FROM `bookings`
INNER JOIN members ON members.id = bookings.member_id
INNER JOIN employees ON employees.id = bookings.employee_id
WHERE DATE_FORMAT(booking_date, '%Y-%m-%d') = '$date_now' AND booking_status != 'cart' 
order by time_start ASC";
$result_customer = $mysqli->query($sql_customer);


// ---------------- check expired ----------------
$dateNow       = date('Y-m-d');
$min           = 10;
$newDateNotify = new DateTime();
$timeExpired   = $newDateNotify->modify("+$min minutes")->format('H:i:00');

$sql_exp         = "UPDATE `bookings` SET `booking_status` = 'expired' 
WHERE `booking_status` = 'confirm'
AND DATE_FORMAT(booking_date, '%Y-%m-%d') <= '$dateNow' 
AND time_start <= '$timeExpired'";
$res_rexp = $mysqli->query($sql_exp);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <?php include 'header.php'; ?>

</head>
<body>

<div class="wrapper">


    <div class="sidebar" data-background-color="white" data-active-color="info">

        <?php include 'sidebar.php'; ?>

    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Customer</a>
                    <p class="text-muted">
                        <?php echo date('d/m/Y H:i'); ?>
                    </p>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php while ($row = $result_customer->fetch_assoc()) { ?>
                        <div class="col-md-4">
                            <div class="card card-customer"
                                 onclick="window.location.href='queue.php?booking_id=<?php echo $row['id'] ?>'">
                                <div class="content">
                                    <ul class="list-unstyled team-members" style="    margin-bottom: 0px;">
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-5"
                                                     style="text-align: center;border-right: 1px solid #ddd;">
                                                    <div class="col-xs-12"
                                                         style="padding-left: 31px;padding-bottom: 10px;">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image"
                                                                 class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12" style="    padding: 0;">
                                                        <?php echo $row['employee_name']; ?>
                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="col-xs-7 text-center">
                                                    <h4 class="title"><?php echo $row['id']; ?><br>
                                                        <a href="#">
                                                            <small></small>
                                                        </a>
                                                        <p></p>
                                                        <p></p>
                                                    </h4>
                                                    <h6><p class="category"><?php echo date('H:i',
                                                                strtotime($row['time_end'])); ?>
                                                            - <?php echo date('H:i',
                                                                strtotime($row['time_end'])); ?> </p></h6>
                                                    <span class="text-muted"><small>ชื่อลูกค้า : <?php echo $row['member_name']; ?></small></span>
                                                    <span class="text-muted"><small>Status : <?php echo $row['booking_status']; ?></small></span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>

        </div>

        <footer class="footer">

        </footer>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
