<div class="left-image-decor"></div>
<section class="section" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="center-heading">
                    <h2> <em>Connection</em></h2>
                    <p>
                        <?php echo $_SESSION['error'];?>
                        <form action = "index.php?page=user_connect" method="POST">
                            <label for="FMail">Adresse Email</label><br>  
                            <input type = "email" id = "FMail" name = "FMail" pattern = "[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><br>
                            <br>
                            <label for="FPassword">Mot de passe</label><br>
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