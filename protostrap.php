<?php
// *FAKE* Login/Logout
$loggedIn = false ;

if (!empty($_POST['login'])){
    if(strtolower($_POST['login']) == "fail") {
        $showLoginError = "true";
    } else {
        setcookie("loggedIn", true);
        $loggedIn = true;
    }
}

if (!empty($_COOKIE['loggedIn'])){
    $loggedIn = true;
}



if (!empty($_POST['logout'])){
    setcookie ("loggedIn", "", time() - 3600);
    $loggedIn = false;
}

// Generate a unique Id that can be referenced to
// This is handy in constructs like collapsibles, so you dont have to worry about id juggling
$lastUniqid = "";
function getUniqid(){
    return $GLOBALS["lastUniqid"] = uniqid();
}