<?php
require ('controllers/ApplicationController.php');
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
CONST ROOT_DIR = "/home/maxime/Documents/m3104-web-serveur/SportTrack/";

//echo("requete : ");
//print_r($_REQUEST);
//echo("</br>");
//echo("</br> session : ");
//print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>SportTrack</title>
<!--

Lava Landing Page

https://templatemo.com/tm-540-lava-landing-page

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-lava.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php?page=/" class="logo">
                            SportTrack
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                           <?php  
                           if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
                                echo('
                                <li class="scroll-to-section"><a href="index.php?page=user_disconnect" class="menu-item">Deconnection</a></li>
                                <li class="scroll-to-section"><a href="index.php?page=user_edit_form" class="menu-item">Editer le profil</a></li>
                                <li class="scroll-to-section"><a href="index.php?page=upload_activity_form" class="menu-item">Upload une activité</a></li>
                                <li class="scroll-to-section"><a href="index.php?page=list_activities" class="menu-item">Liste des Activités</a></li>');
                            } else {
                                echo('
                                <li class="scroll-to-section"><a href="index.php?page=user_add_form" class="menu-item">Creation de profil</a></li>
                                <li class="scroll-to-section"><a href="index.php?page=user_connect_form" class="menu-item">Connection</a></li>');
                            }
                           ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
<?php
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

</body>
 <!-- ***** Footer Start ***** -->
 <footer id="contact-us">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        
                    </div>
                    <!-- ***** Contact Form End ***** -->
                    <div class="right-content col-lg-6 col-md-12 col-sm-12">
                        <h2>A propos de <em>nous</em></h2>
                        <p>
                            Ce site a été developpé par Maxime DANIEL et Philippe LAIDAIN lors d'un projet etudiant pour l'IUT de vannes lors de notre DUT Informatique en cours de developpement d'applications web php.
                            </br>
                            </br>
                            <a href ="https://templatemo.com/tm-540-lava-landing-page">Crédit Template HTML/CSS</a>
                            </br>
                            <a href ="https://www.wallpaperup.com/494741/clouds_sky_Extreme_rock_climbing_guy_Sport_Mountains.html">Crédit Image</a>

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sub-footer">
                        <p>Copyright &copy; 2020 Lava Landing Page

                        | Designed by <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</html>