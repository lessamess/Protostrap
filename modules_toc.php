<?php
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

$thishost = $_SERVER["HTTP_HOST"] ;

$elemente = get_spreadsheetData("https://docs.google.com/spreadsheets/d/1L00QfPo7rK_vsV_9m2RkD30z8el1zp36YMPt78PaO04/edit?usp=sharing", "elemente");
$modulIds = array();
foreach ($elemente['data'] as $key => $element) {
    $modulIds[] = $element['module_id'] ;
}

array_unique($modulIds);

$files = scandir('./snippets');



?><!DOCTYPE html>
<html >
    <head>
        <title><?php echo $application . " - Module"  ;?></title>
        <?php
        // this includes all the markup that loads css files and similar stuff,
        // if you have to add more css, that's the place to do it.
        // DO NOT REMOVE
        include(snippet("meta_headTag"));?>

    </head>
    <body class="header-fixed">
            <div class="container">
                <a href="modules.php">List of Modules</a>
            </div>
            <br>
            <?php

            $modules = array();
            foreach ($files as $filekey => $filename): ?>
                <?php
                //var_dump($value);
                if(strpos($filename, "mod_") === 0){
                    $moduleList = true;
                    include("./snippets/".$filename);
                    $moduleRaw = Spyc::YAMLLoad(trim($moduleVars));
                    $gruppe = "text";
                    if(isset($moduleRaw['module']['group'])){
                        $gruppe = strtolower($moduleRaw['module']['group']);
                    }

                    $tmp['moduleRaw'] = $moduleRaw;
                    $tmp['filename'] = substr($filename, 0, -4);

                    $moduleList = false;
                    $hasOrder = false;
                    if(isset($moduleRaw['module']['order'])):
                        $hasOrder = true;
                        $tmp['order'] = $moduleRaw['module']['order'];
                    endif;

                    foreach ($moduleRaw['module']['data'] as $key => $value) {
                        if(is_numeric($key)){
                            $data = $moduleRaw['module']['data'];
                            break;
                        }
                        ${$key} = $value;
                    }
                    ob_start();
                    //include("./snippets/".$filename);
                    $tmp['snippet'] =  ob_get_clean();


                    $modules[$gruppe][] = $tmp;
                    $order[$gruppe] = $hasOrder;
                }
             endforeach ;?>

            <div class="container">
                <h3>Module Inhaltsverzeichnis</h3>
                <br><br>
                <table class="table table-condensed">
                    <tr>
                        <th><i class="fa fa-clipboard"></i> Copy Link</th>
                        <th>Module</th>
                        <th>Name</th>
                        <th>Group</th>
                    </tr>
                <?php
                foreach ($modules as $groupkey => $modulegroup):
                    if($order[$groupkey] == true){
                        $modulegroup = reorder($modulegroup, "order");
                    }
                    foreach ($modulegroup as $key => $module): ?>
                        <tr>
                            <td>
                                <button class="btn btn-default copyToClipboard" data-target="copyContent<?php echo $key ;?>"><i class="fa fa-copy"></i></button>
                                <div id="copyContent<?php echo $key ;?>" class="hide">
                                    http://<?php echo $thishost ;?>/module.php#<?php echo $filename ;?>
                                </div>

                            </td>
                            <td><a href="modules.php#<?php echo $module['filename'] ;?>"><?php echo $module['filename'] ;?></a></td>
                            <td><?php echo $module['moduleRaw']['module']['name'] ;?></td>
                            <td><?php echo ucfirst($groupkey) ;?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
                </table>
            </div>


                <div class="container">
                <?php include(snippet("footer")); ?>
            </div>
                <?php
                 // JAVASCRIPT
                // This includes the needed javascript files
                // DO NOT REMOVE
                include(snippet("meta_javascripts"));?>
    </body>
</html>