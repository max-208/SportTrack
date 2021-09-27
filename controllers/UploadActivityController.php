<?php
require('Controller.php');

class UploadActivityController implements Controller{

    public function handle(){
        $uploaddir = 'uploads/';
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
            if (move_uploaded_file($_FILES["userfile"]["name"], $uploadfile)) {
              echo "Fichier ". htmlspecialchars( basename( $_FILES["userfile"]["name"])). " est téléchargé.";
            } else {
              echo "Erreur lors du téléchargement du fichier";
            }
        }
        // Fichier téléchargé , traitement des données 
        $Json = file_get_contents($uploadfile);
        
        $myarray = json_decode($Json, true);
        var_dump($myarray);

        //$data = json_decode($json);
        //echo $data->myarray[2]->time;
//


    }   
}
?>