<?php
ini_set('memory_limit', '-1');

//OS Dependent Directory separator defined for use
define("DS", DIRECTORY_SEPARATOR);

//The Root directory of the installation.
define("DocRoot", dirname(__FILE__) . DS);

include_once "config/sys.conf.php";
include_once "config/db.conf.php";
include_once "config/meta.conf.php";

/*
 * Path resolver
 * The action 'router' basically checks if the second part of the link,
 * i.e, after action/ is plugs. If it is, it looks for the appropriate
 * action file in the plugin's action folder.
 */
$linkURI = $_SERVER['REQUEST_URI'];
$removeQ = explode("?", $linkURI);
$preLink = $removeQ[0];
$preLink = ltrim($preLink, '/');
$preLink = rtrim($preLink, '/');
$pathArray = explode("/", $preLink);
if(sizeof($pathArray) <= 1)
{
    $emptyReq = new stdClass();
    $emptyReq->errorCode = "ACTION_100";
    $emptyReq->errorMessage = "Empty request.";
    $jsonSent = json_encode($emptyReq);
    die($jsonSent);
}
array_shift($pathArray);
$fileIdentifier = array_shift($pathArray);
$fileLocation = "";

if(file_exists($fileLocation))
{
	include $fileLocation;
}
else
{
    $retObj = new stdClass();
    $retObj->error_code = "ACTION_400";
    $retObj->fileLocation = $fileLocation;
    $retObj->error_message = "Action not found";
	die(json_encode($retObj));
}
?>