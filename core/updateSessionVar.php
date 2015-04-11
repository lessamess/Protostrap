<?php
include('protostrap.php');

if(empty($_GET['type']) OR empty($_GET['varname']) OR empty($_GET['val'])){
    echo "Error: Missing Parameters";
    die();
}

if(empty($_SESSION[$_GET['varname']])){
    echo "Error: Variable does not exist";
    die();
}

$tmpType = $_GET['type'];
$tmpVarname = $_GET['varname'];
$tmpVal = $_GET['val'];

switch ($tmpType) {
    case 'set':
        $_SESSION[$tmpVarname] = $tmpVal;
        break;
    case 'push':
        array_push($_SESSION[$tmpVarname], $tmpVal);
        break;
    case 'remove':
        unset($_SESSION[$tmpVarname][$tmpVal]);
        break;
    case 'null':
        if(is_array($_SESSION[$tmpVarname])){
            $_SESSION[$tmpVarname] = array();
        } else {
            $_SESSION[$tmpVarname] = false;
        }
        break;
}
echo "Done.";