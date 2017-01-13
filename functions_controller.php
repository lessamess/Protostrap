<?php

function figureFormat($num, $decimals = 2){
    $num = floatval($num);
   return number_format($num, $decimals, '.', '&rsquo;');
}


