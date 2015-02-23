<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

/** Define VALUES  valid for this file **/
$activeNavigation = "one";

$firmen = get_spreadsheetData("https://docs.google.com/spreadsheets/d/1pYV5OwCy4YW-a0e1bOS9cU4sZpjcGHzSu_F08xgFHzg/edit?usp=sharing", "firmen");


?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $application . " - " . $brand ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include('./snippets/meta_headTag.php');?>

    </head>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body class="header-fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <h3>Testpage</h3>

                    <h4>Icons</h4>
                    Fontawesome 4.3:
                    <div><i class="fa fa-user-plus"></i> Add User &nbsp;&nbsp;<i class="fa fa-bed"></i> Bed</div>
                    <br>
                    <h4>Typeahead</h4>
                    <span class="form">
                        <!-- Typeahead
                             Change Data in assets/js/main.js
                             Documentation: https://github.com/bassjobsen/Bootstrap-3-Typeahead -->
                        <input type="text" class="form-control typeahead" name="mytypeahead" placeholder="Typeahead (Try: foo)">
                    </span>
                    <br>


                    <h4>Select</h4>
                    <select class="selectpicker" data-live-search="true" name="select" data-width="auto">
                        <option value="">one</option>
                        <option value="">two</option>
                        <option value="">three</option>
                    </select>
                    <br>


                    <h4>Datepicker</h4>
                    <div class="input-group date" id="" data-date="">
                        <input class="form-control" type="text" value="">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    <br>


                    <h4>Fileupload</h4>
                    <form name="fileupload" action="profil.php" method="POST"  enctype="multipart/form-data">
                        <input name="image" type="file" capture="camera" accept="image/*" title="Select Image" data-filename-placement="inside">
                    </form>
                    <br>

                    <h4>Switch</h4>
                    <!-- http://www.bootstrap-switch.org -->
                    <input type="checkbox" class="switch" checked> &nbsp;&nbsp;
                    <input type="checkbox" class="switch" data-on-text="Live" data-off-text="Offline" data-on-color="danger" checked>
                    <br>
                    <br>
                    <h4>Password toggle</h4>
                    <div class="input-group">
                              <input type="password" class="form-control" name="" placeholder="Password">
                              <span class="input-group-addon passwordToggle"><i class="fa fa-square-o"></i> Show</span>
                    </div>

                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4>Sortable List</h4>
                    <ul class="list-group sortable list">
                        <li class="list-group-item">1</li>
                        <li class="list-group-item">2</li>
                        <li class="list-group-item">3</li>
                        <li class="list-group-item">4</li>
                        <li class="list-group-item">5</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Sortable Grid</h4>
                    <ul class="list-group sortable grid">
                        <li class="">1</li>
                        <li class="">2</li>
                        <li class="">3</li>
                        <li class="">4</li>
                        <li class="">5</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4>Filtertable</h4>
                    <div class="table-responsive table-responsive-maxheight">
                        <?php
                        $tabledata = $firmen;
                        include("./snippets/makeTableFromData.php");?>
                    </div>
                </div>
            </div>





        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include ('./snippets/meta_javascripts.php');?>
  </body>
</html>
