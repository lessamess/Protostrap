<?php

/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


?><!DOCTYPE html>
<html lang="en">
  <head>

    <title>File not Found - <?php echo $application . " - " . $brand ;?></title>

<?php
// this includes all the markup that loads css files and similar stuff,
// if you have to add more css, that's the place to do it.
include('./snippets/meta_headTag.php');?>

  </head>

  <body  class="header-fixed">
<?php
        $activeNavigation = "one";

        // this includes the markup for a static top navbar. Remove the // to include.
        include('./snippets/navBarTop.php');


        // *** iOS TAB-BAR ***
        // This defines which tab is active. each pair of quotes corressponds to a tab
        // DO NOT REMOVE
        $tabClasses = Array('active','','','','');
        // this includes the markup for iOS a styled tab-bar. Remove the // to include
        //include('./snippets/iosTabbar.php');
?>
    <div class="container">

<?php // this includes the footer
//include('./snippets/header.php');?>
        <br>
        <div class="well">
            <h1>End of Prototype</h1>
            <p>The Prototype ends here. </p>
            <p>
            <a href="javascript:history.back();" class="btn btn-primary btn-large">
            Go back one step
            </a>
            </p>
        </div>

      <hr>

<?php // this includes the footer
include('./snippets/footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php include ('./snippets/meta_javascripts.php');?>
  </body>
</html>
