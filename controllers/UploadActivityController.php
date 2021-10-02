<?php
require('Controller.php');
require('./model/Activity.php');
require('./model/ActivityDAO.php');
require('./model/Data.php');
require('./model/DataDAO.php');
require('./model/calculDIstance.php');

class UploadActivityController implements Controller{

    public function handle($request){
        print("</br>");
        print("</br>");
        print_r($_FILES);
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/'.'uploads/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
        

        if($FileType != "json" ) {
            echo "Erreur, seulement les fichiers Json sont traités";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Votre fichier ne peut pas être téléchargé";
          
        } else {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
                echo "Fichier ". htmlspecialchars( basename( $_FILES["userfile"]["name"])). " est téléchargé.";
                // Fichier téléchargé , traitement des données 
                $Json = file_get_contents($uploadfile);

                $ActivityArray = json_decode($Json, true);
                print("</br>");
                print("</br>ActivityArray : ");
                print_r($ActivityArray);

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
                print("</br>");
                print("</br>Activity : ");
                print($Activity->__toString());
                ActivityDAO::getInstance()->insert($Activity);

                //on ajoute les points de données
                $idActivity = $id;
                $idPreviousData = DataDAO::getInstance()->getMaxId();
                foreach($ActivityArray["data"] as $dataPoint ){
                    print("</br>");
                    print("</br>Datapoint : ");
                    //print_r($dataPoint);
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
                    print($data->__toString());
                    DataDAO::getInstance()->insert($data);
                    $idPreviousData = $id;
                }

                unlink($uploadfile); // on supprime le fichier
            
            } else {
              echo "Erreur lors du téléchargement du fichier";
            }
        }
        
    }   
}
?>