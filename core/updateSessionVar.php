<?php
include('protostrap.php');

if(empty($_GET['type']) OR empty($_GET['varname']) OR empty($_GET['val'])){
    echo "Error: Missing Parameters";
    die();
}

$tmpType = $_GET['type'];
$tmpVarname = $_GET['varname'];
$tmpVal = $_GET['val'];

if(strpos($tmpVarname, ".") === false && empty($_SESSION[$_GET['varname']])){
    echo "Error: Variable does not exist";
    die();
}


switch ($tmpType) {
    case 'set':
        if(strpos($tmpVarname, ".") !== false){
            $el = explode(".", $tmpVarname);

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