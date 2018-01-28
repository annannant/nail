<?php
include 'mysql_connection.php';


// -------------------- GET NAIL --------------- //
$nail_group_id = $_GET['id'];

$sql_group    = "SELECT * FROM nail_groups WHERE id = $nail_group_id";
$bullet_group = $mysqli->query($sql_group);
$img_group    = $mysqli->query($sql_group);
$data_group   = $mysqli->query($sql_group)->fetch_assoc();


$sql_list    = "SELECT * FROM nail_lists WHERE nail_group_id = $nail_group_id";
$bullet_list = $mysqli->query($sql_list);
$img_list   = $mysqli->query($sql_list);
$data_list  = $mysqli->query($sql_list);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Avilon Bootstrap Template</title>
    <?php include_once 'include_header.php'; ?>

    <link href="css/cs-style.css" rel="stylesheet">
    <script src="carousel/jquery/jquery.min.js"></script>
    <script src="carousel/jquery/bootstrap.min.js"></script>
    <script src="carousel/jquery/jquery.touchSwipe.min.js"></script>
    <link rel="stylesheet prefetch" href="carousel/css/bootstrap.min.css">
    <script src="carousel/jquery/prefixfree.min.js"></script>
</head>

<body>


<!--==========================
  Header
============================-->
<header id="header" class="header-fixed">
    <div class="container">
        <div id="logo" class="pull-left">
            <h1><a href="#" class="scrollto">My Story Nail</a></h1>
        </div>
        <?php include_once 'include_nav.php'; ?>
    </div>
</header>


<section id="intro" style="height: 20px;"></section><!-- #intro -->

<main id="main">

    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="nail-list" style="    margin-top: 11px; padding-bottom: 50px;">
        <div class="section-header">
            <h3 class="section-title" style="font-size: 22px;">Detail</h3>
            <span class="section-divider"></span>
        </div>
        <div class="container" style="padding: 0px 50px;">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php while ($row_bullet_group = $bullet_group->fetch_assoc()) { ?>
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php } ?>

                    <?php
                    $no = 1;
                    while ($row_bullet_list = $bullet_list->fetch_assoc()) { ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $no;
                        $no++; ?>" class=""></li>
                    <?php } ?> _
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <? while ($row_img_group = $img_group->fetch_assoc()) { ?>
                        <div class="item active">
                            <img src="<?php echo $row_img_group['pic']; ?>">
                        </div>
                    <?php } ?>

                    <?php
                    $no_img = 1;
                    while ($row_img_list = $img_list->fetch_assoc()) { ?>
                        <div class="item">
                            <img src="<?php echo $row_img_list['pic']; ?>?image=<?php echo $no_img; ?>">
                        </div>
                        <?php
                        $no_img++;
                    } ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section><!-- #more-features -->

    <section id="" class="section-bg" style="padding-top: 0px;padding-bottom: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <div class="section-header" data-wow-duration="1s"
                         style="visibility: visible; animation-duration: 1s; animation-name: fadeIn;">
                        <h3 class="section-title"><?php echo $data_group['name'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="advanced-features">
        <div class="features-row" style="padding-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="container" style="border: 1px solid #ccc;background-color: #fff;margin-top: 20px;">
                            <h2>
                                Detail
                            </h2>
                            <ul style="font-size: 20px;">
                                <?php while ($row_data_list = $data_list->fetch_assoc()){ ?>
                                    <li>
                                        #<?php echo $row_data_list['name'] ?>
                                        <div style="font-size: 14px;color: gray;">sss</div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<!-- Modal -->
<div class="modal fade model-cart" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="fade model-cart" >
    ssssss
</div>
<!--==========================
  Footer
============================-->
<button id="menu-footer" type="button" class="header-fixed btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    <div class="container">
        <div id="logo" class="">
            <h1><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add cart
            </h1>
        </div>
    </div>
</button>

<?php include_once 'include_footer.php'; ?>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="js/cs-index.js"></script>
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
