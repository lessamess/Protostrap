<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

/** Define VALUES  valid for this file **/
$activeNavigation = "one";


?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('./snippets/meta_headTag.php');?>

    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body class="header-fixed">
        <div class="container">

            <?php
            // this includes the header
            include('./snippets/header.php');?>

            <h4 class="text-muted"> <i class="fa fa-level-down fa-rotate-180"></i> Change this in snippets/navBarTop.php </h3>
            <h1><?php echo __("startHere"); ?> </h1>
            <br>

            Or <a href="http://protostrap.ch/documentation_features.php" class="">Read the Documentation</a>
            <br><br>

            <h4 class="text-muted"> <i class="fa fa-level-up fa-rotate-180"></i> Change this in snippets/footer.php </h3>

            <?php // this includes the footer
            include('./snippets/footer.php');?>

        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('./snippets/meta_javascripts.php');?>
  </body>
</html>
