<?php
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');


function makeData($string){
   $ymlData = Spyc::YAMLLoad(trim($string));
   return $ymlData['data'];
}

function takeDefaultData($string) {
    $ymlData = Spyc::YAMLLoad(trim($string));
   return $ymlData['module']['data'];
}

$spreadsheetURL = "https://docs.google.com/spreadsheets/d/1Kc1_ZcKBtdJBE0PTv5sTkeUIDZKVEoR900wp0qn7qUQ/edit?usp=sharing";
$elemente = get_spreadsheetData($spreadsheetURL, "elemente");
$modulIds = array();
foreach ($elemente['data'] as $key => $element) {
    $modulIds[] = $element['module_id'] ;
}

$modulIds = array_unique($modulIds);


if(isset($_GET['iframe'])){
    include ('./snippets/'.$_GET['iframe']);
    die();
}
$files = scandir('./snippets');

function getModuleTop($module, $filename){
    $modulIds = $GLOBALS['modulIds'];
    $elemente = $GLOBALS['elemente'];
    $loggedIn = $GLOBALS['loggedIn'];
    $thishost = $_SERVER["HTTP_HOST"] ;

    echo "<a class=\"anchor\" name=\"".$filename."\"></a>";
    ?>
    <div class="row">
        <div class="col-md-4">
            <?php echo "<h2>".$module['name']."</h2>";?>
        </div>
        <div class="col-md-6">
            <br>
            <button class="btn btn-default btn-text copyToClipboard" data-target="copyContent<?php echo $filename ;?>"><i class="fa fa-copy"></i> Copy link to module</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($module['description'])){
                echo "<p>".$module['description']."</p>";
            }
            echo "Modul-Id: ". $filename;?>
            <br>
            
            <div id="copyContent<?php echo $filename ;?>" class="hide">http://<?php echo $thishost ;?>/modules.php#<?php echo $filename ;?></div>
        </div>
        <div class="col-md-8">
            <?php if(in_array($filename, $modulIds) ):
            switch ($module['container']) {
                case 'md-5':
                case 'md-6':
                case 'md-7':
                case 'md-8':
                case 'md-9':
                case 'md-10':
                case 'md-11':
                case 'md-12':
                getElementeTabelle($filename);
                break;
            }
            endif ?>
        </div>
    </div>

    <?php echo "<br>";
    switch ($module['container']) {
        case 'md-1':
        case 'md-2':
        case 'md-3':
        case 'md-4':
        case 'md-5':
        case 'md-6':
        case 'md-7':
        case 'md-8':
        case 'md-9':
        case 'md-10':
        case 'md-11':
        case 'md-12':
        ?>
            <div class="row">
                <div class="col-<?php echo $module['container'] ;?>">
            <?php break;
        case 'iframe':
        ?>
            <iframe src="moduleIframe.php?filename=<?php echo $filename ;?>" frameborder="0" height="200" width="90%"></iframe>
            <?php break;

        default:
        ?>
            <div class="row">
                <div class="col-12">
            <?php break;
    }
}


function getModuleBottom($module){
    $loggedIn = $GLOBALS['loggedIn'];

    switch ($module['container']) {
        case 'md-1':
        case 'md-2':
        case 'md-3':
        case 'md-4':
        case 'md-5':
        case 'md-6':
        case 'md-7':
        case 'md-8':
        case 'md-9':
        case 'md-10':
        case 'md-11':
        case 'md-12':
            echo "</div></div>";
            break;

        default:
            echo "</div></div>";
            break;
    }
    echo "<br>";
}

function getElementeTabelle($filename){
    $elemente = $GLOBALS['elemente'];
    ?>
    <table class="table table-condensed">
        <tr>
            <th>Element</th>
            <th>Format</th>
            <th>Description</th>
            <th>Mandatory</th>
        </tr>
        <?php foreach ($elemente['data'] as $key => $element):
            if($element['module_id'] != $filename){continue;}
        ?>
            <tr>
                <td ><?php echo $element['name'] ;?></td>
                <td style="max-width:250px;"><?php echo nl2br($element['format']) ;?></td>
                <td style="max-width:300px;"><?php echo nl2br($element['description']) ;?></td>
                <td><?php echo $element['mandatory'] ;?></td>
            </tr>

        <?php endforeach ?>
    </table>
<?php }

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
    <body class="header-fixed">
            <div class="container">
                <a href="modules_toc.php">Table of Contents</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $spreadsheetURL ;?>" target="_blank">Spreadsheet für Modulelemente</a>
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
                    include("./snippets/".$filename);
                    $tmp['snippet'] =  ob_get_clean();


                    $modules[$gruppe][] = $tmp;
                    $order[$gruppe] = $hasOrder;
                }
             endforeach ;?>

             <nav class="navbar navbar-default navbar-fixed-top">
               <div class="container">
                    <ul class="nav navbar-nav">
                    <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                    <?php foreach ($modules as $key => $value):?>
                        <li><a href="#<?php echo $key ;?>"><?php echo ucfirst($key) ;?></a> </li>
                    <?php endforeach; ?>
                    </ul>
               </div>
             </nav>

            <?php foreach ($modules as $groupkey => $modulegroup):?>
                <div class="container">
                    <br>
                    <a class="anchor" name="<?php echo $groupkey;?>"></a>
                    <br><br><small><?php echo ucfirst($groupkey) ;?></small>
                    <br>
                </div>
                    <?php

                    if($order[$groupkey] == true){
                        $modulegroup = reorder($modulegroup, "order");
                    }
                    foreach ($modulegroup as $key => $module): ?>
                        <div class="container">
                            <?php
                                getModuleTop($module['moduleRaw']['module'], $module['filename']);
                            if(isset($module['moduleRaw']['module']['varianten'])):
                                 include("./snippets/". $module['moduleRaw']['module']['varianten'] .".php");
                                getModuleBottom($module['moduleRaw']['module']);
                             else :

                                if($module['moduleRaw']['module']['container'] != "iframe"){
                                    echo '<div class="snippet">';
                                    echo $module['snippet'];

                                    switch ($module['moduleRaw']['module']['container']) {
                                        case 'md-1':
                                        case 'md-2':
                                        case 'md-3':
                                        case 'md-4':
                                        echo '</div></div><div class="col-md-8">';
                                        getElementeTabelle($module['filename']);
                                        break;
                                    }



                                    echo '</div>';
                                    getModuleBottom($module['moduleRaw']['module']);
                                }
                            endif; ?>

                        </div>
                        <hr class="plain">
                    <?php endforeach ;?>
            <?php endforeach ;?>
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