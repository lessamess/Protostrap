<?php
$roles = $GLOBALS['roles'];
$livesearch = $GLOBALS['livesearch'];
$brand = $GLOBALS['brand'];
$application = $GLOBALS['application'];?>

<body>
        <div class="container">

            <br>
            <h1><?php echo $GLOBALS['brand'];?></h1>
            <?php include("./snippets/loginForm.php");?>
            <br><br>
            <?php // this includes the footer
            include('./snippets/footer.php');?>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php

        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('./snippets/meta_javascripts.php');?>
  </body>
</html>
<?php die(); ?>
