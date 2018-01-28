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
         <link href="css/test.css" rel="stylesheet">   <!-- ใส่css -->
         <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">  <!-- ใส่bootstrap --> 
         <meta content="width=device-width, initial-scale=1.0" name="viewport">

    </head>

    <body>
    <h1>Users</h1>

            <div class="container">

              <div class="row  test">
                <div class="col-lg-6 col-md-6  ">
                  1 of 2
                </div>
                <div class="col-lg-6 col-md-6 ">
                  2 of 2
                </div>
              </div>

              <p></p>  <!-- เว้นบรรทัด -->

              <div class="row">
                <div class="col-lg-4  col-sm-2 ">
                  1 of 3
                </div>
                <div class="col-lg-4  col-sm-2">
                  2 of 3
                </div>
                <div class="col-lg-4 col-sm-2">
                  3 of 3
                </div>
              </div>
            </div>


    </body>
</html>