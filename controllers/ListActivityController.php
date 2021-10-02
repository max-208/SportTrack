<?php
require('Controller.php');
require('model/ActivityDAO.php');
require('model/Activity.php');

class ListActivityController implements Controller{

    public function handle($request){
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            #$_SESSION['message']= " ";

            $array = ActivityDAO::getInstance()->getItem($_SESSION["Email"]);
            foreach ( $array as $value){
                $_SESSION['message'] = $_SESSION['message'] . ("<tr>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getDescription()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getDate()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getBegginingTime()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getDuration()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>"."Distance"."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getMinCardio()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getMaxCardio()."</td>");
                $_SESSION['message'] = $_SESSION['message'] . ("<td>".$value->getAverageCardio()."</td>");  
                $_SESSION['message'] = $_SESSION['message'] . ("</tr>");
            }
        } else {
            header( "refresh:0;url=index.php?page=/",true,302 );
        }
    }
}
?>