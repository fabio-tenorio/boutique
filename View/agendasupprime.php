<div class="container row agenda-supprime-box">
    <div class="col">
        <h2 class="text-center my-2">Vous êtes sûr de vouloir annuler ce rendez-vous?</h2>
        <div>
            <?php
            echo '<h3 class="text-center">'.$this->creneau->titrereservation.'</h3>';
            $creneau = explode(" ", $this->creneau->datedebut);
            $dateCreneau = explode ("-", $creneau[0]);
            $dateCreneau = $dateCreneau[2].'/'.$dateCreneau[1].'/'.$dateCreneau[0];
            echo '<p class="text-center"> le '.$dateCreneau.'</p>';
            echo '<p class="text-center">à '.$creneau[1].'</p>';
            ?>
        </div>
        <div class="row buttons-agenda-supprime">
            <a class="col btn btn-danger col-6 mx-2" href="http://<?php echo PATH;?>/ControllerAgenda/supprimer_reservation/<?= $this->creneau->id ?>">oui</a>
            <a class="col btn btn-warning col mx-2" href="http://<?php echo PATH;?>/ControllerAgenda/index">non</a>
        </div>
    </div>
</div>