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
  <p>
<form action = "index.php?page=list_activities" method="POST">
    <table cellpadding="8"class="w3-table w3-bordered w3-hoverable">
      <colgroup span="8" class="columns"></colgroup>
      <tr class="w3-flat-turquoise">
        <th><b>Description</b></th>
        <th><b>Date</b></th>
        <th><b>Heure de début</b></th>
        <th><b>Durée</b></th>
        <th><b>Distance parcourue</b></th>
        <th><b>Frequence minimum</b></th>
        <th><b>Frequence maximum</b></th>
        <th><b>Frequence moyenne</b></th>
        
      </tr>

    <?php
        print($_SESSION["message"])

    ?>
    </table>

</form>
</p>
</div>
</body>
</html> 