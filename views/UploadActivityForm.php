<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<title>SpotTrack</title>
</head>
<body>

<h1>SpotTrack</h1>
<a href="index.php?page=/">upload_activity</a>
<p>Ajouter une nouvelle activité</p>

<form action = "index.php?page=upload_activity" method="POST">
    
    <label for="avatar">Choisir un fichier à ajouter (format Json):</label>
    
    <input type="file" id="avatar" name="avatar"
       accept=".json">

    <button>Envoyer</button>
    
    
</form>
</body>
</html> 