<!-- Formulaire de saisie d'une réservation en filtrant ou non un intervenant -->

<h2>reservez votre soin</h2>
<h3>pour le <?php
    $_SESSION['datedebut'] = $this->creneau[1];
    echo $_SESSION['datedebut'];
    ?>
    </h3>
<form class="form" method="POST" action="http://<?php echo PATH;?>/ControllerAgenda/reserverCreneau">
    <select class="form-select" name="titrereservation" aria-label="Default select example">
        <option selected>Nos prestations</option>
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
    <!-- <div class="form-group">
        <label for="titre">titre</label>
        <input class="form-control" type="text" name="titre" placeholder="le titre de votre événement" required/>
    </div> -->
    <!-- <div class="form-group">
        <label for="datedebut">la date de début</label>
        <input class="form-control" type="date" name="datedebut" placeholder="" required/>
    </div> -->
    <div class="form-group">
        <label for="heuredebut">l'horaire du RDV</label>
        <input class="form-control" type="time" name="heuredebut" value="<?=$this->creneau[0]?>:00" placeholder="<?=$date[0]?>" inactive/>
    </div>
    <!-- <div class="form-group">
    <label for="datefin">la date de fin</label>
        <input class="form-control" type="date" name="datefin" required/>
    </div> -->
    <!-- <div class="form-group">
        <label for="heurefin">l'heure de fin</label>
        <input class="form-control" type="time" name="heurefin" required/>
    </div> -->
    <input class="btn btn-primary" type="submit" name="reserver" value="reserver" />
</form>