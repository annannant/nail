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
$img_list    = $mysqli->query($sql_list);
$data_list   = $mysqli->query($sql_list);


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

<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="index.php">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="menu-has-children"><a href="#">Drop Down 2</a>
                    <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
            </ul>
        </li>
        <li><a href="#contact">Contact Us</a></li>
    </ul>
</nav><!-- #nav-menu-container -->

<script>
    $(document).on('click', '#mobile-nav-toggle', function (e) {
        // $('body').toggleClass('mobile-nav-active');
        // $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
        // $('#mobile-body-overly').toggle();
    });
</script>

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
                                <?php while ($row_data_list = $data_list->fetch_assoc()) { ?>
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


<div class="modal-cart wow" style="display: none;">
    <div class="container">
        <div class="row detail">
            <div class="col-5">
                <div class="pic-product">
                    <img src="<?php echo $data_group['pic']; ?>"/ >
                </div>
            </div>
            <div class="col-6">
                <div class="detail-product">
                    <?php echo $data_group['name']; ?>
                </div>
            </div>
            <div class="col-1">
                <button type="button" class="close-modal-cart"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="row options">
            <div class="col-12">Choose nail</div>
            <div class="col-12">
                <!--Checkbox butons-->
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default  option active">
                        <input type="radio" name="group" id="x" checked autocomplete="off"> radio 1 (pre-checked)
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                    <label class="btn btn-default  option active">
                        <input type="radio" name="group" id="x" checked autocomplete="off"> radio 1 (pre-checked)
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                    <label class="btn btn-default option ">
                        <input type="radio" name="group" id="x" autocomplete="off"> radio 3 xxxxxx
                    </label>

                </div>
                <!--Checkbox butons-->
            </div>
        </div>
        <div class="row actions">
            <div class="col-12 row-qty">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus"
                                data-field="quant[1]">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                    </div>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-12 row-btn">
                <button type="button" class="add-item-cart header-fixed btn">Add to cart</button>
            </div>
        </div>
    </div>
</div>
<!--==========================
  Footer
============================-->
<button id="add-to-cart" type="button" class="menu-footer header-fixed btn" data-toggle="modal"
        data-target="#exampleModal">
    <div class="container">
        <div id="logo" class="">
            <h1><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add cart
            </h1>
        </div>
    </div>
</button>

<script>
    $('#add-to-cart').on('click', function () {
        $('.modal-cart').show().addClass('animated slideInUp');

    });

    $('.close-modal-cart').on('click', function () {
       $('.modal-cart').hide();
    });

</script>

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


<script>
    // ---------------- increase decrease button ----------------
    // plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function (e) {
        e.preventDefault();

        fieldName      = $(this).attr('data-field');
        type           = $(this).attr('data-type');
        var input      = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        minValue     = parseInt($(this).attr('min'));
        maxValue     = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        var name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

</body>
</html>
