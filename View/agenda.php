<?php
/*
Affiche un agenda hebdomadaire sur le mois courant. En cliquant sur un jour, on visualise les créneaux disponibles
En cliquant sur le jour, renvoi vers page agenda journée
*/
$maintenant = $this->setMaintenant();
$lundi = $this->setLundi($maintenant);
$dimanche = $this->setDimanche($lundi);
$joursDeLaSemaine = $this->setJoursDeLaSemaine($lundi);
$creneaux = $this->setCreneaux($joursDeLaSemaine);
// $this->bonne_affichage($creneaux);
?>

<h2 class="my-4 text-dark text-center">Planning</h2>
<div class="agenda-pages my-2">
    <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
    </a>
    <h3 class="text-dark">
        <?php
        if ($maintenant->format('H')<15) {
            echo 'bonjour '.$_SESSION['user']->login.'!';
        } else {
            echo 'bonsoir '.$_SESSION['user']->login.'!';
        }
        echo $maintenant->format('m')."/".$maintenant->format('Y');?>
    </h3>
    <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
    </a>
</div>
<?php if ($this->message!='') {
    echo '<span class="btn btn-danger">'.$this->message.'</span>';}; ?>
<div>
    <table class="agenda table table-bordered table-hover table-light my-4 mx-3">
        <thead class="thead-dark">
            <tr>
            <th></th>
            <?php
            $joursenlettres = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
            for ($i=0;$i<count($joursenlettres);$i++)
            {
                echo '<th class="creneau-jours text-center" scope="col">';
                echo '<div><p>'.$joursenlettres[$i].'</p>';
                echo '<p>'.$joursDeLaSemaine[$i].'</p></div>';
                echo '</th>';
            }
            ?>
            </tr>
        </thead>
        <?php
        $heure = 8;
        for ($horaires = 0; $horaires < 12; $horaires++) {
            echo'<tr>';
            echo'<th class="agenda-heure" scope="row">'.$heure.'h</th>';
            foreach ($creneaux as $ligne) {
                echo'<td>';
                $creneauVide = true;
                foreach ($this->allResa as $objects) {
                    foreach ($objects as $propertyName => $property) {
                        if ($propertyName == 'datedebut') {
                            if ($property == $ligne[$horaires]) {
                                echo "<h4>".$objects->titrereservation."</h4>";
                                if ($objects->id_utilisateur===$_SESSION['user']->id) {
                                    echo('<a class="btn btn-warning col-12" href="http://');
                                    echo PATH;
                                    echo("/ControllerAgenda/SupprimeResaView/");
                                    echo $objects->id;
                                    echo('">annuler</a>');
                                }
                                $creneauVide = false;
                            }
                        }
                    }
                }
                if ($creneauVide === true) {
                    echo('<a href="http://');
                    echo PATH;
                    echo("/ControllerAgenda/formResaView/");
                    echo $ligne[$horaires];
                    echo('">reserver ce créneau</a>');
                }
                echo'</td>';
            }
            $heure++;
            echo '</tr>';
        }
        // }
                // foreach ($ligne as $colone) {
                //     echo '<td>';
                //     echo $colone;
                //     echo '</td>';
                // }
            // echo '</tr>';
            // }
            
            // for ($jour=0;$jour<7;$jour++)
            // {
            //     if ($heure==8 || $heure==9) {
            //         $dateformat = $this->an."-".$this->mois."-".$this->lundi->format('d')." 0".$heure.":00:00";
            //     } else {
            //         $dateformat = $this->an."-".$this->mois."-".$this->lundi->format('d')." ".$heure.":00:00";
            //     }
            //     $creneau = new \DateTime($dateformat);
            //     $interval = 'P'.$jour.'D';
            //     $creneau = $creneau->add(new \DateInterval($interval));
            //     $creneauVide = true;
            //     foreach ($this->allResa as $objects) {
            //         foreach ($objects as $propertyName => $property) {
            //             if ($propertyName=='datedebut') {
            //                 $property = explode (' ', $property);
            //                 $property[1] = explode (':', $property[1]);
            //                 if ($property[0]==$creneau->format('Y-m-d') && $property[1][0]==$creneau->format('h')) {
            //                     echo '<td class="text-center td-creneau-rempli">';
            //                     echo "<h4>".$objects->titrereservation."</h4>";
            //                     if ($objects->id_utilisateur===$_SESSION['user']->id) {
            //                         echo('<a class="btn btn-warning col-12" href="http://');
            //                         echo PATH;
            //                         echo("/ControllerAgenda/SupprimeResaView/");
            //                         echo $objects->id;
            //                         echo('">annuler</a>');
            //                     }
            //                     $creneauVide = false;
            //                 }
            //             }
            //         }
            //     }
            //     if ($creneauVide === true) {
            //         echo '<td class="text-center td-creneau-vide my-auto">';
            //         echo('<a href="http://');
            //         echo PATH;
            //         echo("/ControllerAgenda/formResaView/");
            //         echo $creneau->format('Y-m-d');
            //         echo '/';
            //         echo $creneau->format('H:00:00');
            //         echo('">reserver ce créneau</a>');
            //     }
            //     echo('</td>');
            // }
        //     echo('</tr>');
        // }
        ?>
    </table>