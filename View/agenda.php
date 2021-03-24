 <?php
/*
Affiche un agenda hebdomadaire sur le mois courant. En cliquant sur un jour, on visualise les créneaux disponibles
En cliquant sur le jour, renvoi vers page agenda journée
*/
?>
<h2>Planning</h2>
<table class="table table-bordered table-hover table-light">    
    <span><</span><?= "Semaine ".$this->semaine." de l'année ".$this->an."<br>"."du lundi ".$this->lundi."/".$this->mois." au dimanche ".$this->dimanche."/".$this->mois; ?><span>></span>
    <thead>
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
        echo("<tr>");
        echo("<th scope=\"row\">".$heure."h</th>");
        for ($jour=$this->lundi;$jour<=$this->dimanche;$jour++) {
            echo('<td>');
            foreach ($this->allResa as $objects) {
                foreach ($objects as $propertyName => $property) {
                    if ($propertyName=='datedebut') {
                        $datetimeResa = explode(" ", $property);
                        $dateResa = explode("-", $datetimeResa[0]);
                        $dateResa[2] = intval($dateResa[2]);
                        $timeResa = intval($datetimeResa[1]);
                        if ($dateResa[0]==$this->an && $dateResa[1]==$this->mois && $dateResa[2]===$jour && $heure===$timeResa) {
                            var_dump($dateResa[2]);
                            echo('</td>');
                        }
                    } 
                }
            }
            if ($dateResa[2]!==$jour || ($dateResa[2]===$jour && $heure!==$timeResa)) {
                echo('<a href="http://');
                echo PATH;
                echo("/ControllerAgenda/formResaView/");
                echo $creneau;
                echo('">reserver ce créneau</a>');
            }
            echo('</td>');
        }
        echo ('</tr>');
    }
?>
</table>