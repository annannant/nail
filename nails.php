<?php
include 'mysql_connection.php';

// -------------------- GET NAIL --------------- //
$sql_top_nail    = "SELECT * FROM nail_groups WHERE suggestion = 1 ORDER BY id asc LIMIT 10";
$result_top_nail = $mysqli->query($sql_top_nail);

$sql_nail    = "SELECT * FROM nail_groups ORDER BY id DESC";
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
                                    <span class="compare"><?php //echo $top['price']; ?> บาท</span></div>
                            </div>
                        </li>

                    <?php } ?>

            </div>

            <?php
                $sql_type = "SELECT * FROM nail_types ORDER BY id DESC";
                $result_type = $mysqli->query($sql_type);
            ?>
            <div class="section-header">
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    <i class="ti-panel"></i> Nail Type
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                    <a class="dropdown-item" href="#">All</a>
                                    <?php
                                    while ($row_type = $result_type->fetch_assoc()){ ?>
                                        <a class="dropdown-item" href="?type=1"><?php echo $row_type['name'] ?></a>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    <i class="ti-panel"></i> Collection
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row row-nail-list">
                <?php while ($row = $result_nail->fetch_assoc()) { ?>
                    <div class="col-6 row-nail-list" style="">
                        <div class="box">
                            <div class="icon">
                                <img style="width: 100%;" src="<?php echo $row['pic']; ?>">
                            </div>
                            <h4 class="title"><a href=""><?php echo $row['name']; ?></a></h4>
                        </div>
                    </div>
                <?php } ?>
            </div>

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
