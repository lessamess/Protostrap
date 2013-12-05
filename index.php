<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

/** FILE BASED VALUES **/
$activeNavigation = "one";




?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagetitle</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('./meta_headTag.php');?>

    </head>
    <body>
        <div class="container">
            <?php // this includes the header
            include('./snippets/header.php');?>

            Your Content

            <?php // this includes the footer
            include('./snippets/footer.php');?>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php

        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('meta_javascripts.php');?>
  </body>
</html>
