<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('protostrap.php');


/**   --- I D I V I D U A L  A C T I V A T I O N S  ---

     These few lines are unique to every page.
     Here's where you define which elements are activated,
     be it tabs or navigation etc
**/
$tabClasses = Array('active','','','',''); // Do NOT remove line, only add and remove elements in the brackets.

$navbarClasses = Array('active','','','','','','','',''); // Do NOT remove line, only add and remove elements in the brackets.

/** END OF ACTIVATIONS **/

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

  </head>

  <body>

<?php

// this includes the markup for a static top navbar
include('./navBarStaticTop.php');

// this includes the markup for iOS a styled tabbar
//include('./iosTabbar.php');

?>

    <div class="container">

<?php // this includes the header
//include('./header.php');?>
<br>

<div class="hero-unit">
  <h1>Protostrap <small>A Prototyping Framework for Designers</small></h1>
  <br><br>
  <div class="row">
        <span class="span6">
            
            <p>Protostrap is a framework for designers that want to get <strong>clickable</strong> and <strong>testable</strong> prototypes up <strong>fast</strong>.<br><br>
            It is based on Twitter Bootstrap, so all you can do there you can do here too.</p>
            <p>
                <a href="https://github.com/liip/Protostrap/archive/master.zip" class="btn btn-primary btn-large">
                    Download Protostrap
                </a>
                <br><br>Protostrap is Open Source and also <a href="https://github.com/liip/Protostrap">available on GitHub</a>
            </p>
        </span>
        <span class="span4">
            <iframe src="http://de.slideshare.net/slideshow/embed_code/15409143?rel=0" width="100%" height="291" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe> <div style="margin-bottom:5px"> <strong> <a href="http://de.slideshare.net/memibeltrame/techtalk-protostrap-15409143" title="Protostrap" target="_blank">Protostrap</a> </strong> from <strong><a href="http://de.slideshare.net/memibeltrame" target="_blank">Memi Beltrame</a></strong> </div>
      </span>
  </div>
  
  <p>
  </p>
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
