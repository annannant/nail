<?php
include 'mysql_connection.php';
include 'check_login.php';
$member_id = $_SESSION['member']['id'];

// ============= DATE NOW =============
//$currentTime = date('Y-m-d H:is');
$currentTime = '2018-02-09 13:10:00';
$min         = 30;

$newDateNotify      = new DateTime($currentTime);
$newDateNotifyStart = $newDateNotify->modify("-$min minutes");
$newDateNotify2     = new DateTime($currentTime);
$newDateNotifyEnd   = $newDateNotify2->modify("+30 minutes"); // ระยะเวลาแจ้งเตือน
$date_notify_start  = $newDateNotifyStart->format("Y-m-d 00:00:00");
$date_notify_end    = $newDateNotifyEnd->format("Y-m-d 00:00:00");
$time_notify_start  = $newDateNotifyStart->format("H:i:s");
$time_notify_end    = $newDateNotifyEnd->format("H:i:s");

$sql_h    = "SELECT *  FROM `bookings` 
WHERE `member_id` = $member_id AND  booking_status != 'cart' 
AND `time_start` BETWEEN '$time_notify_start' AND '$time_notify_end'
AND booking_date = '$date_notify_start' ORDER BY booking_date DESC";
$result_h = $mysqli->query($sql_h);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Avilon Bootstrap Template</title>
    <?php include_once 'include_header.php'; ?>
</head>

<body>

<!--==========================
  Header
============================-->
<header id="header" class="header-fixed">
    <div class="container">

        <div id="logo" class="">
            <h1><a href="#" class="scrollto">Notification</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>
        <a href="cart.php" class="menu-nav-toggle"><i class="fas fa-shopping-basket"></i></a>
        <!--        <button type="button" id="mobile-nav-toggle" class="menu-nav-toggle user"><i class="fas fa-user"></i></button>-->
        <?php include_once 'include_nav.php'; ?>
    </div>
</header><!-- #header -->


<section id="intro" style="height: 20px;"></section><!-- #intro -->

<main id="main">
    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg nail-list" style="    margin-top: 11px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h3 class="section-title" style="text-align: left;">Update</h3>
                        <div style="color: #9A9A9A;font-size: 12px;margin-bottom: 10px;margin-top: -20px;">
                            <?php echo date('d/m/Y H:i') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php while ($booking = $result_h->fetch_assoc()) {

                $booking_id       = $booking['id'];
                $sql_booking_list = "SELECT booking_lists.*, nail_types.name as nail_type_name , nail_lists.pic as pic,  
 nail_groups.pic as nail_group_pic FROM `booking_lists` 
                    LEFT JOIN nail_lists ON nail_lists.id = booking_lists.nail_list_id
                    LEFT JOIN nail_types ON nail_types.id = nail_lists.nail_type_id
                    LEFT JOIN nail_groups ON nail_groups.id = nail_lists.nail_group_id
                    WHERE `booking_id` = $booking_id";
                $booking_data     = $mysqli->query($sql_booking_list);

                $image  = '';
                $detail = '';
                while ($bk_row = $booking_data->fetch_assoc()) {
                    if ($bk_row['type'] == 'group') {
                        $group_id   = $bk_row['nail_group_id'];
                        $sql_group  = "SELECT *  FROM `nail_groups` WHERE `id` = $group_id";
                        $data_group = $mysqli->query($sql_group)->fetch_assoc();

                        $image  = $data_group['pic'];
                        $detail .= ' ' . $bk_row['nail_list_name'];
                    } else {
                        $image  = $bk_row['pic'];
                        $detail .= ' ' . $bk_row['nail_list_name'];
                    }
                }
                ?>
                <div class="row booking-history" style="">
                    <div class="col-4">
                        <img src="<?php echo $image ?>" width="100px">
                    </div>
                    <div class="col-8">
                        <h4 class="booking-header">Order: <?php echo $booking['id'] ?></h4>
                        <span class="booking-status"><?php echo ucwords($booking['booking_status']); ?></span>
                        <div style="line-height: 13px;">
                            <span>Order: <?php echo $booking['id'] ?></span>
                            <span class="detail">
                                <?php echo $detail; ?>
                            </span>
                        </div>
                        <div style="margin-top: 20px;">฿<?php echo $booking['total_price']; ?></div>
                        <div style="color: #818182;font-size: 15px;">
                            <i class="far fa-calendar-alt"></i>
                            <?php echo date('d/m/Y', strtotime($booking['booking_date'])) ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="far fa-clock"></i>
                            <?php echo date('H:i', strtotime($booking['time_start'])) ?> -
                            <?php echo date('H:i', strtotime($booking['time_end'])) ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section><!-- #more-features -->
</main>


<button id="" type="button"
        style="padding-top: 10px;" class="menu-footer header-fixed btn" data-toggle="modal">
    <div class="container">
        <div class="row" style="font-size: 28px">
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="fas fa-home"></i>
            </div>
            <div class="col-4" onclick="window.location.href='notification.php';">
                <i class="fas fa-bell"></i>
            </div>
            <div class="col-4" onclick="window.location.href='history.php';">
                <i class="far fa-user"></i>
            </div>
        </div>
    </div>
</button>


<!--==========================
  Footer
============================-->
<?php include_once 'include_footer.php'; ?>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script>


    $(document).ready(function () {
        $('#myCarousel').carousel({
            interval: 10000
        })
        $('.fdi-Carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    });
</script>
</body>
</html>