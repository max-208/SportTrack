<!doctype html>
<html lang="fr">
<head>
      <meta charset="utf-8">
      <title>SpotTrack</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
</head>
<body>
    <div class="w3-container w3-flat-wet-asphalt">
        <h1>SpotTrack</h1>
        <p><a href="index.php?page=/">Accueil</a></p>
    </div>
    <div class="w3-container">
        <form action = "index.php?page=user_connect" method="POST">
            <label for="FMail">Adresse Email</label><br>  
            <input type = "email" id = "FMail" name = "FMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><br>
            <br>
            <label for="FPassword">Mot de passe</label><br>
            <input type = "password" id = "FPassword" name = "FPassword" pattern="^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$£€%^&*()\-__+.]){1,}).{8,}$" required><br>
            <?php echo $_SESSION['error'];?>
            <input type="submit" value="Valider">
        </form>
    </div>
</body>
</html>