<?php
session_start();
include 'mysql_connection.php';

// -------------------- GET NAIL --------------- //
$sql_top_nail    = "SELECT * FROM nail_groups WHERE suggestion = 1 ORDER BY id asc LIMIT 10";
$result_top_nail = $mysqli->query($sql_top_nail);


$nail_type_id  = '';
$collection_id = '';

$sql_nail = "SELECT nail_groups.* FROM nail_lists LEFT JOIN nail_groups 
ON nail_groups.id = nail_lists.nail_group_id WHERE nail_groups.id > 0 ";

if (!empty($_GET['nail_type_id'])) {
    $nail_type_id = $_GET['nail_type_id'];
    $sql_nail     .= " AND nail_lists.nail_type_id = $nail_type_id";
}

if (!empty($_GET['collection_id'])) {
    $collection_id = $_GET['collection_id'];
    $sql_nail      .= " AND nail_lists.collection_id = $collection_id";
}

$sql_nail    .= " GROUP BY nail_groups.id ORDER BY nail_groups.id DESC";
$result_nail = $mysqli->query($sql_nail);

//echo $sql_nail;
//die;

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
            <h1><a href="#" class="scrollto">My Story Nail</a></h1>
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
        <div class="section-header">
            <h3 class="section-title" style="font-size: 22px;">Suggestion</h3>
            <span class="section-divider"></span>
        </div>
        <div class="container">
            <div class="h-dz-list">
                <ul>
                    <?php while ($top = $result_top_nail->fetch_assoc()) { ?>
                        <li class="" onclick="window.location.href='detail.php?id=<?php echo $top['id']; ?>'">
                            <div class="dz-inner">
                                <div class="img">
                                    <img src="<?php echo $top['pic']; ?>"
                                    ></div>
                                <div class="detail" style="background: #ffff;">
                                    <strong class="name"><?php echo $top['name']; ?></strong>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="section-header">
                <form id="nail-form" action="?" method="get" role="form" class="">
                    <div class="form-row">
                        <?php
                        $sql_type    = "SELECT * FROM nail_types ORDER BY id DESC";
                        $result_type = $mysqli->query($sql_type);

                        ?>
                        <div class="form-group col-6">
                            <label class="" for="inputGroupSelect01"><i class="fas fa-paint-brush"></i>
                                Type</label>
                            <div class="input-group mb-3">
                                <select name="nail_type_id"
                                        class="custom-select select-nail select-test" id="inputGroupSelect01">
                                    <option value="">All</option>
                                    <?php while ($row_type = $result_type->fetch_assoc()) {
                                        $type_selected = ($nail_type_id == $row_type['id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $row_type['id']; ?>" <?php echo $type_selected; ?>>
                                            <?php echo $row_type['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $sql_collection    = "SELECT * FROM collections ORDER BY id DESC";
                        $result_collection = $mysqli->query($sql_collection);
                        ?>
                        <div class="form-group col-6">
                            <label class="" for="inputGroupSelect02"><i class="fas fa-paint-brush"></i>
                                Collection</label>
                            <div class="input-group mb-3">
                                <select name="collection_id" class="custom-select select-nail select-test"
                                        id="inputGroupSelect02">
                                    <option value="">All</option>
                                    <?php
                                    while ($row_collection = $result_collection->fetch_assoc()) {
                                        $collection_selected = ($collection_id == $row_collection['id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $row_collection['id']; ?>" <?php echo $collection_selected; ?> >
                                            <?php echo $row_collection['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function () {
                            $('.select-nail').on('change', function () {
                                $('#nail-form').submit();
                            });
                        });
                    </script>
                </form>
            </div>

            <div class="row row-nail-list">
                <?php while ($row = $result_nail->fetch_assoc()) { ?>
                    <div class="col-6 row-nail-list" style=""
                         onclick="window.location.href='detail.php?id=<?php echo $row['id']; ?>'">
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

<button id="" type="button"
        style="padding-top: 10px;" class="menu-footer header-fixed btn" data-toggle="modal">
    <div class="container">
        <div class="row" style="font-size: 28px">
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="fas fa-home"></i>
            </div>
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="fas fa-bell"></i>
            </div>
            <div class="col-4" onclick="window.location.href='index.php';">
                <i class="far fa-user"></i>
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
