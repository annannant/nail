<?php
include 'mysql_connection.php';

// -------------------- GET NAIL --------------- //
$sql_top_nail    = "SELECT * FROM nail_lists ORDER BY id asc LIMIT 10";
$result_top_nail = $mysqli->query($sql_top_nail);

$sql_nail    = "SELECT * FROM nail_lists ORDER BY id DESC";
$result_nail = $mysqli->query($sql_nail);


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

        <div id="logo" class="pull-left">
            <h1><a href="#" class="scrollto">My Story Nail</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>
        <?php include_once 'include_nav.php'; ?>
    </div>
</header><!-- #header -->


<section id="intro" style="height: 20px;"></section><!-- #intro -->

<main id="main">
    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg nail-list" style="    margin-top: 11px;">
        <div class="section-header">
            <h3 class="section-title" style="font-size: 22px;">Suggestion</h3>
            <span class="section-divider"></span>
        </div>
        <div class="container">
            <div class="h-dz-list">
                <ul>
                    <?php while ($top = $result_top_nail->fetch_assoc()) { ?>
                        <li class="">
                            <div class="dz-inner">
                                <div class="img">
                                    <img src="<?php echo $top['pic']; ?>"
                                    ></div>
                                <div class="detail" style="background: #ffff;">
                                    <strong  class="name"><?php echo $top['name']; ?></strong>
                                    <span class="compare"><?php echo $top['price']; ?> บาท</span></div>
                            </div>
                        </li>

                    <?php } ?>

            </div>

            <div class="section-header">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Set Nail</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Nail Short</option>
                            <option value="2">Nail Long</option>
                            <option value="3">Pastel</option>
                        </select>
                    </div>
                </form>
            </div>

            <?php
            $count = 1;
            if (!empty($result_nail)) {
                while ($row = $result_nail->fetch_assoc()) {
                    if ($count == 1) {
                        echo '<div class="row">';
                    } ?>
                    <div class="col" style="">
                        <div class="box">
                            <div class="icon">
                                <img style="width: 100%;"
                                     src="<?php echo $row['pic']; ?>">
                            </div>
                            <h4 class="title"><a href=""><?php echo $row['name']; ?></a></h4>
                        </div>
                    </div>
                    <?php
                    if ($count == 2) {
                        echo '</div>';
                        $count = 0;
                    }
                    $count++;
                }
            } ?>
        </div>
    </section><!-- #more-features -->


</main>

<!--==========================
  Footer
============================-->
<?php include_once 'include_footer.php'; ?>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
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
