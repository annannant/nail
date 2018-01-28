<?php

include 'mysql_connection.php';

$id = $_GET['id'];

// -------------------- GET NAIL --------------- // 
$sql_nail    = "SELECT * FROM nail_lists WHERE id = $id ORDER BY id DESC";
$result_nail = $mysqli->query($sql_nail);
$nail_detail = $result_nail->fetch_assoc();


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
            <h1><a href="#" class="scrollto">My Story Nail</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>
        <?php include_once 'include_nav.php'; ?>
    </div>
</header><!-- #header -->


<section id="intro" style="height: 20px;"></section><!-- #intro -->

<main id="main">
    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg" style="    margin-top: 11px;">
        <div class="section-header">
            <h3 class="section-title" style="font-size: 22px;">Detail</h3>
            <span class="section-divider"></span>
        </div>
         <div class="container">
            <div class="h-dz-list">

                <div class="row">                    
                    <div class="col" >
                        <div class="box">
                            <div class="icon">
                                <img style="width: 100%;" src="<?php echo $nail_detail['pic'] ?>">
                            </div>
                            <h4 class="title"><a href=""><?php echo $nail_detail['name'] ?></a></h4>
                        </div>
                    </div> 
               </div>  

                <div class="row" style="background-color: #fff;padding: 10px;">                    
                    <div class="col" style="text-align: center;">
                              <i class="fa fa-user-circle-o" aria-hidden="true"></i>  
                    </div>                
                    <div class="col" >
                              xxxxxx  
                    </div> 
               </div>  





            </div>
        </div>
    </section><!-- #more-features -->


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

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
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
