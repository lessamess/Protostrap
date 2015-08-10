<?php

if(empty($pagetitle)){
    $pagetitle = $brand;
}


$nextIconDisplayClass = "";
$rightPaddingClass = "";

if(empty($nextIcon)){
    $nextIcon = "";
    $nextIconDisplayClass = "hide";
    $rightPaddingClass = "noIcon";
}

if(empty($nextLink)){
    $nextLink = "javascript:void(0);";
}

if(!isset($badge)){
    $badge = 0;
}


?>



<header id="topBar" role="banner" class="navbar navbar-default navbar-fixed-top ">
    <!-- Top-Bar -->
    <div class="iosTopbar navbar-header">
        <div class="flexbox">
            <div class="topbar-fixed fixed-size-60 align-center" >
                <span class="" data-toggle="collapse" data-target="#headernav">
                    <i class="icon ion-android-menu"></i>
                </span>
            </div>
            <div class="flex-1 align-center topbar-title" ><?php echo $brand ;?></div>
            <div class="topbar-fixed fixed-size-60 align-center" ><i class="icon ion-ios-gear-outline"></i></div>
        </div>
    </div>
    <!-- Navigation triggered by Hamburger -->
    <nav role="navigation" class="collapse navbar-collapse " id="headernav" >
        <ul class="nav navbar-nav">
            <li>
                <span class="form">
                    <div class="input-group">
                          <input type="text" class="form-control" name="" placeholder="Search">
                          <span class="btn btn-success input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </span>
            </li>
            <li  >
                <a href="javascript:void(0);">Link 1</a>
            </li>
            <li  >
                <a href="javascript:void(0);">Link 2</a>
            </li>
            <li  >
                <a href="javascript:void(0);">Link 3</a>
            </li>
            <li  >
                <a href="javascript:void(0);">Link 4</a>
            </li>
        </ul>
    </nav>
</header>