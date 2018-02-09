<?php
include 'mysql_connection.php';
include 'check_login.php';

$member_id  = $_SESSION['member']['id'];
$booking_id = $_GET['booking_id'];

$sql_booking  = "SELECT *  FROM `bookings` WHERE `id` = $booking_id";
$booking_data = $mysqli->query($sql_booking)->fetch_assoc();

$sql_booking_list    = "SELECT booking_lists.*, nail_types.name as nail_type_name , nail_lists.pic as pic  
FROM `booking_lists` 
LEFT JOIN nail_lists ON nail_lists.id = booking_lists.nail_list_id
LEFT JOIN nail_types ON nail_types.id = nail_lists.nail_type_id
WHERE `booking_id` = $booking_id";
$result_booking_list = $mysqli->query($sql_booking_list);

$booking_type_list  = [];
$booking_type_group = [];

if (!empty($result_booking_list)) {
    while ($row_list = $result_booking_list->fetch_assoc()) {
        $group_id = $row_list['nail_group_id'];
        if ($row_list['type'] == 'group') {
            $booking_type_group[$group_id][] = $row_list;
        } else {
            $booking_type_list[$group_id][] = $row_list;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mystorynail</title>
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
        <div class="container">
            <div id="logo" class="">
                <h1><a href="#" class="scrollto">BILL</a></h1>
            </div>
            <a href="javascript:history.go(-1)" class="menu-nav-toggle pull-left"><i
                        class="fas fa-chevron-left"></i></a>
            <a href="cart.php" class="menu-nav-toggle"><i class="fas fa-shopping-basket"></i></a>
            <?php include_once 'include_nav.php'; ?>
        </div>
</header>

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
    <section id="" class="cart" style="margin-top: 11px; padding-bottom: 50px;">
        <div class="container container-cart">
            <div class="row header" style="line-height: 35px;font-size: 18px;border-bottom: 1px solid #aaa;">
                <div class="col-6">
                    <div>Customer ID</div>
                </div>
                <div class="col-6">
                    <div><?php echo $booking_data['member_id']; ?></div>
                </div>
                <div class="col-6">
                    <div>Booking ID</div>
                </div>
                <div class="col-6">
                    <div><?php echo $booking_data['id']; ?></div>
                </div>
                <div class="col-6" style="font-size: 16px;">
                    <div>DATE : <?php echo date('d/m/Y', strtotime($booking_data['booking_date'])); ?></div>
                </div>
                <div class="col-6" style="font-size: 16px;">
                    <div>TIME : <?php echo date('H:i', strtotime($booking_data['time_start'])); ?>
                        - <?php echo date('H:i', strtotime($booking_data['time_end'])); ?></div>
                </div>
            </div>
            <div class="row row-bill">
                <?php foreach ($booking_type_group as $group_id => $bk_groups) {
                    $sql_group  = "SELECT *  FROM `nail_groups` WHERE `id` = $group_id";
                    $data_group = $mysqli->query($sql_group)->fetch_assoc();

                    $sql_nail_list    = "SELECT nail_lists.*,  nail_types.name as nail_type_name FROM `nail_lists` 
                    LEFT JOIN nail_types ON nail_types.id = nail_lists.nail_type_id WHERE `nail_group_id` = $group_id";
                    $result_nail_list = $mysqli->query($sql_nail_list);

                    ?>
                    <div class="col-12" style="border-bottom: 1px solid #ccc;">
                        <div class="row row-bill-group" style="border-bottom: none;">
                            <div class="col-3 padding-none">
                                <img src="<?php echo $data_group['pic'] ?>">
                            </div>
                            <div class="col-9 padding-none">
                                <div style="font-size: 14px;font-weight: bold;">
                                    #<?php echo $data_group['id'] ?> <?php echo $data_group['name'] ?></div>
                                <br>
                            </div>
                        </div>
                        <div class="row row-bill-list">
                            <div class="col-9">
                                <ul style="font-size: 14px; padding-left: 0px;">
                                    <?php while ($nail_list = $result_nail_list->fetch_assoc()) { ?>
                                        <li><?php echo $nail_list['name'] ?>
                                            :<?php echo $nail_list['nail_type_name'] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-3" style="text-align: right;">
                                <div>฿<?php echo $data_group['price_set'] ?></div>
                                <div style="font-size: 11px;">(price set)</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($booking_type_list as $group_id => $bk_lists) {
                    $sql_group  = "SELECT *  FROM `nail_groups` WHERE `id` = $group_id";
                    $data_group = $mysqli->query($sql_group)->fetch_assoc();

                    ?>
                    <div class="col-12">
                        <?php foreach ($bk_lists as $bk_list) { ?>
                            <div class="row row-bill-group" style="border-bottom: none;">
                                <div class="col-3 padding-none">
                                    <img src="<?php echo $bk_list['pic'] ?>">
                                </div>
                                <div class="col-7 padding-none">
                                    <div style="font-size: 14px;font-weight: bold;">
                                        #<?php echo $bk_list['id'] ?> <?php echo $data_group['name'] ?></div>
                                    <div><?php echo $bk_list['nail_list_name'] ?>
                                        :<?php echo $bk_list['nail_type_name'] ?> <span
                                                style="color: #1b6d85;"> x <?php echo $bk_list['qty'] ?> </span></div>
                                </div>
                                <div class="col-2" style="text-align: right;">
                                    <div>฿<?php echo $bk_list['amount'] ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="row row-bill-total">
                <div class="col-7 padding-none">
                    <h4>Total Price</h4>
                </div>
                <div class="col-5" style="text-align: right; ">
                    <h4>฿<?php echo $booking_data['total_price'] ?></h4>
                </div>
            </div>
            <div class="row" style="">
                <div style="padding-top: 10px;color: darkred;font-size: 16px;">*** Please more late 15 minute. ***</div>
            </div>
        </div>

        <div class="container container-cart"  style="border: none;">
            <div class="row" style="border: none;">
                <div class="col-6" style="text-align: right;">
                    <button type="button" class="btn btn-default" style="width: 140px;height: 45px;">
                        <i class="far fa-credit-card" style="padding-right: 6px;"></i>  Payment</button>
                </div>
                <div class="col-6" style="text-align: left;">
                    <button type="button" class="btn btn-default" style="width: 140px;height: 45px;">
                        <i class="far fa-edit" style="padding-right: 6px;"></i>  Edit</button>
                </div>
            </div>
        </div>
    </section><!-- #more-features -->
</main>
<button id="" type="button" onclick="window.location.href='index.php';"
        class="menu-footer header-fixed btn" data-toggle="modal">
    <div class="container">
        <div id="logo" class="">
            <h1>
                <i class="fas fa-chevron-left"></i>
                Home
                <i class="fas fa-home"></i>
            </h1>
        </div>
    </div>
</button>
<input type="hidden" id="alreadyLogin" value="<?php echo (!empty($_SESSION['member'])) ? 'true' : 'false' ?>">
<script>
    // ---------------- Price ----------------
    $('.input-qty').on('change', function () {

        if ($(this).val() == 0) {
            if (confirm("Do you want to delete this item ?")) {
                window.location.href = "cart-delete.php?id=" + $(this).attr('data-id') + "";
                return
            }
        }

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
        // check 10
        var list_qty = 0;
        $('.chk_list[data-type="list"]:checked').each(function () {
            var qty = '#quantity_' + $(this).attr('data-id');
            qty     = parseInt($(qty).val());
            list_qty += qty;
        });

        var group_qty = 0;
        $('.chk_list[data-type="group"]:checked').each(function () {
            group_qty += 10;
        });

        if ((list_qty + group_qty) != 10) {
            alert("Please choose total nail equal 10 item");
            return;
        }

        var dataUpdate = [];

        $('.chk').each(function () {
            var id  = $(this).attr('data-id');
            var qty = $('#quantity_' + id).val();

            if ($(this).is(':checked')) {
                dataUpdate[id] = qty;
            }
        });

        var postData = {
            "data": dataUpdate
        };

        $.post("cart-post.php", postData, function (data) {
            window.location.href = 'time-slot.php';
        });
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
