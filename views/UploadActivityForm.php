<div class="right-image-decor"></div>
<section class="section" id="testimonials">

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="center-heading">
                    <h2>Importer une <em>activité</em></h2>
                    <p>
                        <?php echo $_SESSION['error'];?>
                        <form enctype="multipart/form-data" action = "index.php?page=upload_activity" method="POST">
                            <label for="userfile">Choisir un fichier à ajouter (format Json): </label>
                            <input type="file" id="userfile" name="userfile" accept=".json">
                            </br>
                            <input type="submit" value="Envoyer">
                        </form>
                    </p>
            </div>
        </div>
    </div>
</section>