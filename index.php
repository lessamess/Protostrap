<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

?><!DOCTYPE html>
<html lang="en">
  <head>

    <title>Protostrap - a prototyping framework based on Bootstrap</title>
    <meta name="description" content="">
    <meta name="author" content="">

<?php
// this includes all the markup that loads css files and similar stuff,
// if you have to add more css, that's the place to do it.
include('./headTag.php');?>
<link href="./assets/css/demo.css?time=<?php time();?>" rel="stylesheet">
  </head>

  <body id="demopage">

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
        //include('./iosTabbar.php');

?>

    <div class="container">

<?php // this includes the header
//include('./header.php');?>
<br>
<br><br class="hidden-phone"><br class="hidden-phone">
  <div class="row">
        <span class="span7 bigWhite">
            
            <p>Build <strong>clickable</strong> prototypes <strong>faster</strong>.<br><br>
            
            A prototyping framework for designers by designers.<br><br>
            Based on Twitter Bootstrap, <br>enhanced with love and PHP.</p>
            <p class="hidden-phone"><br>
                <a href="https://github.com/liip/Protostrap/archive/master.zip" class=" btn btn-primary btn-huge">
                    <i class="icon-download" ></i> Download Protostrap
                </a>
                <br>
                
            </p>
            <br><br>
            
        </span>
        <span class="span1 hidden-phone">
            &nbsp;
        </span>
        <span class="span4">
            <br class="hidden-phone"><br class="hidden-phone">
            <span class="hidden-desktop hidden-tablet bigWhite">
                <p>Take a quick tour</p>
            </span>
            
            <iframe src="http://de.slideshare.net/slideshow/embed_code/15409143?rel=0" width="100%" height="291" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> <div style="margin-bottom:5px"> </div>
      </span>
  </div>
    <div class="row">
        <span class="span4 ">
            
            <h3><a href="documentation_main.php" class=""><i class="icon-text-doc"></i>Read the Docs</a></h3>
        </span>
        <span class="span4">
        <a href="https://github.com/liip/Protostrap/blob/master/README.md" class=""><i class="icon-text-doc"></i>Protostrap on Github</a>
        </span>
        <span class="span4">
                    
        </span>
    </div>
      <hr>

<?php // this includes the footer
include('./footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>
