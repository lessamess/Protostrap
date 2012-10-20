<?php

/**   --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('protostrap.php');


/**   --- I D I V I D U A L  A C T I V A T I O N S  ---

     These few lines are unique to every page.
     Here's where you define which elements are activated,
     be it tabs or navigation etc
**/
$tabClasses = Array('','active','','',''); // Do NOT remove line, only add and remove elements in the brackets.

$navbarClasses = Array('active','',''); // Do NOT remove line, only add and remove elements in the brackets.

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
// this includes the markup for iOS a styled tabbar
include('./iosTabbar.php');?>

    <div class="container">

<?php // this includes the footer
include('./header.php');?>

        <h1> Handy Snippets</h1>
        <h3>Carousel</h3>

        <div class="row">
            <span class="span6">
                <div id="myCarousel" class="carousel slide" >
                    <!-- Carousel items -->
                    <div class="carousel-inner" >
                        <div class="active item">
                            <img width="100%" src="./assets/img/gallery1.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 1</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img width="100%" src="./assets/img/gallery2.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 2</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img width="100%" src="./assets/img/gallery3.jpg" />
                            <div class="carousel-caption">
                                <h4>Caption 3</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </span>
            <span class="span6">
                Carousel put in a Span 6 container. <br>
                Auto-cycling is turned off.
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
