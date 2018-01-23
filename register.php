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
            <h1><a href="#" class="scrollto">Register</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="#intro">Home</a></li>
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
                            <i class="fa fa-user-circle" aria-hidden="true"
                               style="font-size: 100px;    color: #639e9d;"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Name" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                           placeholder="Last Name" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="email" class="form-control" id="email"
                                           placeholder="Email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="Phone" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="username" class="form-control" id="username"
                                           placeholder="Username" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="password" class="form-control" id="password"
                                           placeholder="Password" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="text-center" style="margin-top: 20px;">
                                <button type="submit" title="Send Message" style="width: 200px;">Register</button>
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
<?php include_once 'include_footer.php'?>
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

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>
