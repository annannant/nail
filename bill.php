<?php
include 'mysql_connection.php';
include 'check_login.php';

$member_id  = $_SESSION['member']['id'];
$booking_id = $_GET['booking_id'];

$sql_booking = "SELECT *  FROM `bookings` WHERE `id` = $booking_id";
$booking_data     = $mysqli->query($sql_booking)->fetch_assoc();

$sql_booking_list    = "SELECT *  FROM `booking_lists` WHERE `booking_id` = $booking_id";
$result_booking_list = $mysqli->query($sql_booking_list);

$booking_list = [];
if (!empty($result_booking_list)) {
    while ($row_list = $result_booking_list->fetch_assoc()) {
        $booking_list[] = $row_list;
    }
}

$total_price = 0;

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
                <div class="col-6" >
                    <div><?php echo $booking_data['id']; ?></div>
                </div>
                <div class="col-6"  style="font-size: 16px;">
                    <div>DATE : <?php echo date('d/m/Y', strtotime($booking_data['booking_date'])); ?></div>
                </div>
                <div class="col-6"  style="font-size: 16px;">
                    <div>TIME :  <?php echo date('H:i', strtotime($booking_data['time_start'])); ?> -  <?php echo date('H:i', strtotime($booking_data['time_end'])); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">ddd</div>
                        <div class="col-64">xxx</div>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($cart_list as $group => $list) { ?>

            <div class="container container-cart">
                <div class="row header">
                    <div class="col-2 row-checkbox" style="    margin-top: -10px;">
                        <label class="container-label">
                            <input type="checkbox"
                                   id="main_group_<?php echo $list[0]['nail_group_id'] ?>"
                                   data-group="<?php echo $list[0]['nail_group_id'] ?>"
                                   class="chk_main group_<?php echo $list[0]['nail_group_id'] ?>"
                                   checked="checked">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-8 row-detail">
                        <label style="font-size: 16px;"><?php echo $list[0]['nail_group_name'] ?></label>
                        <div class="input-group" style="width: 120px;">
                        </div>
                    </div>
                    <div class="col-2">
                        <div><a href="detail.php?id=<?php echo $list[0]['nail_group_id'] ?>"
                                class="sf-with-ul" title="Edit"><i class="fas fa-edit"></i></a></div>
                    </div>
                </div>

                <?php foreach ($list as $item) { ?>
                    <div class="row">
                        <div class="col-2 row-checkbox">
                            <label class="container-label">
                                <input type="checkbox" checked="checked"
                                       data-id="<?php echo $item['id'] ?>"
                                       data-type="<?php echo $item['type'] ?>"
                                       data-group="<?php echo $item['nail_group_id'] ?>"
                                       class="chk chk_list item_group_<?php echo $item['nail_group_id'] ?>
                                       item_<?php echo $item['id'] ?>">

                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-8 row-detail">
                            <div style="margin-bottom: 10px;">
                                #<?php echo $item['nail_list_name'] ?>
                            </div>
                            <?php
                            $display_none = '';
                            if ($item['type'] == 'group') {
                                $display_none = 'display:none;';
                            }
                            ?>
                            <div class="input-group" style="width: 120px;<?php echo $display_none ?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number btn-qty"
                                            data-type="minus"
                                            data-id="<?php echo $item['id'] ?>"
                                            data-field="quant[<?php echo $item['id'] ?>]">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </div>
                                <input type="text" id="quantity_<?php echo $item['id'] ?>"
                                       data-id="<?php echo $item['id'] ?>"
                                       data-price="<?php echo $item['price'] ?>"
                                       name="quant[<?php echo $item['id'] ?>]"
                                       class="form-control input-number input-qty"
                                       value="<?php echo $item['qty'] ?>" min="0" max="10">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number btn-qty" data-type="plus"
                                            data-id="<?php echo $item['id'] ?>"
                                            data-field="quant[<?php echo $item['id'] ?>]">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div id="price<?php echo $item['id'] ?>" data-val="<?php echo $item['price'] ?>">
                                ฿<?php echo $item['price'] ?>
                            </div>
                            <?php
                            $total_price += $item['amount'];
                            ?>

                            <?php if ($item['type'] == 'group') { ?>
                                <div class="col-12" style="text-align: left;text-align: left;margin-top: 20px;">
                                    <div style="">
                                        <a href="cart-delete.php?id=<?php echo $item['id'] ?>"
                                           onclick="return confirm('Are you sure?')"
                                           class="sf-with-ul" title="Edit"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

    </section><!-- #more-features -->


</main>


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
<?php } ?>

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
