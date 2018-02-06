<?php
/**
 * Created by PhpStorm.
 * User: riwbiw
 * Date: 2/4/2018 AD
 * Time: 3:24 PM
 */
?>

<html>
    <body>
        <h1>GET</h1>

        <form action="form-get-post.php" method="get">
            Name : <input name="name" >
            <br>
            Last Name : <input name="last_name" >
            <br>
            <input type="submit" value="submit">
        </form>

        <?php
        print_r($_GET);
        ?>

        <h1>POST</h1>
        <form action="form-get-post.php" method="post">
            Name : <input name="name" >
            <br>
            Last Name : <input name="last_name" >
            <br>
            <input type="submit" value="submit">
        </form>

        <?php
        print_r($_POST);
        ?>
    </body>
</html>
