<?php

// Model
include('spyc.php');
include('data.php');

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

if (!empty($_POST['login'])){
    if(strtolower($_POST['login']) == "fail") {
        $showLoginError = "true";
    } else {

        setcookie("loggedIn", strtolower($_POST['login']));
        $loggedIn = strtolower($_POST['login']);
    }
}

if (!empty($_COOKIE['loggedIn'])){
    $loggedIn = $_COOKIE['loggedIn'];
}


if($loggedIn){
    if(empty($users[$loggedIn])) {
        $username = $users['user']['username'];
        $usermail = $users['user']['usermail'];
        $userrole = $users['user']['role'];
    } else {
        $username = $users[$loggedIn]['username'];
        $usermail = $users[$loggedIn]['usermail'];
        $userrole = $users[$loggedIn]['role'];
    }
}



if (!empty($_POST['logout']) || !empty($_GET['logout'])){
    setcookie ("loggedIn", "", time() - 3600);
    $loggedIn = false;
    header("Location: ".$_SERVER["HTTP_REFERER"]);
}

// Generate a unique Id that can be referenced to
// This is handy in constructs like collapsibles, so you dont have to worry about id juggling
$lastUniqid = "";
function getUniqueId(){
    return $GLOBALS["lastUniqueId"] = $GLOBALS["lastUniqueId"] + 1;
}
