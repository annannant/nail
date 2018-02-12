<?php

include '../mysql_connection.php';
include "check_login_admin.php";

$page = 'booking'; // for menu

$date = date('d-m-Y');
if (!empty($_GET['date'])) {
    $date = $_GET['date'];
}
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

    <script src="../carousel/jquery/jquery.min.js"></script>
    <script src="../carousel/jquery/bootstrap.min.js"></script>
    <script src="../carousel/jquery/jquery.touchSwipe.min.js"></script>
    <script src="../carousel/jquery/prefixfree.min.js"></script>
    <link href="../lib/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
    <script src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

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
                    <a class="navbar-brand" href="#">Table</a>
                </div>
                <div class="collapse navbar-collapse">
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-1 logo text-right"
                                             style="    padding-top: 12px;    padding-right: 10px;">
                                            <i class="far fa-calendar-alt"
                                               style="    font-size: 29px;    color: #aaa;"></i>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" id="date" name="date" value="<?php echo $date ?>"
                                                       class="form-control border-input" style="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var date = new Date();
                    date.setDate(date.getDate());
                    $('#date').datepicker({
                        "format": 'dd-mm-yyyy',
                        "autoclose": true
                    });
                </script>
                <?php

                // ---------------- Time -----------------
                $sql_time = "SELECT * FROM `time_slots`  ORDER BY `time_slots`.`id`  ASC";
                $res_time = $mysqli->query($sql_time);
                $times    = [];
                while ($row_time = $res_time->fetch_assoc()) {
                    $times[] = $row_time;
                }

                // ---------------- Employee -----------------
                $sql_emp   = "SELECT * FROM `employees` ORDER BY `employees`.`id`  ASC";
                $res_emp   = $mysqli->query($sql_emp);
                $employees = [];
                while ($row_emp = $res_emp->fetch_assoc()) {
                    $employees[] = $row_emp;
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Booking</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 12%;" class="text-center">Time</th>
                                        <?php foreach ($times as $time) { ?>
                                            <th style="width: 5%;" class="text-center">
                                                <div><?php echo date('H:i', strtotime($time['start'])); ?></div>
                                                <div>-</div>
                                                <div><?php echo date('H:i', strtotime($time['end'])); ?></div>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($employees as $emp) { ?>
                                        <tr>
                                            <th><?php echo $emp['name'] ?></th>
                                            <?php foreach ($times as $time) { ?>
                                                <?php
                                                $emp_id      = $emp['id'];
                                                $start       = $time['start'];
                                                $end         = $time['end'];
                                                $sql_booking = "   SELECT bookings.*, members.name as member_name, members.id as member_id,  employees.name as employee_name";
                                                $sql_booking .= "  FROM `bookings` INNER JOIN members ON members.id = bookings.member_id ";
                                                $sql_booking .= "  INNER JOIN employees ON employees.id = bookings.employee_id ";
                                                $sql_booking .= "   WHERE booking_status IN ('confirm')";
                                                $sql_booking .= "  AND DATE_FORMAT(booking_date, '%d-%m-%Y') = '$date'  ";
                                                $sql_booking .= "  AND time_start = '$start'  ";
                                                $sql_booking .= "  AND time_end = '$end'  ";
                                                $sql_booking .= "  AND employee_id = '$emp_id'  ";
                                                $sql_booking .= "  ORDER BY id DESC";
//                                                echo $sql_booking;
//                                                die;
                                                $result_booking = $mysqli->query($sql_booking);
                                                $booking = [];
                                                if($result_booking->num_rows > 0){
                                                    $booking = $result_booking->fetch_assoc();
                                                }
                                                ?>

                                                <?php if (!empty($booking)) { ?>
                                                    <td style="width: 10%;background-color: #AAAAAA" class="text-center" >
                                                        <div><?php echo $booking['member_name'] ?></div>
                                                        <div><?php echo $booking['id'] ?></div>
                                                    </td>
                                                <?php }else{ ?>

                                                    <td style="width: 10%;" class="text-center">

                                                    </td>
                                                <?php } ?>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


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
