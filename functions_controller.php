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