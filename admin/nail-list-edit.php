<?php

include '../mysql_connection.php';


$page = 'nail-group'; // for menu
$id = $_GET['id'];//เอาค่าเดิมมาใส่จากurl เวลาrun
$sql_nail = "SELECT * FROM `nail_lists` WHERE id = $id";
$result_nail = $mysqli->query($sql_nail);
$row = $result_nail->fetch_assoc();

// echo "<pre>";
// print_r($row);
// die;
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
                    <a class="navbar-brand" href="#">New Nail</a>
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
                    <div class="col-lg-2 col-md-3"></div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit nail</h4>
                            </div>
                            <div class="content">
                                <form action="nail-list-edit-post.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control border-input" 
                                                placeholder="Name" value="<?php echo $row['name']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Detail</label>
                                                <input type="text" name="detail" class="form-control border-input" 
                                                placeholder="Detail" value="<?php echo $row['detail']?>">
                                            </div>
                                        </div>
                                    </div>

                                   <!--  <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <input type="text" name="type" class="form-control border-input" 
                                                placeholder="Type" value="">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Price</label>
                                                
                                                <input type="text" name="price" id="฿"class="form-control border-input"  
                                                 placeholder="Price฿" value="<?php echo $row['price']?>">
                                                <!--  //ใช้javascriptเขียน฿ -->
                                                <!-- <input type="฿" value="฿"> -->
                                                <!-- <span>฿</span>   -->           
                                            </div>
                                        </div>
                                    </div>     
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <input type="file" name="pic" class="form-control border-input" 
                                                placeholder="" value="">

                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="nail_group_id" class="form-control border-input" 
                                    placeholder="" value="<?php echo $row['nail_group_id']?>">
                                               
                                    <input type="hidden" name="old_pic" value="<?php echo $row["pic"]?>" >

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                                    </div>
                                    <p></p>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer">
            <?php include 'footer.php'; ?>
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
