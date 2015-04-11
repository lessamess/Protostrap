<?php

function figureFormat($num, $dez = 2){
    $num = floatval($num);
   return number_format($num, $dez, '.', '&rsquo;');
}

// Order stuff via uasort($array, 'itemOrder');
function itemOrder($a, $b) {

    // Change 'orderKey' to whatever Index your array should be ordered by
    return $a['orderIndex'] > $b['orderIndex'] ? 1 : -1;

}

function box($text, $class="info",$icon="inherit", $id="", $dismiss = true ){
    if ($icon == "inherit") {
        switch ($class) {
            case 'success':
                $icon = "check";
                break;
            case 'danger':
                $icon = "warning";
                break;

            default:
                $icon = "info-circle";
                break;
        }
    }
    echo "<div id=\"" . $id . "\" class=\"alert alert-". $class ."\">";
    if($dismiss){
        echo "<button class='close' data-dismiss='alert'  type='button'>×</button>";
    }
    echo "<ul class=\"fa-ul\">
          <li style='width:96%'>
            <i class=\"fa fa-" . $icon . " fa-lg fa-li\"></i>
            " . $text . "
          </li>
        </ul>
      </div>";
}