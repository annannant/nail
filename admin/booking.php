<?php

include '../mysql_connection.php';
include "check_login_admin.php";

$page = 'booking'; // for menu

$date = '';
if (!empty($_GET['date'])) {
    $date = $_GET['date'];
}

$sql_booking = "SELECT bookings.*, members.name as member_name,  employees.name as employee_name   
FROM `bookings` 
INNER JOIN members ON members.id = bookings.member_id
INNER JOIN employees ON employees.id = bookings.employee_id
WHERE booking_status IN ('confirm')";
if (!empty($date)) {
    $sql_booking .= "  AND DATE_FORMAT(booking_date, '%d-%m-%Y') = '$date'  ";
}
$sql_booking .= "  ORDER BY id DESC";
//echo  $sql_booking;
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
                    <a class="navbar-brand" href="#">Booking</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Booking</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 10%;" class="text-center">Time</th>
                                        <th style="width: 25%;" class="text-center">Name</th>
                                        <th style="width: 25%;" class="text-center">Picture</th>
                                        <th style="width: 30%;" class="text-center">Detail</th>
                                        <th style="width: 10%;" class="text-center">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if (empty($result_booking->num_rows)) {  ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No data</td>
                                        </tr>
                                    <?php } ?>

                                    <?php while ($row_booking = $result_booking->fetch_assoc()) {

                                        $booking_id    = $row_booking['id'];
                                        $booking_lists = "SELECT *  FROM `booking_lists` WHERE `booking_id` = $booking_id ORDER BY `booking_id`  ASC";
                                        $result_list   = $mysqli->query($booking_lists);
                                        $booking_list  = [];
                                        while ($row_list = $result_list->fetch_assoc()) {
                                            $booking_list[] = $row_list;
                                        }

                                        ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <?php echo date('H:i', strtotime($row_booking['time_start'])) ?>
                                                    - <?php echo date('H:i', strtotime($row_booking['time_end'])) ?>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="title"><?php echo $row_booking['member_name'] ?></h5>
                                                <p class="category">พนักงาน
                                                    : <?php echo $row_booking['employee_name'] ?></p>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php foreach ($booking_list as $key => $list) { ?>
                                                        <img src="<?php echo $list['pic'] ?>"
                                                             style="width: 50px;margin-bottom: 5px">
                                                        <?php if (($key % 4) == 3) { ?>
                                                            <div></div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <?php foreach ($booking_list as $key => $list) { ?>
                                                        <li><?php echo $list['nail_list_name'] ?>
                                                            x<?php echo $list['qty'] ?> </li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                            <td>฿<?php echo $row_booking['total_price'] ?></td>
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
