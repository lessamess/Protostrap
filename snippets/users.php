<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


// Navigation
    // *** STATIC TOP NAVBAR ***
    // This defines which navigation item is active. each pair of quotes corressponds to an item
    // DO NOT REMOVE
    $navbarClasses = Array('active','','','','','','','','');
    $tabbarClasses = Array('active','','','','','','','','','','','','','','','','');
    $subnavClasses = Array('','','','','','','','','','','','','','');


?><!DOCTYPE html>
<html lang="en">
  <head>

    <title><?= $application;?></title>
    <meta name="description" content="">
    <meta name="author" content="">

<?php
// this includes all the markup that loads css files and similar stuff,
// if you have to add more css, that's the place to do it.
include('./headTag.php');?>

  </head>

  <body class="">
    <div class="container">
    <?php // this includes the header
    include('./header.php');
?>
        <div class="row">
            <span class="span4">
                <h2>Users</h2>
            </span>
            <span class="span2">

            </span>
            <span class="span6">

            </span>
        </div>
        <div class="row">

            <span class="span3">

                <?php foreach ($users as $user){?>
                    <strong><?= $user['name'] ?></strong><br>
                    <?= $user['email'] ?><br>
                    <?= $user['role'] ?>
                    <hr>
                <?php } ?>
            </span>
            <span class="span5">




            </span>
        </div>


<?php // this includes the footer
include('./footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>
