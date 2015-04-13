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
                    <a href="index.php?writeCombined=true" class="btn btn-lg btn-link "><i class="fa fa-code"></i> Write Combined Assets</a>
                </div>
                <a href="../testpage.php">Open Test-Page</a>
            </div>
            <div class="col-md-4">
                <!-- Status -->
            </div>
            <div class="col-md-4">

            </div>
        </div>


        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('../snippets/meta_javascripts.php');?>
  </body>
</html>
