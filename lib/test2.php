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
    </head>
    <body>
    <h1>Users</h1>

    <?php foreach ($user as $key => $value){ ?>

        <p style="color:red;">
            <?php echo $value; ?>
        </p>

    <?php } ?>

    </body>
</html>