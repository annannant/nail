<?php

include '../mysql_connection.php';

$page = 'nail-group'; // ชีเเถบเมนูfor menu

// -------------------- GET NAIL --------------- //
$sql_nail   = "SELECT * FROM `nail_groups` ORDER BY `nail_groups`.`id` DESC";
$result_group = $mysqli->query($sql_nail);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <?php include 'header.php'; ?>

</head>
<body>

<div class="wrapper">

    <div class="sidebar" data-background-color="white" data-active-color="info">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Nail Group</a>
                </div>
                <!-- <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                    </ul>

                </div> -->
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Set Nail</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select class="form-control border-input">
                                                    <option>Set Nail..</option>
                                                    <option>AAAA</option>
                                                    <option>BBBB</option>
                                                    <option>CCCC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="text-right">
                                                    <a href="nail-group-create.php" class="btn btn-info btn-fill btn-wd">
                                                        <i class="ti-plus"></i>
                                                        Add Nail 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">


                        <?php  while ($row = $result_group->fetch_assoc()) { ?>
                        
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-user nail">
                                    <div class="image">


                                                <a 
                                                href="nail-list.php?nail_group_id=<?php echo $row['id'] ?>" 
                                                title="add" >
                                                     <img src="<?php echo $row['pic'] ?>" alt="...">
                                                </a>

                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12 detail">
                                                <div class="numbers" style="font-size: 17px; text-align: left;">
                                                    <?php echo $row['name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <div class="numbers">
                                            </div>
                                            <hr>
                                            <div class="stats"  style="text-align: right; text-align: right;position: absolute;right: 0px;">
                                                <a href="nail-group-edit.php?id=<?php echo $row['id'] ?>" title="edit" > 
                                                    <i class="ti-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a 
                                                href="nail-group-delete.php?id=<?php echo $row['id'] ?>" 
                                                title="edit" 
                                                onclick="return confirm('Are you sure?')" >
                                                    <i class="ti-close" aria-hidden="true"></i>
                                                <a 
                                                href="nail-new.php?nail_group_id=<?php echo $row['id'] ?>" 
                                                title="add" >
                                                    <i class="ti-plus" aria-hidden="true"></i>
                                                </a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>



                    <?php
                    if (!empty($result_group)) {
                        while ($row = $result_group->fetch_assoc()) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card card-user nail">
                                    <div class="image">
                                        <img src="<?php echo $row['pic'] ?>" alt="...">
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12 detail">
                                                <div class="numbers" style="font-size: 17px; text-align: left;">
                                                    <p><?php echo $row['detail']; ?></p>
                                                    <?php echo $row['name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <div class="numbers">
                                                ฿ <?php echo $row['price']; ?>
                                            </div>
                                            <hr>
                                            <div class="stats"
                                                 style="text-align: right; text-align: right;position: absolute;right: 0px;">
                                                <i class="ti-close" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    , made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative
                        Tim</a>
                </div>
            </div>
        </footer>


    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


</html>
