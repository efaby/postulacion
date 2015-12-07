<?php
define("PATH_ROOT", $_SERVER['DOCUMENT_ROOT']."/postulacion");
require_once(PATH_ROOT . "/config/config.inc");
$redirect = "display";
session_start();

$patron = "web/";
$limit = 4;
if(mb_stristr($_SERVER["SCRIPT_NAME"],"/views/")){
	$patron = "web/views/";
	$limit = 10;
}
$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],$patron)+$limit);

$urls = unserialize(PUBLIC_URLS);

if(isset($_GET['action'])){
	$redirect = $_GET['action'];
	
	$url .= "?action=".$redirect;
} else {
	if(!strrpos($_SERVER["SCRIPT_NAME"],"views/")){
		$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"web/")+3);
	}	
}

if (isset($_SESSION['SESSION_USER'])){

	if((!in_array($url, $_SESSION['SESSION_USER']['urls']))){
		$app = 'Secure';
		$redirect = "error403";
	} else {	
		if($url == '/index.php'){
			header("location: /postulacion/web/views/Secure/index.php?action=welcome"); // postulacion
			exit();
		}
	}	
} else {

	if(!in_array($url, $urls)){
		header("location: /postulacion/web/index.php");
		exit();
	}
} 


if(!isset($app)){
	$app = 'Secure';
}	
require_once(PATH_CONTROLLERS."/".$app."Controller.php");
$controllerName = $app."Controller";
$controller = new $controllerName();
$controller->$redirect();

?>