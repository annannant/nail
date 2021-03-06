<?php

include '../mysql_connection.php';
$page = 'customer'; // for menu

$booking_id = $_GET['booking_id'];


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
                    <a class="navbar-brand" href="#">Status Customer</a>
                    <p class="text-muted">
                        <?php echo date('d/m/Y H:i'); ?>
                    </p>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid fluid-queue">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="card card-queue"
                             onclick="window.location.href='queue-update.php?status=payment_success&booking_id=<?php echo $booking_id; ?>'">
                            <div class="content">
                                <h4><i class="fas fa-check" style="color: green"></i> Pay Success</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card card-queue"
                             onclick="window.location.href='queue-update.php?status=confirm&booking_id=<?php echo $booking_id; ?>'">
                            <div class="content">
                                <h4><i class="fas fa-check" style="color: green"></i> Submit Queue</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="card card-queue"
                             onclick="window.location.href='queue-update.php?status=cancelled&booking_id=<?php echo $booking_id; ?>'">
                            <div class="content">
                                <h4><i class="fas fa-times" style="color: red"></i> Cancel Queue</h4>
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
