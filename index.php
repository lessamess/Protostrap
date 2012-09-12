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

// this includes the markup for a static top navbar
//include('./navBarStaticTop.php');

// this includes the markup for iOS a styled tabbar
include('./iosTabbar.php');

?>

    <div class="container">

<?php // this includes the header
include('./header.php');?>
<br>

<!--
  ** TABS **
-->
<div class="tabbable">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Itineraries</a></li>
    <li><a href="#tab2" data-toggle="tab">Events</a></li>
    <li><a href="#tab3" data-toggle="tab">Today</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <div class="row">
            <span class="span4">
                <h3>The highest Mountain</h3>
                <img data-ph="300:80:High Mountain" />
                 Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris.
            </span>
            <span class="span4">
                <h3>The deepest Sea</h3>
                <img data-ph="300:80:Deep Sea" />
                 Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris.
            </span>
            <span class="span4">
                <h3>The longest River</h3>
                <img data-ph="300:80:Long River" />
                 Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris.
            </span>
        </div>

    </div>
    <div class="tab-pane" id="tab2">
      <p>Howdy, I'm in Section 2.</p>
    </div>
    <div class="tab-pane" id="tab3">
      <p>Howdy, I'm in Section 3.</p>
    </div>
  </div>
</div>

<!--
  ** TABS END **
-->

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
