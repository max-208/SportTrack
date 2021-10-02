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
    </div>
    
    <div class="w3-container">
        <form action = "index.php?page=user_add" method="POST">
            <label for="FName">Nom</label><br>  
            <input type = "text" id = "FName" name = "FName" required><br>
            <br>
            <label for="FSurname">Prénom</label><br>  
            <input type = "text" id = "FSurname" name = "FSurname" required><br>
            <br>
            <label for="FDate">Date de naissance</label><br>  
            <input type = "date" id = "FDate" name = "FDate" required><br>
            <br>
            <label for="FSex">Sexe</label><br>  
            <input type = "Radio" id = "Homme" name = "FSex" value = "Homme">
            <label for="Homme">Homme</label><br> 
            <input type = "Radio" id = "Femme" name = "FSex" value = "Femme">
            <label for="Femme">Femme</label><br> 
            <input type = "Radio" id = "Autres" name = "FSex" value = "Autres" checked>
            <label for="Autres">Autre / Ne shouaite pas préciser</label><br> 
            <br>
            <label for="FHeight">Taille (cm)</label><br>  
            <input type = "number" id = "FHeight" name = "FHeight" min = "0", max = "300" required><br>
            <br>
            <label for="FWeight">Poids (Kg)</label><br>  
            <input type = "number" id = "FWeight" name = "FWeight" min = "0", max = "300" required><br>
            <br>
            <label for="FMail">Adresse Email</label><br>  
            <input type = "email" id = "FMail" name = "FMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><br>
            <br>
            <label for="FPassword">Mot de passe</label><br>
            (le mot de passe doit contenir au moins 8 caractères, dont au moins 2 majuscules, 1 caractère special (!@#$£€%^&*()\-_+.), 2 nombres et 3 minuscules) <br>
            <input type = "password" id = "FPassword" name = "FPassword" pattern="^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$£€%^&*()\-__+.]){1,}).{8,}$" required><br>
            <?php echo $_SESSION['error'];?>
            <input type="submit" value="Valider">
        </form>
    </div>
</body>
</html> 