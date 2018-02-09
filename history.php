<?php
include 'mysql_connection.php';
include 'check_login.php';
$member_id = $_SESSION['member']['id'];

$sql_h    = "SELECT *  FROM `bookings` WHERE `member_id` = $member_id AND  booking_status != 'cart'";
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
            <h1><a href="#" class="scrollto">History</a></h1>
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
                        <h3 class="section-title" style="text-align: left;">History</h3>
                    </div>
                </div>
            </div>
            <?php while ($row = $result_h->fetch_assoc()){


                ?>
                <div class="row" style="background-color: #fff;padding: 15px;">
                    <div class="col-4">
                        <img src="#">
                    </div>
                    <div class="col-8">
                        <h4 style="text-align: left;">Orderx: 44444</h4>
                        <div>
                            <span>Order: 444444</span>
                            dsadsadasdsadas asdas adas dasd
                        </div>
                        <div>sssss</div>
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
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="far fa-bell"></i>
            </div>
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="fas fa-user"></i>
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
