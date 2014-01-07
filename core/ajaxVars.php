<?php
sleep(1);
/** --- B A S E F U N C T I O N S ---

    This file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
session_start();
include ('../functions_preDataParse.php');

// Model
include('spyc.php');
include('dataParse.php');



var_dump($_SESSION);
// echo "done";