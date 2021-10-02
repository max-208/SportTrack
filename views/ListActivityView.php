<div class="left-image-decor"></div>
<section class="section" id="testimonials">

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="center-heading">
                  <h2>Liste des <em>Activités</em></h2>
                
            </div>
        </div>
        <form action = "index.php?page=list_activities" method="POST">
          <table cellpadding="8"class="tab-table tab-bordered tab-hoverable">
            <tr class="center-heading tab-color">
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
    </div>
</section>