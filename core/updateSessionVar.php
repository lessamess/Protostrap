<?php
include('protostrap.php');

if(empty($_GET['type']) OR empty($_GET['varname']) OR empty($_GET['val'])){
    echo "Error: Missing Parameters";
    die();
}

$tmpType = $_GET['type'];
$tmpVarname = $_GET['varname'];
$tmpVal = $_GET['val'];

// this allows to log in over ajax
if($tmpVarname == "login"){
    setcookie("loggedIn", $tmpVal );
    echo "Login on ".$_SERVER['HTTP_HOST'];
    die();
}

$tmpReturnVar = $tmpVarname;

if(strpos($tmpVarname, ".") === false && empty($_SESSION[$_GET['varname']])){
    echo "Error: Variable does not exist";
    die();
}


switch ($tmpType) {
    case 'set':
        if(strpos($tmpVarname, ".") !== false){
            $el = explode(".", $tmpVarname);
            $tmpReturnVar = $el[0];
            switch(count($el)){
                case 1:
                    $_SESSION[$el[0]] = $tmpVal;
                    break;
                case 2:
                    $_SESSION[$el[0]] [$el[1]]= $tmpVal;
                    break;
                case 3:
                    $_SESSION[$el[0]][$el[1]][$el[2]] = $tmpVal;
                    break;
                case 4:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]] = $tmpVal;
                    break;
                case 5:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]] = $tmpVal;
                    break;
                case 6:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]] = $tmpVal;
                    break;
                case 7:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]][$el[6]] = $tmpVal;
                    break;
                default:
                    die("Error: " . count($el) . " are too many levels");
                    break;
            }

        } else {
            $_SESSION[$tmpVarname] = $tmpVal;
        }

        break;
    case 'push':
        array_push($_SESSION[$tmpVarname], $tmpVal);
        $_SESSION[$tmpVarname] = array_unique($_SESSION[$tmpVarname]);
        $_SESSION[$tmpVarname] = array_values($_SESSION[$tmpVarname]);
        break;
    case 'remove':
        foreach ($_SESSION[$tmpVarname] as $key => $value) {
            if($tmpVal == $value){
                unset($_SESSION[$tmpVarname][$key]);
            }
        }
        $_SESSION[$tmpVarname] = array_unique($_SESSION[$tmpVarname]);
        $_SESSION[$tmpVarname] = array_values($_SESSION[$tmpVarname]);
        break;
    case 'removeKey':
        unset($_SESSION[$tmpVarname][$tmpVal]);
        break;
    case 'removeValue':
        unset($_SESSION[$tmpVarname][$tmpVal]);
        if (($key = array_search($tmpVal, $_SESSION[$tmpVarname])) !== false) {
            unset($_SESSION[$tmpVarname][$key]);
        }
        break;

    case 'null':
        if(is_array($_SESSION[$tmpVarname])){
            $_SESSION[$tmpVarname] = array();
        } else {
            $_SESSION[$tmpVarname] = false;
        }
        break;
}
echo json_encode($_SESSION[$tmpReturnVar]);