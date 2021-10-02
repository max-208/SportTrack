<!doctype html>
<html lang="fr">
<head>
      <meta charset="utf-8">
      <title>SpotTrack</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
</head>
<body>
    <div class="w3-container w3-flat-turquoise">
        <h1>SpotTrack</h1>
        <p><a href="index.php?page=/">Accueil</a></p>
        </br>
    </div>
    <div class="w3-container ">
        </br>
        <form enctype="multipart/form-data" action = "index.php?page=upload_activity" method="POST">

            <label for="userfile">Choisir un fichier à ajouter (format Json):
            <br>
            <br>
            </label>
            
            <input type="file" id="userfile" name="userfile"
               accept=".json">
            <br>
            <?php echo $_SESSION['error'];?>
            <input type="submit" value="Envoyer">
            
        </form>
    </div>
</body>
</html> 