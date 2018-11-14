<?php 
if(!isset($goto)){
    $goto = "start";
} 
if(!isset($topbarTitle)){
    $topbarTitle = "";
} 
if(!isset($backid)){
    $backid = "";
} 
if(isset($largetabbar)){
    $largetabbar = "data-largetabbar=\"1\"";
} else {
    $largetabbar = "";
}

?>
            <div id="topbar-<?php echo $topbarId ;?>" class="flexbox topbar" style="max-width: 100vw;">
                <div class="fixed-size-40" >
                    <a href="javascript:void(0);" class="btn goto <?php echo $backid ;?>" <?php echo $largetabbar ;?> data-animation="moveInFromLeft" data-goto="<?php echo $goto ;?>"><i class="icon ion-ios-arrow-back topbar-icon"></i></a>
                </div>
                <div class="flex-1 align-center">
                    <span class="topbar-title"><?php echo $topbarTitle ;?></span>
                </div>
                <div class="fixed-size-40 align-right" >
                    &nbsp;
                </div>
            </div>
<?php unset($goto); ?>
<?php unset($topbarTitle); ?>
<?php unset($largetabbar); ?>