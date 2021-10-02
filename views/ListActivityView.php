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
<form action = "index.php?page=list_activities" method="POST">
    <table border="1", cellpadding="8">
      <colgroup span="8" class="columns"></colgroup>
      <tr>
        <th><td width="15%">Description</th>
        <th>Date</th>
        <th>Heure de début</th>
        <th>Durée</th>
        <th>Distance parcourue</th>
        <th>Frequence minimum</th>
        <th>Frequence maximum</th>
        <th>Frequence moyenne</th>
        
      </tr>

    <?php
        print($_SESSION["message"])

    ?>
    </table>

</form>
</div>
</body>
</html> 