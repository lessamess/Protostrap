<?php
session_start();

//current script directory
$csd = dirname(__FILE__);

if(empty($_SESSION['prototype'])){
    $_SESSION['prototype'] = "";
}
if(!empty($_GET['session_destroy']) OR !empty($forceLoadData) OR $_SESSION['prototype'] != $csd){
    session_destroy();
    session_start();
}

include ($csd.'/../functions_preDataParse.php');

// Model
include($csd.'/spyc.php');
include($csd.'/dataParse.php');


// Handle request ID
$reqId = false;
if (!empty($_POST['id'])) {
    $reqId = $_POST['id'];
}
if (!empty($_GET['id'])) {
    $reqId = $_GET['id'];
}

//
$GLOBALS["lastUniqueId"] = 1;

// *FAKE* Login/Logout
$loggedIn = false ;
$justLoggedIn = false;
$showLoginError = false;

if (!empty($_POST['login'])){
    if(strtolower($_POST['login']) == "fail") {
        $showLoginError = true;
    } else {

        setcookie("loggedIn", $_POST['login']);
        $loggedIn = trim($_POST['login']);
        $justLoggedIn = true;
    }
}

if (!empty($_COOKIE['loggedIn'])){
    $loggedIn = $_COOKIE['loggedIn'];
}


$loginWith = $config['loginWith'];
if($loggedIn){
    $userExists = false;
    foreach ($users as $user){
        if($loggedIn == $user[$loginWith]){
            $userExists = $user;
        }
    }

    if(!$userExists) {
        if(!array_key_exists('defaultUser', $config)){
            echo "Error: <b>defaultUser</b> not defined in config.yml<br>";
            echo "Add configuration and <a href='?session_destroy=true'>Renew PHP session</a> ";
            die();
        }

        if(empty($users[$config['defaultUser']])){
            echo "Error: Default user does not exist in YML file!<br>";
            echo "user Key: " . $config['defaultUser'];
            die();
        }

        setUserVars($users[$config['defaultUser']]);

    } else {
        setUserVars($userExists);

    }
}

if(!empty($_GET['deeplink']) && !empty($_GET['user'])){
        setUserVars($users[$_GET['user']]);
        setcookie("loggedIn", $activeUser[$loginWith]);
        $loggedIn = trim($activeUser[$loginWith]);
        $justLoggedIn = true;
    }




if (!empty($_POST['logout']) || !empty($_GET['logout'])){
    setcookie ("loggedIn", "", time() - 3600);
    $loggedIn = false;
    $justLoggedIn = false;
    session_destroy();
    if(empty($_POST['noredirect']) AND empty($_GET['noredirect'])){
        header("Location: index.php" );
        die;
    }

}


function setUserVars($user){
        $GLOBALS['activeUser'] = $user;
        $GLOBALS['username'] = $user['username'];
        $GLOBALS['usermail'] = $user['email'];
        $GLOBALS['userrole'] = $user ['role'];
        $GLOBALS['userpermissions'] = $GLOBALS['roles'][$user ['role']]['permissions'];
}


// Generate a unique Id that can be referenced to
// This is handy in constructs like collapsibles, so you dont have to worry about id juggling

function getUniqueId($param = "lastUniqueId"){
    if(empty($GLOBALS[$param])){
        $GLOBALS[$param] = 0;
    }
    return $GLOBALS[$param] = $GLOBALS[$param] + 1;
}


function getlabel($style, $label){
    echo "<span class=\"label label-{$style}\">{$label}</span>";
}

function forceLogin(){

    if(!$GLOBALS['loggedIn']){
        $users = $GLOBALS['users'];
        include('snippets/forceLogin.php');
    }

}

function getNavclasses($navKeys, $activeNavigation){
    if(empty($activeNavigation)){
        die("You have to define a key for the active Navigation");
    }
    $navClasses = Array('','','','','','','','','','','','','','','','','','','','','','','','','');
    foreach ($navKeys as $key => $item){
        if($item == $activeNavigation) {
            $navClasses[$key] = "active";
        }
     }
     return $navClasses;
}

function showIf($string) {
    $class = "hidden";
    if(!empty($GLOBALS['userrole']) && strpos($string, $GLOBALS['userrole']) !== false){
        $class = "";
    }
    echo $class;
}

function hideIf($string) {
    $class = "";
    if(!empty($GLOBALS['userrole']) && strpos($string, $GLOBALS['userrole']) !== false){
        $class = "hidden";
    }
    echo $class;
}

function includeIf($roles, $file) {
    if(!empty($GLOBALS['userrole']) && strpos($roles, $GLOBALS['userrole']) !== false){
        if (file_exists('./snippets/'. $file)){
            include('./snippets/' . $file);
        } else {
            echo "file missing";
        }
    }
}

function setFromGet($var, $default = false){
    if(!empty($_GET[$var])){
                $GLOBALS[$var] = $_GET[$var];
            } else {
                $GLOBALS[$var] = $default;
            }
}

function __($key){
    $translations = $GLOBALS['translations'];
    $language = $GLOBALS['language'];

    if(!empty($translations[$key][$language])){
        return $translations[$key][$language];
    } else {
        return $key;
    }
}

function cacheHandler(){
    return "?time=".time();
}

function writeCss($config){
    if(empty($_GET['writeCss'])){
        return;
    }
    // write combined File
    $combinedCssFile = '../assets/css/combined.css';
    $combined = "";
    foreach($config['cssFiles'] as $key => $file){
        $combined .= file_get_contents('../assets/css/'.$file);
    };
    file_put_contents($combinedCssFile, $combined);
}

function updateYAMLfromSpreadsheets($linkedData){
    if(empty($_GET['updateYAML'])){
        return;
    }
    if(!is_array($linkedData) OR count($linkedData)<1){
        //echo "no Links available";
        return;
    }

    file_put_contents("../assets/data/dataFromSpreadsheets.yml", "");
    $flashMsg['type'] = "success";
    $flashMsg['text'] = "<b>Import successful</b><br>The following variables have been imported: <br>";
    foreach($linkedData as $key => $url){
        $flashMsg['text'] .= "<b>".$key."</b>, ";
        $val[$key] = get_spreadsheetData($url, $key);

        $yaml = Spyc::YAMLDump($val );
        unset($val);
        $GLOBALS['flashMsg'] = $flashMsg;
        file_put_contents("../assets/data/dataFromSpreadsheets.yml", $yaml, FILE_APPEND);
    };
}

function removeSpreadsheetData(){
    if(empty($_GET['removeSpreadsheetData'])){
        return;
    }
    file_put_contents("../assets/data/dataFromSpreadsheets.yml", "");
}

function getDeeplink(){
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $start = "?";
    $user = "";
    if(strpos($url,"?")) {
        $start = "&";
    }
    if(!empty($GLOBALS['activeUser'])){
        $user = "&userrole=".$GLOBALS['userrole']."&user=".$GLOBALS['activeUser']['id'];
    }
    return $url.$start."deeplink=true".$user;

}



include($csd.'/dynamic_form.php');
include($csd.'/../functions_controller.php');