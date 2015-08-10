<?php

$navKeys = ["home", "two", "three", "four", "five"];
$navLinks = ["link1.php", "link2.php", "link3.php", "link4.php", "link5.php"];

// LEAVE ALONE
$tabbarClasses = array_fill(0, 10, '');
foreach ($navKeys as $key => $item){
    if($item == $activeNavigation) {
        $tabbarClasses[$key] = "active";
    }
 }
?>

<!-- List of Icons: http://ionicons.com/ -->

<header  role="banner" class="iosTabbar navbar navbar-default navbar-fixed-bottom ">
    <div class="flexbox ">
        <div class="tabbar-item flex-1 align-center" >
            <a href="javascript:void(0);" class="<?php echo $tabbarClasses[0] ;?>">
                <i class="icon ion-ios-home-outline"></i>   <span class="tabbar-label">Home</span>
            </a>
            <span class="tabbar-badge">1</span>
        </div>
        <div class="tabbar-item flex-1 align-center" >
            <a href="javascript:void(0);" class="<?php echo $tabbarClasses[1] ;?>">
                <i class="icon icon-sm ion-ios-location-outline"></i>   <span class="tabbar-label">Two</span>
            </a>
            <span class="tabbar-badge">1</span>
        </div>
        <div class="tabbar-item flex-1 align-center" >
            <!-- Plus sign with dismissable popover -->
            <a href="javascript:void(0);" data-placement="top"  data-content-div="add" class="htmlpopover <?php echo $tabbarClasses[2] ;?>" tabindex="0" role="button" data-toggle="popover" data-trigger="focus">
                <i class="icon icon-lg ion-ios-plus-empty"></i>
            </a>
        </div>
        <div class="tabbar-item flex-1 align-center" >
            <a href="javascript:void(0);" class="<?php echo $tabbarClasses[3] ;?>">
                <i class="icon ion-ios-email-outline"></i>   <span class="tabbar-label">Four</span>
            </a>
            <span class="tabbar-badge">1</span>
        </div>
        <div class="tabbar-item flex-1 align-center" >
            <a href="javascript:void(0);" class="<?php echo $tabbarClasses[4] ;?>">
                <i class="icon ion-ios-person-outline"></i><span class="tabbar-label">Five</span>
            </a>
            <span class="tabbar-badge">1</span>
        </div>
    </div>
</header>
<div id="add" class="hide">
    <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item">Link 1</a>
        <a href="javascript:void(0);" class="list-group-item">Link 2</a>
        <a href="javascript:void(0);" class="list-group-item">Link 3</a>
        <a href="javascript:void(0);" class="list-group-item">Link 4</a>
        <a href="javascript:void(0);" class="list-group-item">Link 5</a>
    </div>
</div>
