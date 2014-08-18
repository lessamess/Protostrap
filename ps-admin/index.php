<?php


$file = '../assets/data/data.yml';
// Öffnet die Datei, um den vorhandenen Inhalt zu laden
$current = file_get_contents($file);
// Fügt eine neue Person zur Datei hinzu
$current .= "\nnewContent: John Smith\n";
// Schreibt den Inhalt in die Datei zurück
file_put_contents($file, $current);

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('../core/protostrap.php');

$combinedCssFile = '../assets/css/combined.css';
    $combined = "";
    foreach($config['cssFiles'] as $key => $file){
        $combined .= file_get_contents('../assets/css/'.$file);
    };

    file_put_contents($combinedCssFile, $combined);

    die();
function writeCss($config){
    // write combined File
    $combinedCssFile = '../assets/css/combined.css';
    $combined = "";
    foreach($config['cssFiles'] as $key => $file){
        $combined .= file_get_contents('../assets/css/'.$file);
    };

    file_put_contents($combinedCssFile, $combined);
}

function writeYml($linkedData){
    foreach($linkedData as $key => $url){
        $combined .= file_get_contents('../assets/css/'.$file);
    };
}



/** Define VALUES valid for this file **/
$activeNavigation = "one";


?><!DOCTYPE html>
<html lang="en">
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
        <h2>Protostrap Admin</h2>

        <div class="row">
            <div class="col-md-4">
                <h3>Data</h3>
                <div class="well">
                    Import Data from spreadsheets
                </div>
            </div>
            <div class="col-md-4">
                Status
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
