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
            <div id="breadcrumbwrapper">
                <ul class="scroller breadcrumb">
                    <li><a href="index.php">Mountains</a> <span class="divider">></span></li>
                    <li><a href="8000.php">+8'000m</a> <span class="divider">></span></li>
                    <li><a href="himalaya.php">Himalaya</a> <span class="divider">></span></li>
                    <li class="active">Everest</li>
            </ul>
        </div>
        <h3>Accordion Using uniqId</h3>
        <div id="accordion1" class="accordion accordeon-wedge">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#<?php echo getUniqid();?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                     One
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="<?php echo $lastUniqid;?>">
                                <div class="accordion-inner">
                                    <b>One open</b><br>
                                    Id: <?php echo $lastUniqid;?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#<?php echo getUniqid();?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                     Two
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="<?php echo $lastUniqid;?>">
                                <div class="accordion-inner">
                                    <b>Two open</b><br>
                                    Id: <?php echo $lastUniqid;?>
                                </div>
                            </div>
                        </div>
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
