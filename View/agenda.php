<?php
/*
Affiche un agenda hebdomadaire sur le mois courant. En cliquant sur un jour, on visualise les créneaux disponibles
En cliquant sur le jour, renvoi vers page agenda journée
*/
?>

<h2 class="my-4 text-dark text-center">Planning</h2>
<div class="agenda-pages my-2">
    <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
    </a>
    <h3 class="text-dark">
        <?= "Semaine ".$this->semaine." de l'année ".$this->an."<br>"."du lundi ".$this->lundi."/".$this->mois." au dimanche ".$this->dimanche."/".$this->mois; ?>
    </h3>
    <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
    </a>
</div>
<div>
    <table class="agenda table table-bordered table-hover table-light my-4 mx-3">
        <thead class="thead-dark">
            <tr>
            <th></th>
        <?php
        $joursenlettres = ['lundi', 'mardi', 'mercredi','jeudi', 'vendredi', 'samedi', 'dimanche'];
        // $lejour = intval($this->lundi);
        foreach($joursenlettres as $jourdelasemaine)
        {
            echo ("<th scope=\"col\">");
            echo $jourdelasemaine;
            echo ("</th>");
        }
        ?>
            </tr>
        </thead>

        <?php
        for ($heure = 8; $heure<20; $heure++) {
            echo'<tr>';
            echo'<th class="agenda-heure" scope="row">'.$heure.'h</th>';
            for ($jour=$this->lundi;$jour<=$this->dimanche;$jour++) {
                if ($heure===8 || $heure===9) {
                    $creneau = $this->an."-".$this->mois."-".$jour." 0".$heure.":00:00";    
                } else {
                    $creneau = $this->an."-".$this->mois."-".$jour." ".$heure.":00:00";
                }
                $creneauVide = true;
                foreach ($this->allResa as $objects) {
                    foreach ($objects as $propertyName => $property) {
                        if ($propertyName=='datedebut') {
                            if ($property===$creneau) {
                                echo '<td class="text-center">';
                                echo "<h4>".$objects->titrereservation."</h4>";
                                if ($objects->id_utilisateur===$_SESSION['user']->id) {
                                    echo('<a class="btn btn-warning" href="http://');
                                    echo PATH;
                                    echo("/ControllerAgenda/formResaView/");
                                    echo $creneau;
                                    echo('">annuler la réservation</a>');
                                }
                                $creneauVide = false;
                            }
                        }
                    }
                }
                if ($creneauVide === true) {
                    echo '<td class="text-center">';
                    echo('<a href="http://');
                    echo PATH;
                    echo("/ControllerAgenda/formResaView/");
                    echo $creneau;
                    echo('">reserver ce créneau</a>');
                }
                echo('</td>');
            }
            echo('</tr>');
        }
        ?>
    </table>
