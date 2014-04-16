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
        <title>Log in - <?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('./snippets/meta_headTag.php');?>

    </head>
<?php

// Call the following function to force user to log in
//  forceLogin(); ?>

    <body class="header-fixed">
        <div class="container">

            <?php
            $loginaction ="index.php";
            include ('./snippets/loginForm.php');
            include('./snippets/footer.php');?>

        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('./snippets/meta_javascripts.php');?>
  </body>
</html>