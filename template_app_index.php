<?php
/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

// UNCOMMENT THIS TO FORCE A LOGIN SCREEN
// if(!$loggedIn){
//     header("location: template_app_onboarding.php");
// }

$products = get_spreadsheetData("https://docs.google.com/spreadsheets/d/1VIjGnnFQICLckloRjRAj1AgvncgjGBB8RrF_n08XcTE/edit?usp=sharing", "products");


// var_dump($products['data'][95]);
// die();

// $directory = 'assets/products';
// $offerbilder = array_diff(scandir($directory), array('..', '.'));
// sort($offerbilder, SORT_NATURAL | SORT_FLAG_CASE);

?><!DOCTYPE html>
<html >
    <head>
        <title><?php echo $application ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>
        <link href="<?php echo $pathToAssets ;?>assets/css/template_app.css?time=<?php echo time();?>" rel="stylesheet">
        
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
                    <a href="javascript:void(0);" class="goto btn" data-goto="menu" data-animation="moveInFromLeft">
                        <i class="icon ion-android-menu topbar-icon"></i>
                    </a>
                </div>
                <div class="flex-1 align-center">
                        <span class="topbar-title">Apptitle</span>
                </div>
                <div class="fix60 align-right" >
                    <a href="javascript:void(0);" class="goto btn" data-goto="cart" data-animation="moveInFromRight">
                        <i class="icon ion-ios-cart-outline topbar-icon"></i>
                        <span class="topbar-badge">2</span>
                    </a>
                </div>
            </div>

            <div id="topbar-menu" class="flexbox topbar">
                <div class="fixed-size-120" >
                    <a href="javascript:void(0);" class="btn goto" data-animation="moveInFromRight" data-goto="start"><i class="icon ion-android-close topbar-icon"></i></a>
                </div>
                <div class="flex-1 align-center">
                    <span class="topbar-title"></span>
                </div>
                <div class="fixed-size-120 align-right" >

                </div>
            </div>
            <div id="topbar-payment" class="flexbox topbar">
                <div class="fixed-size-40" >
                    <a href="javascript:void(0);" class="btn goto gotoReplaceTarget"  data-largetabbar="1"  data-pagetype="catSelector" data-animation="moveInFromLeft" data-goto="start"><i class="icon ion-ios-arrow-back topbar-icon"></i></a>
                </div>
            </div>
            <div id="topbar-aftersale" class="flexbox topbar">
                <div class="fixed-size-40" >
                    <a href="javascript:void(0);" class="btn goto gotoReplaceTarget unredeem backAftersale"   data-largetabbar="1" data-animation="moveInFromLeft" data-goto="start"><i class="icon ion-ios-arrow-back topbar-icon"></i></a>
                </div>

                <div class="flex-1 align-center">
                    
                </div>
                <div class="fixed-size-120 align-right" >
                    <button id="redeemer" class="btn affordance btn-primary" data-toggle="modal" data-target="#redeemModal"><?php echo __("Redeem"); ?></button>
                </div>
            </div>
            <?php 

            // Top Bar for startpage
            $topbarId = "detail";
            $goto = "start";
            include("./snippets/app_goBackTopbar.php");


            // Top Bars for each product

            foreach ($products['data'] as $key => $item):

                $topbarId = "detail".$item['id'];
                $topbarTitle = $item['title'];
                $goto = "start";
                $backid = "back".$item['id'];
                include("./snippets/app_goBackTopbar.php");

                // $topbarId = "catSelector".$item['id'];
                // $topbarTitle = $topbarTitle = $item['title'];
                // $goto = "detail".$item['id'];
                // $largetabbar = true;
                // include("./snippets/app_goBackTopbar.php");
            endforeach; 


            // Top Bar for Checkout

            $topbarId = "checkout";
            $goto = "detail";
            include("./snippets/app_goBackTopbar.php");

            // Top Bar for Shopping cart
            $topbarId = "cart";
            $goto = "start";
            $topbarTitle = "Your Shopping Cart";
            $backid = "backCart";
            include("./snippets/app_goBackTopbar.php");
            ?>

        </div>


        <!-- T A B B A R S -->
        <div id="tabbarContainer" class="tabnavbar navbar-default navbar-fixed-bottom transparent ">

            
            <?php 

            // Tabbar for each Product
            foreach ($products['data'] as $key => $item):
                $topbarId = "detail".$item['id'];?>
                <div id="tabbar-<?php echo $topbarId ;?>" class=" tabbar chekoutCTA">
                        <div class="grid-xs-6633">
                            <div class="gridCentered" style="font-size: 24px">
                                <span style="font-size: 18px">Buy for&nbsp;&nbsp;</span><b>€ <?php echo money_drop_zero_decimals($item['price']) ;?></b>
                            </div>
                             <div>
                                 <a href="javascript:void(0);" class="goto btn-block btn btn-default"  data-largetabbar="1" data-animation="moveInFromRight" data-goto="catSelector<?php echo $item['id'] ;?>"><?php echo __("Do it"); ?></a>
                             </div>
                        </div>
                </div>
            <?php endforeach; ?>

            <!-- gotoTarget" data-pagetype="checkout"  -->

            <div id="tabbar-checkout" class="flexbox tabbar hide">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary" data-animation="moveInFromRight" data-goto="start"><?php echo __("Go back"); ?></button>
                </div>
            </div>

            <div id="tabbar-payment" class="flexbox tabbar">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary gotoReplaceTarget"  data-largetabbar="1"  data-pagetype="catSelector"   data-animation="moveInFromLeft" data-goto="start"><?php echo __("Add card"); ?></button>
                </div>
            </div>

            <div id="tabbar-cart" class="flexbox tabbar hide">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary" data-animation="moveInFromRight" data-goto="start"><?php echo __("Go back"); ?></button>
                </div>
            </div>

            <div id="tabbar-start" class="flexbox tabbar hide"></div>
            <div id="tabbar-aftersale" class="flexbox tabbar hide"></div>


            <div id="tabbar-share" class="flexbox tabbar">
                <div class="flex-1">
                    <button class="goto btn-block  btn btn-primary triggerSend"  data-animation="moveOutFromTop" data-goto="aftersale"><?php echo __("Send"); ?></button>
                </div>
            </div>

        </div>

        <!-- P A G E S -->
        <div id="pt-main" class="pt-perspective">
            <div id="page-start" class="first-page pt-page ">
                    <h2 class="align-center">SUPERSHOP</h2>
                    <!--  ** TABS ** --> 
                    <div class="tabbable"> 
                        <div class="scrollBox">
                            <ul class="nav nav-tabs " style=" border-bottom: none; overflow: scroll; width: 2800px;"> 
                                <?php 
                                $tmpClass = "active";
                                foreach ($app_categories as $key => $app_category): ?>
                                  <li class="<?php echo $tmpClass ;?>"><a href="#tab<?php echo $key ;?>" data-toggle="tab"><?php echo $app_category['name'];?></a></li> 
                                <?php 
                                $tmpClass = "";
                                endforeach; ?>
                            </ul> 
                        </div>
                        <div class="tab-content"> 
                            <?php 
                            $tmpClass = "active";
                            $shuffle = 0;
                            foreach ($app_categories as $key => $app_category): ?>
                                <div class="tab-pane <?php echo $tmpClass ;?>" id="tab<?php echo $key ;?>" style="padding: 8px 0"> 
                                    <!-- TAB <?php echo $key ;?> CONTENT --> 
                                    <div class="grid-xs-2 gridgap-1" >
                                        <?php 
                                            if($shuffle == 1){
                                                shuffle($products['data']);
                                            }
                                            foreach ($products['data'] as $offer): 
                                                $activeId = $offer['id'];


                                                ?>
                                                <a href="javascript:void(0);" data-largetabbar="1" data-activeid="<?php echo $activeId ;?>" class="goto imageTeaserSmall" data-id="<?php echo $activeId ;?>" data-goto="detail<?php echo $activeId ;?>" data-animation="moveInFromRight"

                                                 style="background-position: contain; background-image: url('assets/img/products/<?php echo $offer['id'] ;?>.jpg');">
                                                    <div class="teaserLabelSmall" >
                                                        <div class="oneliner"><?php echo $offer['title'] ;?></div>
                                                    </div>
                                                </a>

                                            <?php endforeach ?>    
                                    </div>
                                    <!-- TAB <?php echo $key ;?> CONTENT  END --> 
                                </div> 
                            <?php 
                            $tmpClass = "";
                            $shuffle = 1;
                            endforeach ;?>
                             
                        </div> 
                    </div> 
                    <!-- ** End of TABS ** -->
            </div>

            <?php foreach ($products['data'] as $key => $offer):?>
                <div id="page-detail<?php echo $offer['id'] ;?>" class="pt-page  ">
                    <?php include("./snippets/detail-mainContent.php");?>
                </div>

                <div id="page-catSelector<?php echo $offer['id'] ;?>" class="pt-page  ">
                    <?php include("./snippets/categorySelector.php");?>
                </div>
            <?php endforeach; ?>




            <div id="page-payment" class="pt-page  ">
                <div class="container">
                    <h3><?php echo __("Add your credit card"); ?></h3>

                    <small><b><?php echo __("Card"); ?></b></small>
                    <div class="well grid-100n ">
                        <div><small><b><?php echo __("Holder Name"); ?></b></small></div>
                        <div>
                            <input type="text" class="form-control " name="" value="" placeholder="" >
                            
                        </div>
                        <div><small><b><?php echo __("Address"); ?></b></small></div>
                        <div>
                            <input type="text" class="form-control " name="" value="" placeholder="" >
                            
                        </div>
                        <div><small><b><?php echo __("Zip/City"); ?></b></small></div>
                        <div class="grid-xs-3366">

                            <input type="tel" class="form-control " name="" value="" placeholder="" >
                            <input type="text" class="form-control " name="" value="" placeholder="" >
                        </div>
                        <div><small><b><?php echo __("Number"); ?></b></small></div>
                        <div>
                            <div class="input-group credit-card">
                                  <input type="tel" id="checkcc" class="form-control" name="" placeholder="1234 5678 9012 3456">
                                  <span class="input-group-addon" id="creditCardIcon"><i class="fa fa-credit-card "></i></span>
                            </div>
                        </div>
                        <div><small><b><?php echo __("Expiry Date"); ?></b></small></div>
                        <div>
                            <input type="number" class="form-control" name="" value="" placeholder="<?php echo __("MM/YY"); ?>" >
                        </div>
                        <div><small><b><?php echo __("CVC Code"); ?></b></small></div>
                        <div>
                            <input type="tel" class="form-control" name="" value="" placeholder="" >
                        </div>
                    </div>
                    <br>
                    <div class="grid-xs-7525">
                        <span><?php echo __("Save my data for future purchases"); ?></span>
                        <div>
                            <input type="checkbox" class="switch" data-on-text="<?php echo __("Yes"); ?>" data-off-text="<?php echo __("No"); ?>" data-on-color="primary" >
                        </div>
                    </div>
                </div>
            </div>

            <div id="page-aftersale" class="pt-page  ">
                Thankyou
            </div>
            
            <div id="page-menu" class="pt-page ">
                <div class="container">
                    <br><br>
                    <input type="text" class="form-control typeahead" name="mytypeahead" placeholder="I am looking for..." style="width:90vw">

                    <br><br>
                </div>
                 <?php foreach ($app_categories as $key => $app_category): ?>
                    <div class="grid-n40 gridPadded borderBottom">
                         <div ><?php echo $app_category['name'] ;?></div> <div><i class="fa fa-caret-right"></i></div>
                    </div>
                 <?php endforeach ?>
                                
                <br><br>
            </div>
            <div id="page-cart" class="pt-page">
                <div class="container">
                </div>
                <br>
                <div class="grid-100n60">
                    <?php 

                    $cartitems = array(3,6);
                    foreach ($cartitems as $key => $item) {
                    $offer = $products['data'][$item];
                    $card_img = "assets/img/products/".$offer['id'].".jpg";
                    $card_title = $offer['title'];
                    $offerName = "";
                    $activeId = $offer['id'];
                    $price = $offer['price'];






                    ?>
                    <div class="goto" data-activeid="<?php echo $activeId ;?>" data-goto="detail<?php echo $activeId ;?>"  data-replaceback="1" data-back="cart" data-backid="back<?php echo $activeId ;?>"  data-id="<?php echo $activeId ;?>" data-animation="moveInFromRight">

                        <img class="img-responsive" src="<?php echo $card_img ;?>" alt="">

                    </div>
                    <a href="javascript:void(0);" class="noHover goto" data-activeid="<?php echo $activeId ;?>" data-goto="detail<?php echo $activeId ;?>"  data-replaceback="1" data-back="cart" data-backid="back<?php echo $activeId ;?>"  data-id="<?php echo $activeId ;?>" data-animation="moveInFromRight">

                        <h4 class="media-heading "><?php echo $card_title ;?></h4>
                        <div><?php echo makeDateFromString("+3 days") ;?></div>
                    </a>
                    
                    <div>
                        € <?php echo figureFormat($price) ;?>
                    </div>

                    <?php } ?>

                        

                    
                </div>
            </div>
        </div>

<div class="modal fade" id="redeemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="redeemModalLabel"><?php echo __("Redeem code"); ?></h4>
            </div>
            <div class="modal-body">

                <?php echo __("Do you want to redeem this code for"); ?> <span class="offername"></span>? <br>
                <b><?php echo __("This can't be undone"); ?></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo __("Cancel"); ?></button>
                <button type="button" class="btn btn-primary redeemCode" data-dismiss="modal"><?php echo __("Redeem code"); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include(snippet("meta_javascripts"));?>
    <script src="<?php echo $pathToAssets ;?>assets/js/template_app.js?time=<?php time();?>"></script>

  </body>
</html>