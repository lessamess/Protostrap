<?php

function figureFormat($num, $decimals = 2){
    $num = floatval($num);
   return number_format($num, $decimals, '.', '&rsquo;');
}

// Order stuff via uasort($array, 'itemOrder');
function itemOrder($a, $b) {

    // Change 'name'-key to whatever Index your array should be ordered by
    return $a['order'] > $b['order'] ? 1 : -1;

}