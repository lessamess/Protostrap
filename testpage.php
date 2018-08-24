<?php

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


/** Define VALUES  valid for this file **/
$activeNavigation = "one";
$names = get_spreadsheetData("https://docs.google.com/spreadsheets/d/1_WzhyY-_ZLZoKAaSvGv5UBKPBzuxtJwmZWgyL0JF-wU/edit?usp=sharing", "names","Sheet2");

function gridmarkup($gridclass, $total = 12){
    $markup = "<div class=\"gridHasBorder gridPadded ".$gridclass."\">";
    for ($i=1; $i <= $total; $i++) {
        $markup .= "<div>{$i}</div>";
    }

    $markup .= "</div";
    return $markup;
}


?><!DOCTYPE html>
<html >
    <head>
        <title><?php echo $application . " - Testpage"  ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>

    </head>
    <style>
        #flexboxdemo .flexbox > div{
            text-align: left;
            border:none;
            margin-right: 10px;
            background-color:#eee;
        }
        .fixed {
            width: 80px;
        }
    </style>
<?php

// uncomment the following function to force user to be logged in
// forceLogin(); ?>

    <body class="header-fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <a href="index.php"><i class="fa fa-long-arrow-left"></i> Back to site</a>

                    <h3>Testpage</h3>

                    <h4>Icons</h4>
                    Fontawesome:
                    <div><i class="fa fa-percent"></i> Percent &nbsp;&nbsp;<i class="fa fa-hashtag"></i> Hashtag</div>
                    <br>
                    Ionicons:
                    <div><i class="icon ion-ios-star-outline"></i> Star empty &nbsp;&nbsp;<i class="icon ion-ios-bolt-outline"></i> Bolt outline</div>
                    <br>

                    <h4>Typeahead</h4>
                    <span class="form">
                        <!-- Typeahead
                             Change Data in snippets/typeahead.php
                             Documentation: https://github.com/bassjobsen/Bootstrap-3-Typeahead -->
                        <input type="text" class="form-control typeahead" placeholder="Typeahead (Try: foo)">
                    </span>
                    <br>

                    <br>
                    <h4>Select</h4>
                    <select class="selectpicker" data-live-search="true" name="select" data-count-selected-text="{0} selected" data-icon-base="fa" data-tick-icon ="fa fa-check" data-width="auto" multiple data-selected-text-format="count > 2" title="Select one or more">
                        <option value="">one</option>
                        <option value="">two</option>
                        <option value="">three</option>
                        <option value="">four</option>
                        <option value="">five</option>
                        <option value="">six</option>
                        <option value="">seven</option>
                        <option value="">eight</option>
                    </select>
                    <br>


                    <br>
                    <h4>Datepicker</h4>
                    <div class="input-group date" id="datepicker" data-date="">
                        <input class="form-control" type="text" value="">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    <br>


                    <h4>File Input</h4>
                    <form name="fileupload" action="profil.php" method="POST"  enctype="multipart/form-data">
                        <input name="image" class="file-input" type="file" capture="camera" accept="image/*" title="Select Image" data-filename-placement="inside">
                    </form>
                    <br>

                    <h4>Masked Input</h4>
                        Social Security Number <br>
                        <input id="socialsecurity" name="social" type="text" placeholder="00-00-0000">
                    <br>
                    <br>
                    <h4>Toggle One Button in a group</h4>

                    <div class="btn-group toggleSinglePrimary">
                        <button type="button" class="btn btn-default btn-primary">Left</button>
                        <button type="button" class="btn btn-default">Middle</button>
                        <button type="button" class="btn btn-default">Right</button>
                    </div>

                    <br><br>
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
                    <br><br>
                    <h4>Set Dropdown-Button Label TO DO</h4>
                    <div class="input-group">
                      <input id="onboardingVolume" type="text" class="form-control align-right" name="" placeholder="" value="">

                      <div class="btn-group input-group-addon">
                          <span type="button" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CHF <span class="caret"></span>
                          </span>
                          <ul class="dropdown-menu">
                            <li class="setDropdownBtnLabel"><a href="javascript:void(0);">CHF</a></li>
                            <li class="setDropdownBtnLabel"><a href="javascript:void(0);">EUR</a></li>
                            <li class="setDropdownBtnLabel"><a href="javascript:void(0);">USD</a></li>
                          </ul>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h4>Collapse</h4>

                    <div id="" class="collapse in collapse<?php echo getUniqueId();?>">

                     <a href="javascript:void(0);" class="btn btn-default" data-toggle="collapse" data-target=".collapse<?php echo $lastUniqueId;?>">Open</a>
                    </div>

                    <div id="" class="collapse collapse<?php echo $lastUniqueId;?>">
                     Opened content <br><br>
                     <a href="javascript:void(0);" class="btn btn-default" data-toggle="collapse" data-target=".collapse<?php echo $lastUniqueId;?>">Close</a>
                    </div>

                </div>

            </div>
            <br>
            <h4>Cards, same height, flexbox, responsive</h4>
            <div class="row flex-row ">
                <?php
                $i = 1;
                while ($i <= 4) {?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="btn btn-default btn-togglePrimary btn-circle-sm btn-onCard"><i class="fa fa-heart-o"></i></div>
                            <img class="card-img-top" src="assets/img/placeholderImage.svg" class="img-responsive" alt="Card image cap">
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">A description of your card's content.
                                <?php if($i == 3){
                                    echo "<br>With more and more content";
                                    } ?></p>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>

            <br><br>

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
                    <h4>Translations</h4>
                    Key: thisIsAtest <br>

                    En: <?php echo __("thisIsAtest","en"); ?> <br>
                    De: <?php echo __("thisIsAtest","de"); ?> <br>
                    Fr: <?php echo __("thisIsAtest","fr"); ?> (Not available) <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <a name="login"></a>
                    <?php include(snippet("loginForm"));?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-6">
                    <a class="" data-toggle="collapse" data-target="#collapse<?php echo getUniqueId();?>">Show Deeplink</a>
                    <div id="collapse<?php echo $lastUniqueId;?>" class="collapse">
                        <input type="text" class="form-control selectOnClick" name="" placeholder="" value="<?php echo getDeeplink(); ;?>">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <h4>Change Data</h4>
                    Favorite Color: <span id="favColor"><?php echo $favoriteColor ;?></span><br>
                    <input type="text" class="form-control" id="favoriteColorChange" value="" placeholder="Change Color" >
                    <span class="hide" id="reloadInfo"><i class="fa fa-info"></i> Reload to see that the value changed permanently</span>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <h4>Filtertable and Table Sorter</h4>
                        <?php
                        $tabledata = $names; ?>
                    <div class="table-responsive table-responsive-maxheight">
                        <?php include(snippet("makeTableFromData"));?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4>Smoothly scroll to a specified element</h4>
                    <button type="button" class="btn btn-default scrollTo">Scroll me to the top!</button>&nbsp;&nbsp;<button type="button" data-scrollto="nextParagraph" class="btn btn-default scrollTo">Scroll the next paragraph to the top!</button> &nbsp;&nbsp;<button type="button" data-scrollto="nextParagraph"  data-offset="70" class="btn btn-default scrollTo">Scroll the next paragraph with a 70px offset!</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 id="nextParagraph">Checkall</h4>
                    <table class="table table-condensed p25">
                        <tr>
                            <th>
                                <input type="checkbox" class="checkall" data-class="checkme" name="chk<?php echo getUniqueId();?>" id="chk<?php echo $lastUniqueId;?>" value="chk<?php echo $lastUniqueId;?>">
                            </th>
                            <th>A</th>
                            <th>AA</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="checkme" name="chk<?php echo getUniqueId();?>" id="chk<?php echo $lastUniqueId;?>" value="chk<?php echo $lastUniqueId;?>">

                            </td>
                            <td>1</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="checkme" name="chk<?php echo getUniqueId();?>" id="chk<?php echo $lastUniqueId;?>" value="chk<?php echo $lastUniqueId;?>">

                            </td>
                            <td>2</td>
                            <td>22</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="checkme" name="chk<?php echo getUniqueId();?>" id="chk<?php echo $lastUniqueId;?>" value="chk<?php echo $lastUniqueId;?>">

                            </td>
                            <td>3</td>
                            <td>33</td>
                        </tr>
                    </table>

                    <h4>Fake reload</h4>
                    <div class="row">
                        <div class="col-md-2"><button class="btn btn-primary btn-spinner fakeReload" data-target="reloadContent">Reload text</button></div>
                        <div class="col-md-6">
                            <div id="reloadContent">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. In sunt cum nam odio ipsum autem assumenda consequuntur earum excepturi at modi amet aliquam quam, deserunt nobis vel obcaecati, numquam velit?
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <h4>Copy to Clipboard</h4>
                    <div class="row">
                        <div class="col-md-2"><button class="btn btn-primary copyToClipboard" data-target="copyContent">Copy text</button></div>
                        <div class="col-md-6">
                            <div id="copyContent">
                                Copy this Lorem ipsum dolor sit amet, consectetur adipisicing elit. In sunt cum nam odio ipsum autem assumenda consequuntur earum excepturi at modi amet aliquam quam, deserunt nobis vel obcaecati, numquam velit?
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <h4>Filter with buttons</h4>

                    <div class="btn-group toggleSinglePrimary">
                        <button type="button" class="btn btn-default btn-primary trigger" data-group="contacts" data-item="all">All</button>
                        <button type="button" class="btn btn-default trigger" data-group="contacts" data-item="people">People</button>
                        <button type="button" class="btn btn-default trigger" data-group="contacts" data-item="companies">Companies</button>
                    </div>
                    <br><br>
                    <ul class="list-group">
                        <li class="list-group-item contacts contacts-all contacts-people">Berta Miller</li>
                        <li class="list-group-item contacts contacts-all contacts-companies">ACME Inc.</li>
                        <li class="list-group-item contacts contacts-all contacts-people">Giuseppe Mortacci</li>
                        <li class="list-group-item contacts contacts-all contacts-people">Audrie Vitelle </li>
                        <li class="list-group-item contacts contacts-all contacts-companies">Grand Total Corp</li>
                        <li class="list-group-item contacts contacts-all contacts-companies">Good Business Associated</li>
                    </ul>

                    <br><br>


                    <h4>Toggle 2 elements</h4>

                    <div class="row">
                        <div class="col-md-3"><button class="btn  btn-primary showHide" data-hide="toggleOne" data-show="toggleTwo">Toggle 2 elements</button></div>
                        <div class="col-md-3"><div id="toggleOne"><h1>1</h1></div></div>
                        <div class="col-md-3"><div id="toggleTwo" class="hide"><h1>2</h1></div></div>
                    </div>


                    <br><br>

                    <h4>Count Down a number</h4>

                    <div class="row">
                        <div class="col-md-3"><button class="btn  btn-primary countDown" data-target="countDown">Count down</button></div>
                        <div class="col-md-3"><div id="countDown">576</div></div>
                    </div>


                    <br><br>
                    <h4>Tooltips</h4>


                    <button type="button " class="btn btn-default tooltiptrigger" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Default Tooltip</button>
                    &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default tooltiptrigger" data-toggle="tooltip" data-hide="1000" data-placement="top" title="Tooltip on top">Tooltip closes with 1 second delay</button>
                    <br><br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Stepper</h4>
                    <div class="stepper">
                        <ul class="steps">
                            <li id="step-tab-1" data-target="#step1" class="active"><span id="badge1" class="label label-as-badge label-info">1</span> Step 1 <span class="stepNumber">Step 1 of 4</span><span class="chevron"></span></li>
                            <li id="step-tab-2" data-target="#step2"><span id="badge2" class="label label-default label-as-badge">2</span> Step 2 <span class="stepNumber">Step 2 of 4</span><span class="chevron"></span></li>
                            <li id="step-tab-3" data-target="#step3"><span id="badge3" class="label label-default label-as-badge">3</span> Step 3 <span class="stepNumber">Step 3 of 4</span><span class="chevron"></span></li>
                            <li id="step-tab-4" data-target="#step4"><span id="badge4" class="label label-default label-as-badge">4</span> Step 4 <span class="stepNumber">Step 4 of 4</span><span class="chevron"></span></li>
                        </ul>
                        <div class="step-content">
                            <div class="step-pane step-pane-1 active" id="step1">

                                <a class="btn btn-primary btn-next" data-nextid="2" type="button" href="javascript:void(0);">Next</a>

                            </div>
                            <div class="step-pane step-pane-2 " id="step2">

                                <a class="btn btn-default btn-prev " data-previd="1" type="button" href="javascript:void(0);">Previous</a>
                                <a class="btn btn-primary btn-next" data-nextid="3" type="button" href="javascript:void(0);">Next</a>


                            </div>
                            <div class="step-pane step-pane-3 " id="step3">
                                <a class="btn btn-default btn-prev " data-previd="2" type="button" href="javascript:void(0);">Previous</a>
                                <a class="btn btn-primary btn-next" data-nextid="4" type="button" href="javascript:void(0);">Next</a>
                            </div>
                            <div class="step-pane step-pane-4 " id="step4">
                                <a class="btn btn-default btn-prev " data-previd="3" type="button" href="javascript:void(0);">Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h4>Mobile Template</h4>
                    <iframe width="320" height="480" src="template_mobile.php"></iframe>

                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <h4 id="getparameters">GET Parameters on this page</h4>
                    <div class="flexbox padded">
                        <div id="allParams" class="flex-1">All GET Parameters:</div>
                        <div id="filterParameter" class="flex-1">Check for GET Parameter <b>filter</b>:</div>
                    </div>
                    <a href="testpage.php?filter=testpage&food=Pizza&drink=wine#getparameters" class="btn  btn-default">Reload with a bunch of parameters</a>

                </div>
            </div>
            <br><br>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
              Launchmodal
            </button>
            <br><br><br>
            <hr>
            <h4>CSS Grid based grids</h4>

            <b>.grid-2</b>
            <?php echo gridmarkup("grid-2",4) ;?>
            <br><br>
            <b>.grid-3</b>
            <?php echo gridmarkup("grid-3",6) ;?>
            <br><br>
            <b>.grid-4</b>
            <?php echo gridmarkup("grid-4",8) ;?>
            <br><br>
            <b>.grid-5</b>
            <?php echo gridmarkup("grid-5", 10) ;?>
            <br><br>
            <b>.grid-6</b>
            <?php echo gridmarkup("grid-6") ;?>
            <br><br>
            <b>.grid-2575</b>
            <?php echo gridmarkup("grid-2575", 4) ;?>
            <br><br>
            <b>.grid-7525</b>
            <?php echo gridmarkup("grid-7525", 4) ;?>
            <br><br>
            <b>.grid-3366</b>
            <?php echo gridmarkup("grid-3366", 4) ;?>
            <br><br>
            <b>.grid-2575</b>
            <?php echo gridmarkup("grid-2575", 4) ;?>
            <br><br>
            <b>.grid-6633</b>
            <?php echo gridmarkup("grid-6633", 4) ;?>
            <br><br>
            <b>.grid-255025</b>
            <?php echo gridmarkup("grid-255025", 6) ;?>
            
            <?php $ngrids = array(40, 60, 80, 100, 120, 140, 160, 180, 200);
            foreach ($ngrids as $value):?>
                <br><br>
                <b>.grid-<?php echo $value ;?>n</b>
                <?php echo gridmarkup("grid-".$value."n", 4) ;?>
            <?php endforeach; ?>
            <br><br>
            <b>.grid-40n40</b>
            <?php echo gridmarkup("grid-40n40", 6) ;?>
            <br><br>
            <b>.grid-60n60</b>
            <?php echo gridmarkup("grid-60n60", 6) ;?>
            <br><br>
            <b>.gridTable</b>
            <?php echo gridmarkup("grid-4 gridTable", 8) ;?>

             ?>
        </div> <!-- /container -->

        <?php
        // JAVASCRIPT
        // This includes the needed javascript files
        // DO NOT REMOVE
        include(snippet("meta_javascripts"));?>
        <script>
        $(function(){
            $("#favoriteColorChange").change(function() {
                $("#favColor").html($(this).val());
                updateSessionVar("set","favoriteColor",$(this).val());
                $(this).val("");
                $("#reloadInfo").removeClass("hide");
            });

            var filter = getUrlParameter("filter");
            if(filter === false){
                filter = " -- No Value -- ";
            }
            $("#filterParameter").append("<br><span>"+filter+"</span>");

            var allParams = getAllUrlParameters();
            if(allParams.length === undefined){
                $("#allParams").append("<br><span> -- No Parameters -- </span>");
            }
            $.each(allParams, function (it, elem) {
                $("#allParams").append("<br><span>"+elem+"</span>");
            });



        })


        </script>
  </body>
</html>
