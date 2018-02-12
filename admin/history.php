<?php

include '../mysql_connection.php';
include "check_login_admin.php";

$page = 'history'; // for menu

$date = '';
if (!empty($_GET['date'])) {
    $date = $_GET['date'];
}

$sql_booking = "SELECT bookings.*, members.name as member_name,  employees.name as employee_name   
FROM `bookings` 
INNER JOIN members ON members.id = bookings.member_id
INNER JOIN employees ON employees.id = bookings.employee_id
WHERE booking_status != 'cart'";
if (!empty($date)) {
    $sql_booking .= "  AND DATE_FORMAT(create_date, '%d-%m-%Y') = '$date'  ";
}
$sql_booking .= "  ORDER BY id DESC";
$result_booking = $mysqli->query($sql_booking);

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
                    <a class="navbar-brand" href="#">History</a>
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

                <div class="row">
                    <?php while ($row_booking = $result_booking->fetch_assoc()) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <p>Time : <?php echo date('H:i', strtotime($row_booking['time_start'])) ?>
                                                - <?php echo date('H:i', strtotime($row_booking['time_end'])) ?></p>
                                            <div class="stats">
                                                Cutromer : <?php echo $row_booking['member_name'] ?>
                                            </div>
                                            <h3><?php echo $row_booking['id'] ?></h3>
                                        </div>
                                    </div>

                                </div>
                                <div style="text-align: center">
                                    <?php if ($row_booking['booking_status'] == 'confirm' || $row_booking['booking_status'] == 'success') { ?>
                                        <div class="content" style="background-color: #DDDDDD ">
                                            <div class="footer">
                                                <div class="stats" style="font-size: 20px;">
                                                    <i class="fas fa-check"></i> ได้รับคิวแล้ว
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (($row_booking['booking_status'] == 'cancelled')) { ?>
                                        <div class="content" style="background-color: #f1b0b7;color: #ffffff; ">
                                            <div class="footer">
                                                <div class="stats" style="font-size: 18px;color: #ffffff;">
                                                    <i class="fas fa-times"></i>ยกเลิกคิว
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (($row_booking['booking_status'] == 'expired')) { ?>
                                        <div class="content" style="background-color: #DDDDDD ">
                                            <div class="footer">
                                                <div class="stats" style="font-size: 18px;">
                                                    <i class="far fa-clock"></i> expired
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (($row_booking['booking_status'] == 'payment_waiting')) { ?>
                                        <div class="content" style="background-color: #DDDDDD ">
                                            <div class="footer">
                                                <div class="stats" style="font-size: 18px;">
                                                    <i class="ti-reload"></i> รอชำระเงิน
                                                </div>
                                            </div>
                                        </div>
                                    <?php } elseif (($row_booking['booking_status'] == 'payment_success')) { ?>
                                        <div class="content" style="background-color: #DDDDDD ">
                                            <div class="footer">
                                                <div class="stats" style="font-size: 18px;">
                                                    payment_success
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
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
