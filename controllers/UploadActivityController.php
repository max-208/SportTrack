<?php
require('Controller.php');
require('./model/Activity.php');
require('./model/ActivityDAO.php');
require('./model/Data.php');
require('./model/DataDAO.php');
require('./model/calculDIstance.php');

class UploadActivityController implements Controller{

    public function handle($request){
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
            $_SESSION['error']= "</br>"; 
            $uploadfile = $_FILES['userfile']['tmp_name'];
            json_decode(file_get_contents($uploadfile));
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                header( "refresh:0;url=index.php?page=upload_activity_form",true,302 );
                $_SESSION["error"] = "</br><p>Erreur, seul les fichiers JSON sont acceptés<p></br>";
            } else {
                echo "Fichier ". htmlspecialchars( basename( $_FILES["userfile"]["name"])). " est téléchargé.";
                // Fichier téléchargé , traitement des données 
                $Json = file_get_contents($uploadfile);
                $ActivityArray = json_decode($Json, true);
                // on ajoute l'activité
                $Activity = new Activity();
                $id = ActivityDAO::getInstance()->getMaxId();
                $da = $ActivityArray[ "activity" ][ "date" ];
                $de = $ActivityArray[ "activity" ][ "description" ];
                $th = $_SESSION["Email"];
                $ma = 0;
                $mi = 0;
                $av = 0;
                $be = 0;
                $du = 0;
                $Activity->init($id , $da ,$de ,$th ,$ma ,$mi ,$av ,$be ,$du);
                ActivityDAO::getInstance()->insert($Activity);
                //on ajoute les points de données
                $idActivity = $id;
                $idPreviousData = DataDAO::getInstance()->getMaxId();
                foreach($ActivityArray["data"] as $dataPoint ){
                    $data = new Data();
                    $id = DataDAO::getInstance()->getMaxId();
                    $ti = $dataPoint[ "time" ];
                    $ca = $dataPoint[ "cardio_frequency" ];
                    $la = $dataPoint[ "latitude" ];
                    $lo = $dataPoint[ "longitude" ];
                    $al = $dataPoint[ "altitude" ];
                    $pr = $idPreviousData;
                    $th = $idActivity;
                    $data->init($id , $ti ,$ca ,$la ,$lo ,$al ,$pr ,$th);
                    DataDAO::getInstance()->insert($data);
                    $idPreviousData = $id;
                }
                unlink($uploadfile); // on supprime le fichier
                header( "refresh:0;url=index.php?page=/" );
                #$_SESSION["message"] = "Fichier ajouté avec succes ! Vous serez redirigé vers l'accueil dans 3 secondes</br>";
                
            }
        } else {
            header( "refresh:0;url=index.php?page=/",true,302 );
        }
        
    }   
}
?>