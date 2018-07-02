<?php
/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

?><!DOCTYPE html>
<html >
    <head>
        <title><?php echo $application ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>

        <style>
            #page-camera{
                background-image: url('assets/img/camdummy.jpg') ;
                background-repeat: no-repeat;
                background-position: bottom center;
                background-size: cover;
            }
        </style>

    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>
    <body class="">
        <!-- T O P B A R S -->
        <div class="topbarContainer ">
            <div id="topbar-start" class="flexbox topbar topbar-current">
                <div class="fix80" >
                    <a href="javascript:void(0);" class="goto btn" data-goto="camera" data-animation="moveInFromBottom">
                        <i class="icon ion-ios-camera-outline topbar-icon"></i>
                    </a>
                </div>
                <div class="flex-1 align-center">
                        <span class="topbar-title">mobile template</span>
                </div>

                <div class="fix80 align-right" >
                    <a href="javascript:void(0);" class="goto btn" data-goto="notifications" data-animation="moveInFromRight">
                        <i class="icon ion-ios-bell-outline topbar-icon"></i>
                        <span class="topbar-badge">1</span>
                    </a>
                </div>
            </div>

            <div id="topbar-notifications" class="flexbox topbar">
                <div class="fixed-size-120" >
                    <a href="javascript:void(0);" class="btn goto" data-animation="moveOutFromRight" data-goto="start"><i class="icon ion-ios-arrow-back topbar-icon"></i></a>
                </div>
                <div class="flex-1 align-center">
                    <span class="topbar-title">Notifictions</span>
                </div>
                <div class="fixed-size-120 align-right" >

                </div>
            </div>
            <div id="topbar-page2" class="flexbox topbar">
                <div class="fixed-size-120" >
                    <a href="javascript:void(0);" class="btn goto" data-animation="moveInFromRight" data-goto="start"><i class="icon ion-ios-arrow-back topbar-icon"></i></a>
                </div>
                <div class="flex-1 align-center">
                    <span class="topbar-title">Page 2</span>
                </div>
                <div class="fixed-size-120 align-right" >

                </div>
            </div>
            <div id="topbar-page3" class="flexbox topbar">
                <div class="fixed-size-120" >
                    <a href="javascript:void(0);" class="btn goto" data-animation="moveInFromBottom" data-goto="start"><i class="icon ion-ios-close-empty topbar-icon"></i></a>
                </div>
                <div class="flex-1 align-center">
                    <span class="topbar-title">Page 3</span>
                </div>
                <div class="fixed-size-120 align-right" >

                </div>
            </div>
            <div id="topbar-camera" class="flexbox topbar topbar-black">
                <div class="fixed-size-120" >
                    <a href="javascript:void(0);" class="btn goto" data-animation="moveOutFromTop" data-goto="start"><i class="icon ion-ios-close-empty topbar-icon"></i></a>
                </div>
            </div>
        </div>


        <!-- T A B B A R S -->
        <div id="tabbarContainer" class="tabnavbar navbar-default navbar-fixed-bottom transparent ">

            <div id="tabbar-start" class="flexbox tabbar tabbar-current">
                <div class="flex-1">
                    <button class="btn btn-primary btn-block goto " data-animation="moveInFromLeft" data-goto="page2">Register</button>
                </div>
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-default" data-animation="moveInFromTop" data-goto="page3">Sign in</button>
                </div>
            </div>


            <div id="tabbar-notifications" class="flexbox tabbar ">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary" data-animation="moveInFromleft" data-goto="start">Go back</button>
                </div>
            </div>


            <div id="tabbar-page2" class="flexbox tabbar ">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary" data-animation="moveInFromRight" data-goto="start">Go back</button>
                </div>
            </div>


            <div id="tabbar-page3" class="flexbox tabbar ">
                <div class="tabbar-item flex-1 align-center" >
                    <a href="javascript:void(0);" class="">
                        <i class="icon ion-ios-home-outline"></i>   <span class="tabbar-label">Home</span>
                    </a>
                </div>
                <div class="tabbar-item flex-1 align-center" >
                    <a href="javascript:void(0);" class="">
                        <i class="icon ion-ios-location-outline"></i>   <span class="tabbar-label">Two</span>
                    </a>
                </div>
                <div class="tabbar-item flex-1 align-center" >
                    <!-- Plus sign with dismissable popover -->
                    <a href="javascript:void(0);" data-placement="top"  data-content-div="add" class="htmlpopover " tabindex="0" role="button" data-toggle="popover" data-trigger="focus">
                        <i class="icon icon-lg ion-ios-plus-empty"></i>
                    </a>
                </div>
                <div class="tabbar-item flex-1 align-center" >
                    <a href="javascript:void(0);" class="">
                        <i class="icon ion-ios-email-outline"></i>   <span class="tabbar-label">Four</span>
                    </a>
                    <span class="tabbar-badge">1</span>
                </div>
                <div class="tabbar-item flex-1 align-center" >
                    <a href="javascript:void(0);" class="">
                        <i class="icon ion-ios-person-outline"></i><span class="tabbar-label">Five</span>
                    </a>
                    <span class="tabbar-badge">1</span>
                </div>
            </div>





            <div id="tabbar-camera" class="flexbox tabbar hide"></div>

        </div>

        <!-- P A G E S -->
        <div id="pt-main" class="pt-perspective">
            <div id="page-start" class="first-page pt-page container">
                    <h1>Start</h1>
            </div>
            <div id="page-notifications" class="pt-page container ">
                <h1>Notifications</h1>
                Move in from right
            </div>
            <div id="page-page2" class="pt-page container ">
                <h1>Page 2</h1>
                Move in from Left
            </div>
            <div id="page-page3" class="pt-page container ">
                <h1>Page 3</h1>
                Move in from Top
            </div>
            <div id="page-camera" class="pt-page container">

            </div>
        </div>





        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include(snippet("meta_javascripts"));?>
  </body>
</html>
