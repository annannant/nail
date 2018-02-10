<?php

include '../mysql_connection.php';

if (!empty($_SESSION['employees'])) {
    echo "<script>window.location.href='index.php'</script>";
}

if (!empty($_POST)) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql    = "SELECT *  FROM `employees` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
    $result = $mysqli->query($sql);
    if (empty($result)) {
        echo "<script>alert('Login fail!');</script>";
        echo "<script>window.location='login.php'</script>";
    } else {
        $_SESSION['employees'] = $result->fetch_assoc();
        echo "<script>window.location='index.php'</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <?php include 'header.php'; ?>

</head>
<body>

<div class="wrapper default">
    <div class="registration-wrapper">
        <div class="header">
            <i class="fas fa-user-circle" style="font-size: 120px;"></i>
            <h5>Admin</h5>
        </div>
        <div class="content-wrapper">
            <div class="content">
                <form id="" action="" method="post">
                    <div style="padding-bottom: 10px;"><i class="fas fa-user" style="font-size: 30px;"></i> Admin Login
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="email" class="form-control border-input"
                                       placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" class="form-control border-input"
                                       placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="text-center" style="padding: 20px 20px 30px 20px;">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                    </div>
                    <div class="clearfix"></div>
                </form>

            </div>
        </div>
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
