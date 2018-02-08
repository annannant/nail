<?php
include 'mysql_connection.php';
include 'check_login.php';


$date_selected = empty($_GET['date']) ? date('d-m-Y') : $_GET['date'];

$sql    = "SELECT * FROM `time_slots` ORDER BY `time_slots`.`id`  ASC";
$result = $mysqli->query($sql);
$times  = [];
while ($row = $result->fetch_assoc()) {
    $times[] = $row;
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

    <link href="lib/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
    <script src="lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

</head>

<body>


<!--==========================
  Header
============================-->
<header id="header" class="header-fixed">
    <div class="container">
        <div id="logo" class="">
            <h1><a href="#" class="scrollto">Booking Time</a></h1>
        </div>
        <a href="javascript:history.go(-1)" class="menu-nav-toggle pull-left"><i class="fas fa-chevron-left"></i></a>
        <a href="cart.php" class="menu-nav-toggle"><i class="fas fa-shopping-basket"></i></a>
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
<form action="time-slot-post.php" method="post">

    <section id="intro" style="height: 20px;"></section><!-- #intro -->

    <main id="main">

        <!--==========================
          More Features Section
        ============================-->
        <section id="" class="section-bg" style="padding-top: 50px;padding-bottom: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="section-header" data-wow-duration="1s"
                             style="visibility: visible; animation-duration: 1s; animation-name: fadeIn;">
                            <h3 class="" style="font-weight: normal;">Date : </h3>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="input-group mb-3">
                            <input type="text" id="date" name="date" value="<?php echo $date_selected ?>"
                                   class="form-control" style="margin-top: 18px;width: 85%;">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"
                                  style="margin-top: 18px;height: 34px;font-size: 15px;">
                                <i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            var date = new Date();
            date.setDate(date.getDate());
            $('#date').datepicker({
                "format": 'dd-mm-yyyy',
                "setDate": new Date(),
                "startDate": date,
                "autoclose": true
            });

            $('#date').on('change', function () {
                window.location.href = 'time-slot.php?date=' + $(this).val();
            });
        </script>
        <div class="text-open">Open 11.30 - 20.30</div>
        <section id="" class="" style="padding: 0px 20px 20px 20px;min-height: 390px;">
            <div class="container">
                <div class="row">
                    <div class="btn-group" data-toggle="buttons">
                        <?php foreach ($times as $time) {

                            $disabled = '';
                            $start    = date('YmdHis', strtotime($date_selected . ' ' . $time['start']));
                            $end      = date('YmdHis', strtotime($date_selected . ' ' . $time['end']));

                            if ($start < date('YmdHis') || $end < date('YmdHis')) {
                                $disabled = 'disabled';
                            }

                            ?>
                            <label class="col-6 btn btn-default option choose-time-slot <?php echo $disabled ?>"
                                <?php empty($disabled) ? "disabled" : true; ?>
                                   style="font-size: 20px;">
                                <input type="radio" name="time-slot" id="" autocomplete="off" value="<?php echo $time['start']  ?>,<?php echo $time['end']  ?>"
                                ><?php echo $time['name'] ?>
                            </label>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <button id="booking_btn" onclick="return confirm('Are you sure?')" type="submit" class="menu-footer header-fixed btn" data-toggle="modal"
            data-target="#exampleModal">
        <div class="container">
            <div id="logo" class="">
                <h1><i class="fas fa-check"></i></i>
                    Booking
                </h1>
            </div>
        </div>
    </button>
</form>


<!--==========================
  Footer
============================-->
<?php if (!empty($cart_list)) { ?>
    <div id="next_to_order" class="menu-footer header-fixed btn" data-toggle="modal" style="height: 120px"
         data-target="#exampleModal">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="col-2 row-checkbox" style="    margin-top: -10px;">
                        <label class="container-label">
                            <div style="padding-left: 10px;color: #eeeeee">Select All</div>
                            <input type="checkbox" checked="checked"
                                   class="chk_all">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="cart-total-price" style="color: #eeeeee">
                        <div>Total Price: ฿<span id="total_price"><?php echo number_format($total_price, '0', '',
                                    ','); ?></span></div>
                    </div>
                </div>
                <div class="col-4">
                    <button type="button" id="next_to_order_btn" class="btn btn-lg" style="    color: #777;">Next <i
                                class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="booking_id" value="<?php echo $cart_id; ?>">
<?php } ?>

<input type="hidden" id="alreadyLogin" value="<?php echo (!empty($_SESSION['member'])) ? 'true' : 'false' ?>">
<script>
    // ---------------- Price ----------------
    $('.input-qty').on('change', function () {
        getTotalPrice();
    });

    // ---------------- Checked ----------------
    $('.chk_all').on('click', function () {
        if ($(this).is(':checked')) {
            $('.chk_main').prop('checked', true);
            $('.chk').prop('checked', true);
        } else {
            $('.chk_main').prop('checked', false);
            $('.chk').prop('checked', false);
        }
        getTotalPrice();
    });

    $('.chk_main').on('click', function () {
        var group = $(this).attr('data-group');
        var items = '.item_group_' + group;
        if ($(this).is(':checked')) {
            $(items).prop('checked', true);
        } else {
            $(items).prop('checked', false);
        }
        checkAll();
        getTotalPrice();
    });

    $('.chk').on('click', function () {
        var group = $(this).attr('data-group');
        $('#main_group_' + group).prop('checked', true);
        var items = '.item_group_' + group;
        $(items).each(function () {
            if (!$(this).is(':checked')) {
                $('#main_group_' + group).prop('checked', false);
            }
        });
        checkAll();
        getTotalPrice();
    });

    function checkAll() {
        $('.chk_all').prop('checked', true);
        $('.chk').each(function () {
            if (!$(this).is(':checked')) {
                $('.chk_all').prop('checked', false);
            }
        });
    }

    function getTotalPrice() {
        var total_price = 0;
        $('.input-qty').each(function () {
            var id = $(this).attr('data-id');
            if ($('.item_' + id).is(':checked')) {
                var qty   = parseInt($(this).val());
                var price = parseInt($(this).attr('data-price'));
                total_price += qty * price;
            }
        });
        $('#total_price').text(total_price);
    }

    // ---------------- Next to order ----------------

    $('#next_to_order_btn').on('click', function () {

        var booking_id = $('#booking_id').val();
        var dataUpdate = [];

        $('.chk').each(function () {
            var id  = $(this).attr('data-id');
            var qty = $('#quantity_' + id).val();

            if ($(this).is(':checked')) {
                dataUpdate[id] = qty;
            }
        });

        var postData = {
            "booking_id": booking_id,
            "data": dataUpdate
        };

        $.post("cart-post.php", postData, function (data) {
            window.location.href = 'select-time.php';
        }, "json");

    });

</script>
<?php include_once 'include_footer.php'; ?>


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="js/cs-index.js"></script>
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
