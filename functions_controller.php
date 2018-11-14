<?php

function figureFormat($num, $decimals = 2){
    $num = floatval($num);
   return number_format($num, $decimals, '.', '&rsquo;');
}

function money_drop_zero_decimals($n, $n_decimals = 2){
    return ((floor($n) == round($n, $n_decimals)) ? number_format($n).".—" : number_format($n, $n_decimals));
}

