<div class="left-image-decor"></div>
<section class="section" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="center-heading">
                    <h2> <em>Editer</em> le profil</h2>
                    <p>
                        <?php echo $_SESSION['error'];?>
                        <form action = "index.php?page=user_edit" method="POST">
                            <label for="FOldMail">Adresse Email actuelle</label><br>  
                            <input type = "email" id = "FOldMail" name = "FOldMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><br>
                            <br>
                            <label for="FOldPassword">Mot de passe actuel</label><br>
                            <input type = "password" id = "FOldPassword" name = "FOldPassword" pattern="^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$£€%^&*()\-__+.]){1,}).{8,}$" required><br>
                            <br>
                            <label for="FName">Nouveau Nom</label><br>  
                            <input type = "text" id = "FName" name = "FName"><br>
                            <br>
                            <label for="FSurname">Nouveau Prénom</label><br>  
                            <input type = "text" id = "FSurname" name = "FSurname" ><br>
                            <br>
                            <label for="FDate">Nouvelle Date de naissance</label><br>  
                            <input type = "date" id = "FDate" name = "FDate" ><br>
                            <br>
                            <label for="FSex">Nouveau Genre</label><br>  
                            <input type = "Radio" id = "Male" name = "FSex" value = "Homme">
                            <label for="Homme">Homme</label><br> 
                            <input type = "Radio" id = "Female" name = "FSex" value = "Femme">
                            <label for="Femme">Femme</label><br> 
                            <input type = "Radio" id = "Other" name = "FSex" value = "Autres" checked>
                            <label for="Autres">Autre / Ne shouaite pas préciser</label><br> 
                            <br>
                            <label for="FHeight">Nouvelle Taille (cm)</label><br>  
                            <input type = "number" id = "FHeight" name = "FHeight" min = "0", max = "300" ><br>
                            <br>
                            <label for="FWeight">Nouveau Poids (Kg)</label><br>  
                            <input type = "number" id = "FWeight" name = "FWeight" min = "0", max = "300" ><br>
                            <br>
                            <label for="FMail">Nouvelle Adresse Email</label><br>  
                            <input type = "email" id = "FMail" name = "FMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" ><br>
                            <br>
                            <label for="FPassword">Nouveau Mot de passe</label><br>
                            (le mot de passe doit contenir au moins 8 caractères, dont au moins 2 majuscules, 1 caractère special (!@#$£€%^&*()\-_+.), 2 nombres et 3 minuscules) <br>
                            <input type = "password" id = "FPassword" name = "FPassword" pattern="^(?=(.*[a-z]){3,})(?=(.*[A-Z]){2,})(?=(.*[0-9]){2,})(?=(.*[!@#$£€%^&*()\-__+.]){1,}).{8,}$"><br>
                            </br>
                            <input type="submit" value="Valider">
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
 </section>