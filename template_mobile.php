<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

/** Define VALUES  valid for this file **/
$activeNavigation = "home";


?><!DOCTYPE html>
<html >
    <head>
        <title><?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>
        <link href="<?php echo $pathToAssets ;?>core/assets/css/ionicons.min.css" rel="stylesheet">
    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body class="header-fixed">
        <?php include("./snippets/iosTopbar.php");?>
        <?php include("./snippets/iosTabbar.php");?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Mobile Template</h1>
                </div>
            </div>
        </div>
        <div class="list-touchfriendly hide">
                    <?php
                    $listOfItems = array("Mountain", "Beer", "Trains");
                    foreach ($listOfItems as $key => $value): ?>
                        <div class="flexbox">
                            <div class="fixed-size-80" >
                                <img class="img-responsive" src="assets/img/gallery<?php echo $key + 1 ;?>.jpg" alt="">
                            </div>
                            <div class="flex-1" ><?php echo $value ;?></div>
                            <div class="fixed-size-60 align-right" >
                                <?php
                                    $activeItems = array("fave","compare");
                                    $thisItem = $value;
                                    include("./snippets/optionsDropdown.php");?>
                            </div>
                        </div>
                    <?php endforeach ?>
        </div>

        <div class="list-touchfriendly">
            <a href="javascript:void(0);">Cras justo odios <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a>
            <a href="javascript:void(0);">Dapibus ac facilisis</a>
            <a href="javascript:void(0);">Morbi leo risus</a>
        </div>


        <ul class="list-group list-touchfriendly">
          <a href="javascript:void(0);"><li class="list-group-item">Cras justo odio</li></a>
          <a href="javascript:void(0);"><li class="list-group-item">Dapibus ac facilisis in</li></a>
          <a href="javascript:void(0);"><li class="list-group-item">Morbi leo risus</li></a>
          <a href="javascript:void(0);"><li class="list-group-item">Porta ac consectetur ac</li></a>
          <a href="javascript:void(0);"><li class="list-group-item">
            <span style="display: block;" >&nbsp;<i class="icon ion-ios-gear-outline " ></i> Settings</span>



          </li></a>
        </ul>





        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include(snippet("meta_javascripts"));?>
  </body>
</html>
