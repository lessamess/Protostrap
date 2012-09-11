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