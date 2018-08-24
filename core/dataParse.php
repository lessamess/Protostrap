<?php

// Leave the code below alone
if(isset($_SESSION['application'])){
    $parsed = $_SESSION;
    $setsession = false;
} else {

    $yaml = "";
    // READ ALL FILES IN ASSETS/DATA AND CONCATENATE

        //current script directory
        $csd = dirname(__FILE__);
        //Open directory
        $path = $csd."/../assets/data/";
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

    if(!empty($parsed['linkedData'])){
        foreach ($parsed['linkedData'] as $key => $link) {
            $sheet = "";
            if(isset($link['sheet'])){
                $sheet = $link['sheet'];
            }
            $parsed[$key] = get_spreadsheetData($link['url'], $key, $sheet);
        }
    }

    $_SESSION = $parsed;
    $_SESSION['prototype'] = $csd;
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


if(!empty($_GET)){
    foreach ($_GET as $key => $value) {
        if(!empty($_SESSION[$key])){
            setSessionVar($key, $value);
        }
    }
    $parsed = $_SESSION;
}


// Expose each session key as variable and handle livesearch entry

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

        $addId = false;
        foreach($$key as $subkey => $var){

            if(!empty($var[0])){
                if($var[0] == 'parse'){
                    if(!empty($var[2])){
                       $tempvar = $var[1]($var[2]);
                    } else {
                       $tempvar =  $var[1]();
                    }
                    ${$key}[$subkey] = $tempvar;
                }
            }
            switch ($subkey){
                case 'addId':
                    $addId = true;
                break;
                default:
                    if(is_array($var)){

                        // Add an id if it is an associative array
                        if(array_values($var) != $var && $addId == true){
                            ${$key}[$subkey]['id'] = $subkey;
                            unset(${$key}['addId']);
                        };

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
                break;
            }
        }
    }
}

$language = key($languages);


if(!empty($_COOKIE[$applicationKey."_language"])){
    $language = $_COOKIE[$applicationKey."_language"];
} else {
    setcookie($applicationKey."_language", $language, time()+3600*24*180);
}



// Handle Language Switch
if(!empty($_GET['switchLanguage'])){
    $language = $_GET['switchLanguage'];
    //persist into cookie
    setcookie($applicationKey."_language", $_GET['switchLanguage'], time()+3600*24*180);
}

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

function parseVar($var){
    $pattern ="|'parse', ?'([a-zA-Z0-9]*)', ?'?([a-zA-Z0-9]*)'?|";
    $matches = preg_match($pattern, $var, $mymatches);

    if(empty($matches)){
        return $var;
    } else {

        return $mymatches[1]($mymatches[2]);
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
        die("Problem reading csv from Google Drive");
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
        'ÿ'=>'y', 'R'=>'R', 'r'=>'r', ' '=>'_', '-'=>'_', ','=>'','/'=>'',
    );

    return strtr($string, $table);
}

function get_spreadsheetData($url, $var, $sheet = false){

    if(empty($_GET['session_renew']) AND !empty($_SESSION[$var])){
        return $_SESSION[$var];
    }

    $val = Array();


    $exportParams = "gviz/tq?tqx=out:csv";
    $sheetparam = "";
    if($sheet){
        $sheetparam .= "&sheet=".$sheet;
    }

    $url = preg_replace("|edit\?usp=sharing|", $exportParams, $url).$sheetparam;

    if(!ini_set('default_socket_timeout',    15)) echo "unable to change socket timeout";

    try
    {
        $handle = @fopen($url,"r");
        if (!$handle) {
             throw new Exception('Failed to open spreadsheet. <b>Are you offline?</b>');
        }
      // send success JSON

    } catch ( Exception $e ) {
        echo '<div class="container"><pre>Caught exception: ',  $e->getMessage(), "</pre></div><br><br>";
        return;
    }


    $i = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($i == 0){
            foreach ($data as $key => $itemval){
                // check if the column name belongs to a column that has to be parsed
                if(strpos($itemval, "_parse_") > 0){
                    $val['fields']['keys'][$key] = $itemval;
                    $parts = explode("_", $itemval);
                    $val['fields']['labels'][$key] = $parts[0];
                } else {
                    $val['fields']['keys'][$key] = normalize(strtolower($itemval));
                    $val['fields']['labels'][$key] = $itemval;
                }
            }
            $i++;
        } else {
            foreach ($val['fields']['keys'] as $key => $itemval) {
                // check if the value belongs to a column that has to be parsed
                if(strpos($itemval, "_parse_") > 0){
                    $parts = explode("_", $itemval);
                    // check if the function exists
                    if(function_exists($parts[2])){
                        $colval = $parts[2]($data[$key]);
                    } else {
                        $colval = $data[$key]." >> not parsed: missing function ". $parts[2];
                    }

                    $itemval = $parts[0];
                } else {
                    $colval = $data[$key];
                }
                $val['data'][$i-1][$itemval] = $colval;
            }
            $i++;
        }
    }
    fclose($handle);

    // Change the keys that belong to parsed columns
    foreach ($val['fields']['keys'] as $key => $itemval) {
        if(strpos($itemval, "_parse_") > 0){
            $parts = explode("_", $itemval);
            $val['fields']['keys'][$key] = $parts[0];
        }
    }
    $_SESSION[$var] = $val;
    return($val);
}
