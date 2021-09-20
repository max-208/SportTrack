<?php
$array = array( 
    array("latitude" => 47.644795,"longitude" => -2.776605,"altitude" => 18),
    array("latitude" => 47.646870,"longitude" => -2.778911,"altitude" => 18),
    array("latitude" => 47.646197,"longitude" => -2.780220,"altitude" => 18),
    array("latitude" => 47.646992,"longitude" => -2.781068,"altitude" => 17),
    array("latitude" => 47.647867,"longitude" => -2.781744,"altitude" => 16),
    array("latitude" => 47.648510,"longitude" => -2.780145,"altitude" => 16)
);

require "code.php";
$impl = new CalculDistanceImpl();
$impl->calculDistanceTrajet($array);
?>