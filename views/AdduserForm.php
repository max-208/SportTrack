<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<title>SpotTrack</title>
</head>
<body>

<h1>SpotTrack</h1>
<a href="index.html">Acceuil</a>
<p>Formulaire d'inscription</p>

<form action = "index.php"  page="user_add" method="POST">
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
    <input type = "Radio" id = "Male" name = "FSex" value = "Male">
    <label for="Male">Homme</label><br> 
    <input type = "Radio" id = "Female" name = "FSex" value = "Female">
    <label for="Female">Femme</label><br> 
    <input type = "Radio" id = "Other" name = "FSex" value = "Other" checked>
    <label for="Other">Autre / Ne shouaite pas préciser</label><br> 
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

    <input type="submit" value="Valider">
</form>
</body>
</html> 