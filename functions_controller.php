<?php

function figureFormat($num, $decimals = 2){
    $num = floatval($num);
   return number_format($num, $decimals, '.', '&rsquo;');
}

function moneyFormat($n, $n_decimals = 2, $digitSeparator = ".", $thousandSeparator = '&rsquo;'){
        return ((floor($n) == round($n, $n_decimals)) ? number_format($n, 0 , false, $thousandSeparator ).".—-" : number_format($n, $n_decimals, $digitSeparator, $thousandSeparator));
    }

