<?php
session_start();

include 'mysql_connection.php';

if (!empty($_SESSION['member'])) {
    echo "<script>window.location.href='index.php'</script>";
}

if (!empty($_POST)) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql    = "SELECT *  FROM `members` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
    $result = $mysqli->query($sql);
    if (empty($result)) {
        echo "<script>alert('Login fail!');</script>";
        echo "<script>window.location='login.php'</script>";
    } else {
        $_SESSION['member'] = $result->fetch_assoc();
        echo "<script>window.location='index.php'</script>";
    }
}

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

        <div id="logo" class="pull-left">
            <h1><a href="#" class="scrollto">Login</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>
        <?php include_once 'include_nav.php'; ?>
    </div>
</header><!-- #header -->

<section id="intro" style="height: 20px;"></section><!-- #intro -->

<main id="main">

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="registration">
        <div class="container">
            <div class="row wow">

                <div class="col-lg-4 col-md-4">
                    <div class="contact-about">
                        <div class="user" style="padding: 20px; text-align: center;">
                            <i class="fa fa-diamond" aria-hidden="true"
                               style="font-size: 100px;    color: #639e9d;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="email" class="form-control" id="email"
                                           placeholder="E-mail"/>
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="password" name="password" class="form-control" id="password"
                                           placeholder="Password"/>
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" title="Login"
                                        style="width: 200px;margin-top: 20px;">Login
                                </button>
                                <a href="register.php" title="Register" class="btn"
                                   style="width: 200px; border: 1px solid #7abfbe;background: #ffff;color: #7abfbe;margin-top: 15px;">
                                    Register</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

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

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>
