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
    for ($heure = 8; $heure<21; $heure++) {
        echo("<tr>");
        echo("<th scope=\"col\">".$heure."h</th>");
        for ($jour=$this->lundi;$jour<$this->dimanche;$jour++) {
            echo("<td>");
            // $creneau = new Datetime($this->an."-".$this->mois."-".$jour);
            foreach ($this->allResa as $objects) {
                foreach ($objects as $propertyName => $property) {
                    if ($propertyName=='id') {
                        // echo ('<td>');
                        $datetime = explode(" ", $property);
                        var_dump($datetime);
                        // echo ('</td>');
                        // if ($datetime[0] == $creneau->format('YY'."-".'mm'."-".'dd')) {
                        //     echo $datetime[0];
                        echo('</td>');
                        // }
                    } else {
                        // echo ('<td>');
                        echo('<a href="http://');
                        echo PATH;
                        echo("/ControllerAgenda/formResaView/");
                        echo $creneau;
                        // echo $this->setCreneau($creneau);
                        echo('">reserver ce créneau</a>');
                        echo('</td>');
                    }
                }
            }
        }
        // echo('<a href="http://');
        // echo PATH;
        // echo("/ControllerAgenda/formResaView/");
        // echo $creneau;
        // // echo $this->setCreneau($creneau);
        // echo('">reserver ce créneau</a>');
        // echo('</td>');
        echo ('</tr>');
    }
            // echo('<a href="http://');
            // echo PATH;
            // echo("/ControllerAgenda/formResaView/");
            // echo $creneau;
            // // echo $this->setCreneau($creneau);
            // echo('">reserver ce créneau</a>';
            // echo("</td>");
?>
</table>