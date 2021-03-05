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
    $vendredi = $lundi+5;
    
    ?>
    
    <span><</span><?= $jour->format('M-w') ?><span>></span>

    <thead>
        <th></th>
    <?php
    $joursenlettres = [1=>'lundi', 2=>'mardi', 3=>'mercredi', 4=>'jeudi', 5=>'vendredi'];
    $lejour = intval($lundi);
    while ($lejour < $vendredi)
    {
        echo "<th scope=\"col\">";
        echo $joursenlettres[$lejour];
        echo "</th>";
        $lejour++;
    }
    ?>
    </thead>

    <?php
    for ($heure = 8; $heure<19; $heure++)
    {
        echo("<tr>");
        echo("<th scope=\"col\">".$heure."h</th>");
        for ($creneau=$lundi;$creneau<$vendredi;$creneau++)
        {
            if ($heure > 7 && $heure < 13 || $heure > 13 && $heure < 19)
            {
                echo("<td>");
                echo "créneau";
                echo("</td>");
            }
            else
            {
                echo("<td>");
                echo "pause déjeuner";
                echo("</td>");            
            }
        }
    }

?>
</table>
