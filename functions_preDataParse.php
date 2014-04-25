<?php

// These Functions are loaded before dataParse
// Put other functions into functions_controller.php

function yesterday(){
    return date("d.m.Y", time() - 60 * 60 * 24);
}

function tomorrow(){
    return date("d.m.Y", time() + 60 * 60 * 24);
}

function makePeriod(){
    return date("M d.", time() - 60 * 60 * 24). date("-d Y", time() + 60 * 60 * 24);
}

function makeDateFromString($str){
    return date("d.m.Y", strtotime($str));
}
