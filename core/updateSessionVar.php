<?php
error_reporting(E_ALL);
/** --- B A S E F U N C T I O N S ---
    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

if(empty($_GET['type']) OR empty($_GET['varname']) OR empty($_GET['val'])){
    echo "Error: Missing Parameters";
    die();
}
$tmpType = $_GET['type'];
$tmpVarname = $_GET['varname'];
$tmpVar = $$tmpVarname;
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
