<?php
 ini_set('display_errors', 'On');
    error_reporting(E_ALL);
require ('controllers/ApplicationController.php');
print_r($_REQUEST);
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
