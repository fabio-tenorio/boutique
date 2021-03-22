<?php

/*
Affiche un agenda sur le mois courant, en cliquant sur un jour, on visualise les créneaux disponibles
En cliquant sur le jour, renvoi vers page agenda journée
*/

?>

<h2>Planning</h2>
<table class="table table-bordered table-hover table-light">
    <?php
    $jour = new \DateTime();
    $an = $jour->format('Y');
    $semaine = $jour->format('W');
    $mois = $jour->setISODate($an, $semaine);
    // le nombre du mois courant
    $mois = $jour->format('n');
    // le lundi (jour 01) de la semaine courante
    $lundi = $jour->format('d');
    $dimanche = $lundi+7;
    
    ?>
    
    <span><</span><?= $jour->format('M-w') ?><span>></span>

    <thead>
        <th></th>
    <?php
    $joursenlettres = [1=>'lundi', 2=>'mardi', 3=>'mercredi', 4=>'jeudi', 5=>'vendredi', 6=>'samedi', 7=>'dimanche'];
    $lejour = intval($lundi);
    foreach($joursenlettres as $jourdelasemaine)
    {
        echo "<th scope=\"col\">";
        echo $jourdelasemaine;
        echo "</th>";
    }
    ?>
    </thead>

    <?php
    for ($heure = 8; $heure<21; $heure++)
    {
        echo("<tr>");
        echo("<th scope=\"col\">".$heure."h</th>");
        for ($creneau=$lundi;$creneau<$dimanche;$creneau++)
        {
            echo("<td>");
            echo ('<a href="http://');
            echo PATH;
            echo ("/ControllerAgenda/form_view");
            echo ("?");
            echo $heure."heures";
            echo $creneau."/";
            echo $mois."/";
            echo $an;
            echo ('">reserver ce créneau</a>');
            echo("</td>");
            // si souhait de prevoir une pause
            // if ($heure > 7 && $heure < 13 || $heure > 13 && $heure < 21)
            // {
            //     echo("<td>");
            //     echo "créneau";
            //     echo("</td>");
            // }
            // else
            // {
            //     echo("<td>");
            //     echo "";
            //     echo("</td>");            
            // }
        }
    }

?>
</table>
