<?php

// These Functions are loaded before dataParse


function yesterday(){
    return date("d.m.Y", time() - 60 * 60 * 24);
}

function tomorrow(){
    return date("d.m.Y", time() + 60 * 60 * 24);
}


function makePeriod(){
    return date("M d.", time() - 60 * 60 * 24). date("-d Y", time() + 60 * 60 * 24);
}

function setDefaultEvent($id){
     $_SESSION['defaultEvent'] = $id;
     $_SESSION['events'][$id]['activeInstance'] = $_SESSION['events'][$id]['productionInstance'];
}