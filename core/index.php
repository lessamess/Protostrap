<?php



/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/


include('protostrap.php');

/* Update stuff */

writeCombined($config);

updateYAMLfromSpreadsheets($linkedData);

removeSpreadsheetData();

/* perform checks */

$showNotWritableMessage = false;
if(!is_writable ( "assets/css/combined.css")){
    $showNotWritableMessage = true;
}

// path to assets from admin
$pathToAssets = "../";

/** Define VALUES valid for this file **/
$activeNavigation = "one";


?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('../snippets/meta_headTag.php');?>

    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body class="">
        <div class="container">
        <br>
        <a href="../"><i class="fa fa-long-arrow-left"></i> Back to site</a><br>
        <hr>
        <br>
        <h1>Protostrap Admin Panel</h1>
        <br>

        <div class="row">
            <div class="col-md-4">
                <?php if (!empty($flashMsg)) {?>
                    <div class="alert alert-<?php echo $flashMsg['type'] ;?>"><?php echo $flashMsg['text'] ;?></div>
                <?php } ?>
                <h3>Data</h3>
                <div class="well">
                    <a href="index.php?session_renew=true" class="btn btn-lg btn-link "><i class="fa fa-refresh"></i> Renew Prototype Session</a><br>

                    <?php
                    $tmpClass = "";
                    $tmpMsg = "";
                    if(!is_array($linkedData) OR count($linkedData)<1){
                            $tmpClass = "disabled";
                            $tmpMsg = "<br><div class='alert alert-warning'>You have no links to spreadsheets. Add them to /assets/data/linkedData.yml</div>";
                        } ?>


                    <a href="index.php?updateYAML=true" class="btn btn-lg btn-link <?php echo $tmpClass ;?>"><i class="fa fa-cloud-download"></i> Import Data from spreadsheets</a>
                    <?php echo $tmpMsg ;?>
                    <br>

                </div>
                <a href="../testpage.php">Open Test-Page</a>
            </div>
            <div class="col-md-2">
                <!-- Status -->
            </div>
            <div class="col-md-4">
                <h3>Components</h3>
                <?php
                foreach ($config['assets'] as $key => $asset):
                    $checked = "";
                    if($asset['load'] == 1){
                        $checked = "checked";
                        }?>
                    <?php echo $asset['title'] ;?> <div class="pull-right"><input type="checkbox" data-asset="<?php echo $key ;?>" class="switch assetSwitch" data-on-text="ON" data-off-text="OFF" data-on-color="primary" <?php echo $checked ;?>></div><br>
                    <div class="micropadding"></div>
                    <div class="micropadding"></div>
                <?php endforeach ?>
                <br>
                <?php
                $disbleWritingCombined = "";
                if ($showNotWritableMessage):
                    box("You can't overwrite the file <b>core/assets/css/combined.css</b>. <br> Please make sure the file is writable.", "info", "inherit" , "boxid" , "dismiss" );
                    $disbleWritingCombined = "disabled";
                endif ?>
                <a href="index.php?writeCombined=true" class="btn btn-block btn-primary <?php echo $disbleWritingCombined ;?>"> Write Combined Assets</a>
            </div>
        </div>


        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('../snippets/meta_javascripts.php');?>
        <script>
            $(function(){
                function updateSessionVar(type, varname, val){
                    $.get('updateSessionVar.php?type=' + type + '&varname=' + varname + '&val=' + val, function(data){
                        return;
                    });
                }
                $('.assetSwitch').on('switchChange.bootstrapSwitch', function(event, state) {
                      console.log($(this).data("asset")); // DOM element
                      console.log(event); // jQuery event
                      console.log(state); // true | false
                    var asset = $(this).data("asset");
                    var val = 1;
                    if (state === false){
                        val = false;
                    }
                    updateSessionVar("set","config.assets."+asset+".load",val);


                });
            })
        </script>
  </body>
</html>
