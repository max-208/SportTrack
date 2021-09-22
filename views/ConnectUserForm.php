<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<title>SpotTrack</title>
</head>
<body>

<h1>SpotTrack</h1>
<a href="index.php?page=/">Acceuil</a>
<p>Formulaire de connexion</p>

<form action = "index.php" page="user_connect" method="POST">
    <label for="FMail">Adresse Email</label><br>  
    <input type = "email" id = "FMail" name = "FMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><br>
    <br>
    <label for="FPassword">Mot de passe</label><br>
    <input type = "password" id = "FPassword" name = "FPassword" pattern="^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$£€%^&*()\-__+.]){1,}).{8,}$" required><br>
    <input type="submit" value="Valider">
</form>
</body>
</html>