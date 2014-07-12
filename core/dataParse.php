<?php

// Leave the code below alone
if(isset($_SESSION['application'])){
    $parsed = $_SESSION;
    $setsession = false;
} else {

    $yaml = "";
    // READ ALL FILES IN ASSETS/DATA AND CONCATENATE

        //Open directory
        $path = "assets/data/";
        $dir = dir($path);

        //List files in directory
        while (($file = $dir->read()) !== false){

            //Make sure it's a .txt file
            if(strlen($file) <  5 or $file == ".DS_Store")
                continue;
            $yaml .= file_get_contents($path.$file);
            $yaml .= "\n";
        }

        $dir->close();

    $parsed = Spyc::YAMLLoad($yaml);
    if(!empty($parsed['translations_url']) && strlen($parsed['translations_url']) > 0){
        $parsed['translations'] = get_translations($parsed['translations_url']);
    }
    $_SESSION = $parsed;
}

// Handle datachanges
$sessiondata = "";
if (!empty($_POST['session'])){

    foreach($_POST['session'] as $key => $postSession) {
        setSessionVar($key, $postSession);
        $sessiondata .= print_r($postSession, true);
    }
    $parsed = $_SESSION;

}

if (!empty($_GET['session'])){
    foreach ($_GET as $key => $value) {
        if($key!== "session"){
            setSessionVar($key, $value);
        }
    }


    $parsed = $_SESSION;

}


// Expose each session key as variable and handle livesearch entry
$livesearch = "";
$livesearchKeys = array("name", "title");
$mykeys = array();
foreach ($parsed as $key => $item){
    $$key = $item;

    if (is_array($$key)) {
        $url="";

        if(!empty(${$key}[0]) && ${$key}[0] == 'parse'){
                    if(!empty(${$key}[2])){
                       $tempvar = ${$key}[1](${$key}[2]);
                    } else {
                       $tempvar =  ${$key}[1]();
                    }
                    $$key = $tempvar;
                    continue;
                }

        foreach($$key as $subkey => $var){

            if(!empty($var[0])){

                //die();
                if($var[0] == 'parse'){
                    if(!empty($var[2])){
                       $tempvar = $var[1]($var[2]);
                    } else {
                       $tempvar =  $var[1]();
                    }
                    ${$key}[$subkey] = $tempvar;
                }
            }

            if($subkey === "livesearch") {
                $url = ${$key}[$subkey]['url'];
                unset(${$key}[$subkey]);
            } else {
                if(is_array($var)){

                    // Add an id if it is an associative array
                    if(array_values($var) != $var){
                        ${$key}[$subkey]['id'] = $subkey;
                        };

                    foreach ($livesearchKeys as $lsKey){
                        if(!empty(${$key}[$subkey][$lsKey])){
                            $livesearch .= "{value: '". addslashes(${$key}[$subkey][$lsKey]) . "', url: '" . $url ."?id=" . $subkey . "'},";
                        }
                    }

                    foreach ($var as $vkey => $v){

                        if(!empty($v[0])){

                            if($v[0] == 'parse'){
                                $mykeys[]= $vkey;
                                if(!empty($v[2])){
                                   $tempvar = $v[1]($v[2]);
                                } else {
                                   $tempvar =  $v[1]();
                                }
                                ${$key}[$subkey][$vkey] = $tempvar;
                            }
                        }


                    }




                }
            }

        }
    }
}
$livesearch = substr($livesearch, 0, -1);


function setSessionVar($key, $item){
    $el = explode('.', $key);
    $type = "default";
    if(preg_match('/arrayPush/', $item)){
        $type = "push";
        $item = substr($item, 10);
    }
    if(preg_match('/arrayUnserialize/', $item)){
        $item = unserialize(substr($item, 17));
    }
    switch($type){
        case 'push':
            switch(count($el)){
                case 1:
                    array_push($_SESSION[$el[0]], $item);
                    break;
                case 2:
                    array_push($_SESSION[$el[0]] [$el[1]], $item);
                    break;
                case 3:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]], $item);
                    break;
                case 4:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]], $item);
                    break;
                case 5:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]], $item);
                    break;
                case 6:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]], $item);
                    break;
            }
            break;
        default:
            switch(count($el)){
                case 1:
                    $_SESSION[$el[0]] = $item;
                    break;
                case 2:
                    $_SESSION[$el[0]] [$el[1]]= $item;
                    break;
                case 3:
                    $_SESSION[$el[0]][$el[1]][$el[2]] = $item;
                    break;
                case 4:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]] = $item;
                    break;
                case 5:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]] = $item;
                    break;
                case 6:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]] = $item;
                    break;
                case 7:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]][$el[6]] = $item;
                    break;
                default:
                    die(count($el) . "too Long");
                    break;
            }
            break;
    }
}

function get_translations($url){

    if(!ini_set('default_socket_timeout',    15)) echo "unable to change socket timeout";
    $url = preg_replace("|edit\?usp=sharing|", "export?format=csv", $url);

    if (($handle = fopen($url, "r")) !== FALSE) {
        $i = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($i == 0){
                    array_shift($data);
                    $i++;
                    $languages = $data;
                } else {
                    foreach ($languages as $key => $lang) {
                        $translations[$data[0]][$lang]=$data[$key + 1];
                    }


                }

        }
        fclose($handle);
    }
    else{
        die("Problem reading Translation csv from Google Drive");
    }

    return($translations);
}

function normalize ($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r', ' '=>'_', '-'=>'_',
    );

    return strtr($string, $table);
}

function get_spreadsheetData($url, $var){

    if(empty($_GET['session_destroy']) AND !empty($_SESSION[$var])){
        return $_SESSION[$var];
    }

    $val = Array();
    $url = preg_replace("|edit\?usp=sharing|", "export?format=csv", $url);

    if(!ini_set('default_socket_timeout',    15)) echo "unable to change socket timeout";

    if (($handle = fopen($url, "r")) !== FALSE) {
        $i = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($i == 0){
                    foreach ($data as $key => $itemval){
                        $val['fields']['keys'][$key] = normalize(strtolower($itemval));
                        $val['fields']['labels'][$key] = $itemval;
                    }
                    $i++;
                } else {
                    foreach ($val['fields']['keys'] as $key => $itemval) {
                        $val['data'][$i][$itemval]=$data[$key];
                    }
                    $i++;
                }
        }
        fclose($handle);
    }
    else{
        die("Problem reading Translation csv from Google Drive");
    }
    $_SESSION[$var] = $val;
    return($val);
}
