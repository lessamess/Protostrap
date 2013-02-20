<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pagetitle</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        include('./headTag.php');?> 

    </head>
    <body>
        <?php
        // *** STATIC TOP NAVBAR ***
        // This defines which navigation item is active. each pair of quotes corressponds to an item
        // DO NOT REMOVE
        $navbarClasses = Array('active','','','','','','','',''); 
        // this includes the markup for a static top navbar. Remove the // to include.
        include('./navBarStaticTop.php');
        
        // *** iOS TAB-BAR ***
        // This defines which tab is active. each pair of quotes corressponds to a tab
        // DO NOT REMOVE
        $tabClasses = Array('active','','','','');
        // this includes the markup for iOS a styled tab-bar. Remove the // to include
        include('./iosTabbar.php');
        ?>

        <div class="container">
            <?php // this includes the header
            include('./header.php');?>
            
            Your Content
            
            <?php // this includes the footer
            include('./footer.php');?>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include ('protostrap_javascripts.php');?>
  </body>
</html>
