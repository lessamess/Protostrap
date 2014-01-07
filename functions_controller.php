<?php

function numberFormat($num, $dez = 2){
    $num = floatval($num);
   return number_format($num, $dez, '.', '&rsquo;');
}

function itemOrder($a, $b) {

   
    return $a['endDatumSortable'] > $b['endDatumSortable'] ? 1 : -1;
}