<!-- Formulaire de saisie d'une réservation en filtrant ou non un intervenant -->
<div class="container m-5 form-reservation">
    <div class="col">
        <h2 class="text-dark text-center">on vous attend</h2>
        <h3 class="text-center">le 
            <span class="text-muted">
            <?php
            $data = explode ('/', $_GET['p']);
            // var_dump($data);
            echo $data[2].'/'.$data[3].'/'.$data[4];
            ?>
            </span>
        </h3>
        <h4 class="text-center">à 
            <?php
            $heure = explode (':', $data[5]);
            echo $heure[0].' heures';
            ?>
        </h4>
    </div>
    <div class="col">
        <form class="form" method="POST" action="http://<?php echo PATH;?>/ControllerAgenda/reserverCreneau/<?=$this->creneau?>">
            <h5 class="text-center">Selectionnez le service</h5>
            <select class="creneau-jours custom-select" name="titrereservation" aria-label="Default select example" required>
                <option value="" selected>nos prestations</option>
                <option value="soin complet">Soin complet - 40 &#8364;</option>
                <option value="soin des mains">Soin des mains - 15 &#8364;</option>
                <option value="soin des pieds">Soin des pieds - 15 &#8364;</option>
                <option value="pose d'ongles">Pose d'ongles - 13 &#8364;</option>
                <option value="maquillage">Maquillage - 20 &#8364;</option>
                <option value="fete des meres">Fete des meres - 30 &#8364;</option>
                <option value="nouvelle annee">Nouvelle annee - 30 &#8364;</option>
                <option value="soin ete">Soin ete - 20 &#8364;</option>
                <option value="soin rentree">Soin rentree - 15 &#8364;</option>
            </select>
            <input class="btn btn-primary creneau-jours col-12 auto my-3" type="submit" name="reserver" value="reserver"/>    
        </form>
    </div>
</div>