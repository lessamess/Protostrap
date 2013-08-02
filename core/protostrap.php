<?php
session_start();
if(!empty($_GET['session_destroy'])){
    session_destroy();
    session_start();
}
// Model
include('spyc.php');
include('dataParse.php');


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

if (!empty($_POST['login'])){
    if(strtolower($_POST['login']) == "fail") {
        $showLoginError = "true";
    } else {

        setcookie("loggedIn", $_POST['login']);
        $loggedIn = trim($_POST['login']);
        $justLoggedIn = true;
    }
}

if (!empty($_COOKIE['loggedIn'])){
    $loggedIn = $_COOKIE['loggedIn'];
}


if($loggedIn){
    if(empty($users[$loggedIn])) {
        $activeUser = $users['user'];

        $username = $users['user']['username'];
        $usermail = $users['user']['usermail'];
        $userrole = $users['user']['role'];
        $userpermissions = $roles[$userrole]['permissions'];
    } else {
        $activeUser = $users[$loggedIn];
        $username = $users[$loggedIn]['username'];
        $usermail = $users[$loggedIn]['usermail'];
        $userrole = $users[$loggedIn]['role'];
        $userpermissions = $roles[$userrole]['permissions'];
    }
}



if (!empty($_POST['logout']) || !empty($_GET['logout'])){
    setcookie ("loggedIn", "", time() - 3600);
    $loggedIn = false;
    session_destroy();
    header("Location: http://" . $_SERVER["HTTP_HOST"] );
    die;
}

// Generate a unique Id that can be referenced to
// This is handy in constructs like collapsibles, so you dont have to worry about id juggling
$lastUniqid = "";
function getUniqueId(){
    return $GLOBALS["lastUniqueId"] = $GLOBALS["lastUniqueId"] + 1;
}

include('commonController.php');