<?php 

    // Show all types of errors
    // To change into 0 in production or comment the two lines out
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT', __DIR__.'/');
    define("SITE_PATH","http://localhost/pms/");