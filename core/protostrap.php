<?php
//
$GLOBALS["lastUniqueId"] = 1;

// *FAKE* Login/Logout
$loggedIn = false ;
$username = "John Doe";
$usermail = "john.doe@site.com";

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