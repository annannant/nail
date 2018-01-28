<?php

$a = 'Test';

$user = [
    'name'      => 'Cherry',
    'last_name' => 'Jay',
    'gender'    => 'Female'
];

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Page Title</title>
        <!-- CSS , JS -->
         <link href="css/test.css" rel="stylesheet"> <!-- ใส่css -->
         <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">  <!-- ใส่bootstrap -->
         <meta content="width=device-width, initial-scale=1.0" name="viewport">

    </head>

    <body>
    <h1>Users</h1>

            <div class="container">
              <div class="row  test">
                <div class="col">
                  1 
                </div>
                <div class="col">
                  2 
                </div>              
              </div>

              <div class="row">
                <div class="col">
                  3
                </div>
                <div class="col">
                  4
                </div>
                <div class="col">
                  5
                </div>
                <div class="col">
                  6
                </div>              
              </div>
            </div>



    <?php foreach ($user as $key => $value){ ?>

        <p style="color:blue;">
            <?php echo $value; ?>
        </p>

    <?php } ?>

    <div class = "text-pink" >
        BBB

    </div>


    </body>
</html>