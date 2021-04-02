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
        <form class="form" method="POST" action="http://<?php echo PATH;?>/ControllerAgenda/reserverCreneau/<?php ?>">
            <h5 class="text-center">Selectionnez le service</h5>
            <select class="custom-select my-4" name="titrereservation" aria-label="Default select example" required>
                <option value="" selected>Nos prestations</option>
                <option value="soin complet">Soin complet</option>
                <option value="soin des mains">Soin des mains</option>
                <option value="soin des pieds">Soin des pieds</option>
                <option value="pose d'ongles">Pose d'ongles</option>
                <option value="maquillage">Maquillage</option>
                <option value="fete des meres">Fete des meres</option>
                <option value="nouvelle annee">Nouvelle annee</option>
                <option value="soin ete">Soin ete</option>
                <option value="soin rentree">Soin rentree</option>
            </select>
            <input class="btn btn-primary col-12 auto" type="submit" name="reserver" value="reserver" />
        </form>
    </div>
</div>