<?php
define("PATH_ROOT", $_SERVER['DOCUMENT_ROOT']."/postulacion");
require_once(PATH_ROOT . "/config/config.inc");
$redirect = "display";
session_start();
$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"web/views/")+10);
$urls = unserialize(PUBLIC_URLS);

if(isset($_GET['action'])){
	$redirect = $_GET['action'];
	
	$url .= "?action=".$redirect;
} else {
	if(!strrpos($_SERVER["SCRIPT_NAME"],"views/")){
		$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"web/")+3);
	}	
}
/*
if (isset($_SESSION['SESSION_USER'])){

	if((!in_array($url, $_SESSION['SESSION_USER']['urls']))){
		$app = 'Secure';
		$redirect = "error403";
	} else {
	
	
	
		if($url == '/index.php'){
			header("location: /web/views/Secure/index.php?action=welcome");
			exit();
		}
	}	
} else {

	if(!in_array($url, $urls)){
		header("location: /web/index.php");
		exit();
	}
} 

*/

if(!isset($app)){
	$app = 'Secure';
}	
require_once(PATH_CONTROLLERS."/".$app."Controller.php");
$controllerName = $app."Controller";
$controller = new $controllerName();
$controller->$redirect();

?>