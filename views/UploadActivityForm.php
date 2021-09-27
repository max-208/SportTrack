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

<form action = "index.php?page=upload_activity" method="POST">
    
    <label for="avatar">Choisir un fichier à ajouter (format Json):
    <br>
    <br>
    </label>
    
    <input type="file" id="avatar" name="avatar"
       accept=".json">
    <br>
    <br>
    <br>
    
    <button>Envoyer</button>
    
    
</form>
</body>
</html> 