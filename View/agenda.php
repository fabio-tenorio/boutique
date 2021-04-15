<?php
/*
Affiche un agenda hebdomadaire sur le mois courant. En cliquant sur un jour, on visualise les créneaux disponibles
En cliquant sur le jour, renvoi vers page agenda journée
*/
$maintenant = $this->setMaintenant();
if (!isset($this->autreSemaine)) {
    $lundi = $this->setLundi($maintenant);
} else {
    $lundi = $this->lundi;
}
$dimanche = $this->setDimanche($lundi);
$joursDeLaSemaine = $this->setJoursDeLaSemaine($lundi);
$creneaux = $this->setCreneaux($joursDeLaSemaine);
?>

<h2 class="my-4 text-dark text-center">Planning</h2>
<div class="agenda-pages my-2">
<?php echo '<a href="http://'.PATH.'/ControllerAgenda/semaineEnMoins/'.$this->lundi->format('d-m-Y H:00:00').'">';?>
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
    </a>
    <h3 class="text-dark">
        <?php
        echo 'du lundi '.$lundi->format('d/m').' au dimanche '.$dimanche->format('d/m');
        ?>
    </h3>
    <?php echo '<a href="http://'.PATH.'/ControllerAgenda/semaineEnPlus/'.$this->lundi->format('d-m-Y H:00:00').'">';?>
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
    </a>
</div>
<?php if ($this->message!='') {
    if ($this->message==='réservation réussie') {
        echo '<span class="btn btn-primary">'.$this->message.'</span>'; 
    } else {
        echo '<span class="btn btn-danger">'.$this->message.'</span>';}; 
    }
    ?>
        <div class="row-creneau">
        <?php
            foreach ($creneaux as $key=>$value) {
                echo '<ul>';

                $day=date('D', strtotime($key));
                $dayNumber = date('d/m', strtotime($key));
                switch ($day) {
                    case 'Mon':
                        $day = "lundi";
                    break;
                    case 'Tue':
                        $day = "mardi";
                    break;
                    case 'Wed':
                        $day = "mercredi";
                    break;
                    case 'Thu':
                        $day = "jeudi";
                    break;
                    case 'Fri':
                        $day = "vendredi";
                    break;
                    case 'Sat':
                        $day = "samedi";
                    break;
                    case 'Sun':
                        $day = "dimanche";
                    break;
                }

                echo '<li class="jour-creneau text-center">'.$day.'<p>'.$dayNumber.'</p></li>';
                foreach ($value as $horaires) {
                    $datetime = str_replace('/', '-', $horaires);
                    $datetime = date('Y-m-d H:00:00', strtotime($datetime));
                    $creneauVide = true;
                    foreach ($this->allResa as $objects) {
                        foreach ($objects as $propertyName => $property) {
                            if ($propertyName == 'datedebut') {
                                if ($property == $datetime) {
                                    $heure = explode(' ', $horaires);
                                    $heureAffichee = explode (':', $heure[1]);
                                    $heureAffichee = $heureAffichee[0].'h';
                                    echo '<li class="heure-creneau creneau-rempli text-center">';
                                    echo $heureAffichee.'<br>';
                                    if ($objects->id_utilisateur===$_SESSION['user']->id) {
                                        echo '<span>'.$objects->titrereservation.'</span><br>';
                                        echo('<a class="mx-2 btn btn-danger" href="http://');
                                        echo PATH;
                                        echo("/ControllerAgenda/SupprimeResaView/");
                                        echo $objects->id;
                                        echo('">annuler</a>');
                                    }
                                    echo '</li>';
                                    $creneauVide = false;
                                }
                            }
                            echo '</li>';
                        }
                    }
                    if ($creneauVide === true) {
                        $heure = explode(' ', $horaires);
                        echo '<li class="heure-creneau creneau-vide text-center">';
                        $heureAffichee = explode (':', $heure[1]);
                        $heureAffichee = $heureAffichee[0].'h';
                        echo '<a href="http://'.PATH.'/ControllerAgenda/formResaView/'.$heure[0].'/'.$heure[1].'">'.$heureAffichee.'</a></li>';
                    }
                }
                echo '</ul>';
            }
        ?>
        </div>
    <table class="agenda table table-bordered table-hover table-light my-4 mx-3">
        <thead class="thead-dark">
            <tr>
            <th></th>
            <?php
            if (isset($_POST['titrereservation'])) {
                $joursenlettres = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
                for ($i=0;$i<count($joursenlettres);$i++) {
                    echo '<th class="text-center" scope="col">';
                    echo '<div><p class="creneau-jours">'.$joursenlettres[$i].'</p>';
                    echo '<p class="creneau-jours">'.$joursDeLaSemaine[$i].'</p></div>';
                    echo '</th>';
                } ?>
            </tr>
        </thead>
        <?php
        $heure = 8;
                for ($horaires = 0; $horaires < 12; $horaires++) {
                    echo'<tr>';
                    echo'<th class="agenda-heure" scope="row">'.$heure.'h</th>';
                    foreach ($creneaux as $ligne) {
                        $creneauVide = true;
                        foreach ($this->allResa as $objects) {
                            foreach ($objects as $propertyName => $property) {
                                if ($propertyName == 'datedebut') {
                                    if ($property == $ligne[$horaires]) {
                                        echo'<td class="text-center td-creneau-rempli>';
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
                        if ($creneauVide === true) { ?>
                    <td class="text-center td-creneau-vide">
                        <?php
                        $ligne[$horaires] = explode(' ', $ligne[$horaires]);
                        ?>
                        <a href="<?php echo PATH;?>/ControllerAgenda/formResaView?<?= $ligne[$horaires][0].'/'.$ligne[$horaires][1];?>"><?=$ligne[$horaires][1]?></a>
                <?php }
                        echo'</td>';
                    }
                    $heure++;
                    echo '</tr>';
                }
            }
        ?>
    </table>
</div>