<!DOCTYPE html>
<html >
    <head>
        <title><?php echo __("authTitle") ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>
        <link href="<?php echo $pathToAssets ;?>core/assets/css/ionicons.min.css" rel="stylesheet">
    </head>
<body>
        <div class="container">

            <br>
            <h1><?php echo __("authTitle") ;?></h1>
            <br>
            <?php if(isset($autherror)){
                  box(__("authError"), "info", "inherit" , "boxid" , "" );
                  echo "<br>";
                } ?>

            <form action="" method="POST">
                <?php echo __("authText") ;?>
                <input type="password" class="form-control" name="prototypeauth" value="" placeholder="" >
                <div class="micropadding"></div>
                <button type="submit" class="btn btn-block btn-primary"><?php echo __("send") ;?></button>
            </form>
            <br><br>

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
