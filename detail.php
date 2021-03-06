<?php
include 'mysql_connection.php';

// -------------------- GET NAIL ID --------------- //
$nail_group_id = $_GET['id'];

// -------------------- FIND GROUP DATA --------------- //
$sql_group    = "SELECT * FROM nail_groups WHERE id = $nail_group_id";
$result_group = $mysqli->query($sql_group);
$data_group   = $mysqli->query($sql_group)->fetch_assoc();

// -------------------- FIND LIST NAIL --------------- //
$sql_list    = "SELECT * FROM nail_lists WHERE nail_group_id = $nail_group_id ";
$result_list = $mysqli->query($sql_list);


$arr_lis = [];
while ($row = $result_list->fetch_assoc()) {
    $arr_list[] = $row;
}


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
        <div id="logo" class="">
            <h1><a href="#" class="scrollto" style="font-size: 18px;"><?php echo $data_group['name'] ?></a></h1>
        </div>
        <a href="cart.php" class="menu-nav-toggle"><i class="fas fa-shopping-basket"></i></a>
        <a href="index.php" class="menu-nav-toggle pull-left"><i
                    class="fas fa-chevron-left"></i></a>
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

                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                    <?php
                    $no = 1;
                    foreach ($arr_list as $list) { ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $no;
                        $no++; ?>" class=""></li>
                    <?php } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo $data_group['pic']; ?>">
                    </div>
                    <?php
                    $no_img = 1;
                    foreach ($arr_list as $list) { ?>
                        <div class="item">
                            <img src="<?php echo $list['pic']; ?>?image=<?php echo $no_img; ?>">
                        </div>
                        <?php
                        $no_img++;
                    } ?>
                </div>

                <!-- Controls ซ้ายขวารุป-->
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
                            <h4>
                                Detail
                            </h4>
                            <ul style="font-size: 18px;">
                                <?php
                                foreach ($arr_list as $list) { ?>
                                    <li>
                                        #<?php echo $list['name'] ?>
                                        <div style="font-size: 14px;color: gray;"><?php echo $list['detail'] ?></div>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div style="padding-bottom: 15px">
                                <h4>
                                    Price set : ฿<?php echo $data_group['price_set']; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<div class="modal-cart " style="display: none;">
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
                <div class="close-modal-cart"><i class="fa fa-times"></i></div>
            </div>
        </div>
        <div class="row options choose-nail">
            <div class="col-12">Choose nail</div>
            <div class="col-12">
                <!--Checkbox butons-->
                <div class="btn-group" data-toggle="buttons">
                    <?php foreach ($arr_list as $list) { ?>
                        <label class="btn btn-default  option choose-nail-item"
                               data-id="<?php echo $list['id'] ?>"
                               data-price="<?php echo $list['price'] ?>"
                               data-pic="<?php echo $list['pic'] ?>"
                               data-name="<?php echo $list['name'] ?>"
                               data-group-name="<?php echo $data_group['name'] ?>"
                               data-group-id="<?php echo $list['nail_group_id'] ?>"
                               data-type="list"
                               style="font-size: 12px;">
                            <input type="radio" name="group" id="<?php echo $list['id'] ?>"
                                   autocomplete="off"><?php echo $list['name'] ?>
                        </label>
                    <?php } ?>

                    <label class="btn btn-default  option choose-nail-item price-set-item" style="font-size: 12px;"
                           data-group-name="<?php echo $data_group['name'] ?>"
                           data-group-id="<?php echo $list['nail_group_id'] ?>"
                           data-pic="<?php echo $data_group['pic'] ?>"
                           data-price-set="<?php echo $data_group['price_set']; ?>"
                           data-type="group">
                        <input type="radio" name="group" id="<?php echo $list['id'] ?>"
                               autocomplete="off">Price set : ฿<?php echo $data_group['price_set']; ?>
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
                    <input type="text" id="quantity" name="quant[1]" class="form-control input-number" value="1" min="1"
                           max="10">
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
<button id="add-cart" type="button" class="menu-footer header-fixed btn" data-toggle="modal"
        data-target="#exampleModal">
    <div class="container">
        <div id="logo" class="">
            <h1><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Add cart
            </h1>
        </div>
    </div>
</button>
<input type="hidden" id="alreadyLogin" value="<?php echo (!empty($_SESSION['member'])) ? 'true' : 'false' ?>">
<script>
    $('#add-cart').on('click', function () {
        $('.modal-cart').show().addClass('animated slideInUp');
    });

    $('.close-modal-cart').on('click', function () {
        $('.modal-cart').hide();
    });

    // ==================== Add To Cart ====================
    $('.add-item-cart').on('click', function () {
        var data = {
            "qty": $('#quantity').val(),
            "type": $('.choose-nail-item.active').attr('data-type'),
            "price": $('.choose-nail-item.active').attr('data-price'),
            "pic": $('.choose-nail-item.active').attr('data-pic'),
            "name": $('.choose-nail-item.active').attr('data-name'),
            "group_name": $('.choose-nail-item.active').attr('data-group-name'),
            "nail_list_id": $('.choose-nail-item.active').attr('data-id'),
            "nail_group_id": $('.choose-nail-item.active').attr('data-group-id'),
            "price_set": $('.choose-nail-item.active').attr('data-price-set')
        };

        if (data.type === undefined) {
            alert('Please choose nail!');
            return;
        }

        $.post("detail-post.php", data, function (resp) {
            if (resp.error !== undefined) {
                if (resp.error == 'nologin') {
                    window.location.href = 'login.php';
                    return
                } else {
                    alert(resp.error);
                    return;
                }
            } else {
                window.location.href = 'cart.php';
            }
        }, "json").success(function () {
        });

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
    // ----------- End QTY -----------

</script>

</body>
</html>
