<div class="right-image-decor"></div>
<section class="section" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="center-heading">
                    <h2> <em>Creation</em> de profil</h2>
                    <p>
                        <?php echo $_SESSION['error'];?>
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
                            <label for="FSex">Genre</label><br>  
                            <input type = "Radio" id = "Homme" name = "FSex" value = "Homme">
                            <label for="Homme">Homme</label><br> 
                            <input type = "Radio" id = "Femme" name = "FSex" value = "Femme">
                            <label for="Femme">Femme</label><br> 
                            <input type = "Radio" id = "Autres" name = "FSex" value = "Autres" checked>
                            <label for="Autres">Autre / Ne souhaite pas préciser</label><br> 
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
                            </br>
                            <input type="submit" value="Valider">
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
 </section>
