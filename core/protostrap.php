<?php
//
$GLOBALS["lastUniqueId"] = 1;

// *FAKE* Login/Logout
$loggedIn = false ;
$user1 = false;
$user2 = false;
$user3 = false;

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
    switch ($loggedIn){
            case 'user2':
                $user2 = true;
                $username = "Tommy Two";
                $usermail = "tommy.two@site.com";
            break;
            case 'user3':
                $user3 = true;
                $username = "Thierry Three";
                $usermail = "thierry.three@site.com";
            break;
            case 'user1':
            default:
                $user1 = true;
                $username = "John Doe";
                $usermail = "john.doe@site.com";
            break;
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