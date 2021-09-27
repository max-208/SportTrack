<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<head>
<title>SpotTrack</title>
</head>
<body>

<h1>SpotTrack</h1>
<a href="index.php?page=/">Acceuil</a>
<p>Liste des activités</p>

<form action = "index.php?page=list_activities" method="POST">
    <<table border="1", cellpadding="8">>
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

    $array = ActivityDAO::getInstance()->getItem($user);
    
    foreach ( $array as $value){
        echo("<td>".$value->getDescription()."</td>");
        echo("<td>".$value->getDate()."</td>");
        echo("<td>".$value->getBegginingTime()."</td>");
        echo("<td>".$value->getDuration()."</td>");
        echo("<td>"."Distance"."</td>");
        echo("<td>".$value->getMinCardio()."</td>");
        echo("<td>".$value->getMaxCardio()."</td>");
        echo("<td>".$value->getAverageCardio()."</td>");
            
    }

    // <tr>

    //   <td><td width="15%">  </td>
    //   <td>  </td>
    //   <td>  </td>
    //   <td>  </td>
    //   <td>  </td>
    //   <td>  </td>
    //   <td>  </td>
    //   <td>  </td>

    // </tr>

?>
    </table>
    
    
    
    
</form>
</body>
</html> 