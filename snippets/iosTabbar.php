<?php
$navKeys = ["home","tagebuch","add","essen","fitness"];

// LEAVE ALONE
$tabbarClasses = array_fill(0, 10, '');
foreach ($navKeys as $key => $item){
    if($item == $activeNavigation) {
        $tabbarClasses[$key] = "active";
    }
 }
?>



<header  role="banner" class="iosTabbar navbar navbar-default navbar-fixed-bottom ">
<div class="micropadding"></div>
  <div class="flex-container ">
    <div class="flex-item align-center" >
        <span class="tabbar-badge">1</span>
        <a href="index.php" class="align-center <?php echo $tabbarClasses[0] ;?>">
            <span class="tabbar-icon"><i class="fa fa-2x fa-home"></i></span>   <span class="tabbar-label">One</span>
        </a>
    </div>
    <div class="flex-item align-center" >
        <span class="tabbar-badge">1</span>
        <a href="tagebuch.php" class="<?php echo $tabbarClasses[1] ;?>">
            <i class="fa fa-2x fa-book"></i>   <span class="tabbar-label">Two</span>
        </a>
    </div>
    <div class="flex-item align-center" >
        <span class="tabbar-badge">1</span>
        <a href="add.php" class="<?php echo $tabbarClasses[2] ;?>">
            <i class="fa fa-2x fa-plus"></i>   <span class="tabbar-label">Three</span>
        </a>
    </div>
    <div class="flex-item align-center" >
        <span class="tabbar-badge">1</span>
        <a href="essen.php" class="<?php echo $tabbarClasses[3] ;?>">
            <i class="fa fa-2x fa-coffee"></i>   <span class="tabbar-label">Four</span>
        </a>
    </div>
    <div class="flex-item align-center" >
        <span class="tabbar-badge">1</span>
        <a href="fitness.php" class="<?php echo $tabbarClasses[4] ;?>">
            <i class="fa fa-2x fa-futbol-o"></i><span class="tabbar-label">Five</span>
        </a>
       </div>
  </div>
</header>
