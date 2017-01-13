<?php
/***********
 *
 * Protostrap
 * v. 3.1
 *
 ***********/

//current script directory
$csd = dirname(__FILE__);

$version = "1";
if (file_exists($csd. "/../snippets/version.php")) {
   include($csd. "/../snippets/version.php");
}


session_start();


if(empty($_SESSION['prototype'])){
    $_SESSION['prototype'] = "";
}

if(!empty($_GET['session_renew']) OR !empty($forceLoadData) OR $_SESSION['prototype'] != $csd OR !isset($_COOKIE['version']) OR $_COOKIE['version'] != $version){
    session_destroy();
    session_start();
    setcookie("version", $version, time()+3600*24*180);
}


// Model
include($csd.'/spyc.php');
include($csd.'/dataParse.php');

// Check if the User is authorised
if(strlen($config['prototypeauth']) > 0){checkAuth($config);};

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
            echo "Add configuration and <a href='?session_renew=true'>Renew PHP session</a> ";
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
    $activeUser = false;
    $username = false;
    $usermail = false;
    $userrole = false;
    $userpermissions = false;
    session_destroy();
    if(empty($_POST['noredirect']) AND empty($_GET['noredirect'])){
        header("Location: index.php" );
        die;
    }

}

/** DATA HANDLING FUNCTIONS **/

function today($format = false){
    if($format == false){
        $format = $GLOBALS['config']['defaultPHPdateFormat'];
    }
    return date($format, time() );
}
function yesterday($format = false){
    if($format == false){
        $format = $GLOBALS['config']['defaultPHPdateFormat'];
    }
    return date($format, time() - 60 * 60 * 24);
}

function tomorrow($format = false){
    if($format == false){
        $format = $GLOBALS['config']['defaultPHPdateFormat'];
    }
    return date($format, time() + 60 * 60 * 24);
}

function makePeriod(){
    return date("M d.", time() - 60 * 60 * 24). date("-d Y", time() + 60 * 60 * 24);
}

function makeDateFromString($str, $format = false){
    if($format == false){
        $format = $GLOBALS['config']['defaultPHPdateFormat'];
    }
    return date($format, strtotime($str));
}

$currentYear = date("Y");

function setUserVars($user){
        $GLOBALS['activeUser'] = $user;
        $GLOBALS['username'] = $user['username'];
        $GLOBALS['usermail'] = $user['email'];
        $GLOBALS['userrole'] = $user ['role'];
        $GLOBALS['userpermissions'] = $GLOBALS['roles'][$user ['role']]['permissions'];
}

function forceLogin(){
    if(!$GLOBALS['loggedIn']){
        $users = $GLOBALS['users'];
        include('snippets/forceLogin.php');
    }
}

function getFirstUserLogin(){
    if(!isset($GLOBALS['users'])){
        return "";
    }
    $loginWith = $GLOBALS['config']['loginWith'];
    $users = $GLOBALS['users'];
    $firstUser = reset($users);
    echo $firstUser[$loginWith];
}


function setFromGet($var, $default = false){
    if(!empty($_GET[$var])){
        $GLOBALS[$var] = $_GET[$var];
    } else {
        $GLOBALS[$var] = $default;
    }
}

function __($key, $language = false){
    $translations = $GLOBALS['translations'];
    if($language == false){
        $language = $GLOBALS['language'];
    }
    if(!empty($translations[$key][$language])){
        return $translations[$key][$language];
    } else {
        return $key;
    }
}

function cacheHandler(){
    return "?time=".time();
}

function writeCombined($config){
    if(empty($_GET['writeCombined'])){
        return;
    }

    readAsset("css", $config);
    readAsset("js", $config);
    $yaml['config'] = $config;
    $output = Spyc::YAMLDump($yaml);
    file_put_contents("../assets/data/config.yml", $output);
    //var_dump($output);
}

function readAsset($type, $config){
    $files = scandir ( "assets/".$type);
    $combined = "";

    // Add jquery
    if($type == "js"){
        $combined .= file_get_contents('assets/' . $type . '/jquery.min.js');
    }

    // attach bootstrap
    $combined .= file_get_contents('assets/' . $type . '/bootstrap.min.'.$type);

    // Walk through assets
    foreach($config['assets'] as $key => $asset){
        if($asset['load'] != 1){continue;}
        foreach ($files as $file) {
            // if there is a file with the key in the name -> get its content.
            if(strpos($file, $key) !== false){
                $combined .= file_get_contents('assets/' . $type . '/'.$file);
                $combined .= "\n";
            }
        }
    };

    // attach protostrap
    $combined .= file_get_contents('assets/' . $type . '/protostrap.'.$type);

    // write combined File
    $combinedFile = "assets/". $type ."/combined.". $type ;

    file_put_contents($combinedFile, $combined);
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

/** DISPLAY FUNCTIONS **/


function snippet($snippet){
    return "./snippets/".$snippet.".php";
}

function showIf($string) {
    $class = "hide";
    if(!empty($GLOBALS['userrole']) && strpos($string, $GLOBALS['userrole']) !== false){
        $class = "";
    }
    echo $class;
}

function hideIf($string) {
    $class = "";
    if(!empty($GLOBALS['userrole']) && strpos($string, $GLOBALS['userrole']) !== false){
        $class = "hide";
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

// Generate a unique Id that can be referenced to
// This is handy in constructs like collapsibles, so you dont have to worry about id juggling

function getUniqueId($param = "lastUniqueId"){
    if(empty($GLOBALS[$param])){
        $GLOBALS[$param] = 0;
    }
    return $GLOBALS[$param] = $GLOBALS[$param] + 1;
}

function alert($text, $class="info",$icon="inherit", $id="", $dismiss = true ){
    if ($icon == "inherit") {
        switch ($class) {
            case 'success':
                $icon = "check";
                break;
            case 'danger':
                $icon = "warning";
                break;

            default:
                $icon = "info-circle";
                break;
        }
    }
    echo "<div id=\"" . $id . "\" class=\"alert alert-". $class ."\">";
    if($dismiss){
        echo "<button class='close' data-dismiss='alert'  type='button'>×</button>";
    }
    echo "<ul class=\"fa-ul\">
          <li style='width:96%'>
            <i class=\"fa fa-" . $icon . " fa-lg fa-li\"></i>
            " . $text . "
          </li>
        </ul>
      </div>";
}


function checkAuth($config){

    if(!empty($_COOKIE["prototypeauth"]) and $_COOKIE["prototypeauth"] == $config['prototypeauth']){
        return;
    }
    if(!empty($_POST["prototypeauth"]) and $_POST["prototypeauth"] == $config['prototypeauth']){
        setcookie("prototypeauth",$_POST["prototypeauth"],time()+3600*24*180);
        return;

    }
    if(!empty($_POST["prototypeauth"]) and $_POST["prototypeauth"] != $config['prototypeauth']){
        $autherror=true;
    }
    include("./snippets/prototypeauth.php");

}

function itemOrder($a, $b) {
    // Change 'name'-key to whatever Index your array should be ordered by
    switch ($_SESSION['order_direction'] ) {
        case 'desc':
            return $a['age'] < $b['age'] ? 1 : -1;
            break;

        default:
            return $a['age'] > $b['age'] ? 1 : -1;
            break;
    }

}

function reorder($array, $column, $direction = "asc"){

    $_SESSION['order_column'] = $column;
    $_SESSION['order_direction'] = $direction;
    uasort($array, 'itemOrder');
    return $array;
}

include($csd.'/../functions_controller.php');