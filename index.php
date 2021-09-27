<?php
require ('controllers/ApplicationController.php');
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
CONST ROOT_DIR = "/home/maxime/Documents/m3104-web-serveur/SpotTrack/";

echo("requete : ");
print_r($_REQUEST);
echo("</br>");
echo("</br> session : ");
print_r($_SESSION);
$controller = ApplicationController::getInstance()->getController($_REQUEST);
if($controller != null){
include "controllers/$controller.php";
(new $controller())->handle($_REQUEST);
}
$view = ApplicationController::getInstance()->getView($_REQUEST);
if($view != null){
include "./views/$view.php";
}
?>
