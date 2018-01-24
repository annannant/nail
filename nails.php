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
        <div class="container">
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

            <div class="row">
                <div class="col" style="padding-right: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://www.thainarak.net/uploads/4/8/5/0/48500987/b789ee92952c5564047023bec691bd56_orig.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
                <div class="col" style="padding-left: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://www.girlsallaround.com/wp-content/uploads/2016/10/78b9a686ef86507b9daada6b6ba454f1-Copy-600x686.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col" style="padding-right: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://thebeautythesis.com/wp-content/uploads/2012/11/48628011.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
                <div class="col" style="padding-left: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://www.thainarak.net/uploads/4/8/5/0/48500987/b789ee92952c5564047023bec691bd56_orig.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col" style="padding-right: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://www.thainarak.net/uploads/4/8/5/0/48500987/b789ee92952c5564047023bec691bd56_orig.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
                <div class="col" style="padding-left: 5px;">
                    <div class="box">
                        <div class="icon">
                            <img style="width: 100%;" src="http://www.fashiontranslated.com/wp-content/uploads/2012/10/316312_10151476818673957_487432530_n.jpg">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    </div>
                </div>
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
