<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<title>SpotTrack</title>
</head>
<body>
<h1>SpotTrack</h1>
<a href="index.php?page=/">Acceuil</a>
<p>Ajouter une nouvelle activité</p>

<form enctype="multipart/form-data" action = "index.php?page=upload_activity" method="POST">
    
    <label for="userfile">Choisir un fichier à ajouter (format Json):
    <br>
    <br>
    </label>
    
    <input type="file" id="userfile" name="userfile"
       accept=".json">
    <br>
    <br>
    <br>
    <input type="submit" value="Envoyer">

</form>
</body>
</html> 