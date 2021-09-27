<!doctype html>
<html lang="fr">
<meta charset="UTF-8">
<head>
      <title>SpotTrack</title>
</head>
<body>
      <h1>SpotTrack</h1>
      
      <a href="index.php?page=user_add_form">Creation de profil</a>
      <a href="index.php?page=user_connect_form">Connexion</a>
      <a href="index.php?page=user_disconnect">Deconnection</a>
      <a href="index.php?page=/">Editer le profil</a>
      <a href="index.php?page=upload_activity_form">Upload une activité</a>
      <a href="index.php?page=list_activities">Lister les activités</a>
</br>
</br>
      <?php 
      echo $_SESSION['message']; 
      ?>
      </body>
      </html>
      <!DOCTYPE html>
</body>
</html> 