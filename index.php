<?php

    error_reporting(E_ALL);

    ini_set('memory_limit', '-1');

    //OS Dependent Directory separator defined for use
    define("DS", DIRECTORY_SEPARATOR);

    //The Root directory of the installation.
    define("DocRoot", dirname(__FILE__) . DS);

	include_once "config/sys.conf.php";
	include_once "config/db.conf.php";
    include_once "config/meta.conf.php";
    
    session_start();

	include_once "core" . DS . "routeHandler.php";

	$linkPre = explode("/", $GLOBALS['subFol']);
	$path = strtok($_SERVER['REQUEST_URI'], '?');
	$path1 = explode("?", $path);
	$path = ltrim($path1[0], '/');
    $elem = explode('/', $path);


    if(isset($_SESSION["status"]) && $_SESSION["status"]) {
        require_once "frontend/Home.php";
    } else {
        require_once  "frontend/login.php";
    }



?>