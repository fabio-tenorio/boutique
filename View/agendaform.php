<!-- Formulaire de saisie d'une réservation en filtrant ou non un intervenant -->

<h2>reservez votre soin</h2>
<h3>le <?php
    end($_GET);
    $key = key($_GET);
    $date = explode('heures', $key);
    echo($date[1]);
    ?></h3>
<form class="form" method="POST" action="reservation-form.php">
    <select class="form-select" aria-label="Default select example">
        <option selected>Nos prestations</option>
        <option value="1">Soin complet</option>
        <option value="2">Soin des mains</option>
        <option value="3">Soin des pieds</option>
        <option value="4">Pose d'ongles</option>
        <option value="5">Maquillage</option>
        <option value="6">Fete des meres</option>
        <option value="8">Nouvelle annee</option>
        <option value="9">Soin ete</option>
        <option value="10">Soin rentree</option>

    </select>
    <!-- <div class="form-group">
        <label for="titre">titre</label>
        <input class="form-control" type="text" name="titre" placeholder="le titre de votre événement" required/>
    </div> -->
    <!-- <div class="form-group">
        <label for="datedebut">la date de début</label>
        <input class="form-control" type="date" name="datedebut" required/>
    </div> -->
    <div class="form-group">
        <label for="heuredebut">l'heure du RDV</label>
        <input class="form-control" type="time" name="heuredebut" value="<?=$date[0]?>:00" placeholder="<?=$date[0]?>" inactive/>
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