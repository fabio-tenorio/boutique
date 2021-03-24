<!-- Formulaire de saisie d'une réservation en filtrant ou non un intervenant -->

<h2 class="text-white">reservez votre soin</h2>
<h3 class="text-white">pour le
<?php
$creneau = explode(" ", $this->creneau);
$dateCreneau = explode("-", $creneau[0]);
echo $dateCreneau[2].'/'.$dateCreneau[1].'/'.$dateCreneau[0];
?>
</h3>
<form class="form" method="POST" action="http://<?php echo PATH;?>/ControllerAgenda/reserverCreneau/<?=$this->creneau?>">
    <select class="custom-select" name="titrereservation" aria-label="Default select example" required>
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
    <div class="form-group">
        <label class="text-white" for="heuredebut">l'horaire du RDV</label>
        <input class="form-control" type="time" name="heuredebut" value="<?=$creneau[1]?>" inactive/>
    </div>
    <input class="btn btn-primary" type="submit" name="reserver" value="reserver" />
</form>