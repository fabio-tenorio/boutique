<?php
$listeproduits = $_SESSION['panier'];
?>
<div class="container">
    <h1 class="text-center">profil</h1>
    <!-- <p>Please fill in this form to create an account.</p> -->
    <hr>
<?php echo '<p class="text-center btn-btn-danger">'.$this->message.'</p>';?>
    <form id="form_profil" action="http://<?php echo PATH; ?>/ControllerUser/profil/" method="POST">
    <div class="row">
    <div class="col-sm">
        <label for="prenom">Prénom</label>
        <input type="text" placeholder="<?= $data->prenom ?>" name="prenom" id="prenom">
    </div>
    <div class="col-sm">
        <label for="prenom">Nom</label>
        <input type="text" placeholder="<?= $data->nom ?>" name="nom" id="nom">
    </div>
    <div class="col-sm">
        <label for="login">Login</label>
        <input type="text" placeholder="<?= $data->login ?>" name="login" id="login">
    </div>
    <div class="col-sm">
        <label for="mail">E-mail</label>
        <input type="text" placeholder="<?= $data->mail ?>" name="mail" id="mail">
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <label for="motpasse">Mot de passe</label>
        <input type="password" placeholder="votre mot de passe" name="motpasse" id="motpasse">
    </div>
    <div class="col-sm">
        <label for="confirmer_motpasse">Confirmation</label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="confirmer_motpasse" id="confirmer_motpasse">
    </div>
    <div class="col-sm">
        <label for="telephone">téléphone</label>
        <input type="tel" placeholder="<?= $data->telephone ?>" name="telephone" id="telephone">
    </div>
    <div class="col-sm">
        <label for="dateanniversaire">date de naissance</label>
        <input type="date" placeholder="" name="dateanniversaire" id="telephone">
    </div>
  </div>
</div>
<div class="row">
    <button type="submit" name="modifier" class="btn btn-warning my-3">Modifier</button>
    <button type="submit" name="supprimer" class="btn btn-danger my-3" value='true'>Supprimer</button>
</div>
</form>
<?php
if (isset($_POST['supprimer']) AND $_POST['supprimer']==true) 
{ ?>
    <form id="form_profil" action="http://<?php echo PATH; ?>/ControllerUser/del_user/" method="POST">
        <div class="container" id="form_profil_container">
            <button type="submit" name="confirmer" class="btn btn-primary">Confirmer</button> 
            <p>Souhaitez-vous confirmer la suppresion de votre compte?</p>
            <button type="submit" name="annuler" class="btn btn-primary">Annuler</button>
        <div class="container signin">
    </form>
<?php }
?>    
</section>
<div class="row my-5">
        <div class="col border bg-light mx-3 py-5">
            <h2 class="text-center text-dark">Votre panier</h2>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="http://<?php echo PATH;?>/ControllerProduits/panier/" method="POST">
                        <?php
                        foreach ($listeproduits as $produit) { ?>
                        <tr>
                            <td><img src="<?=IMAGES;?><?=$produit->imageproduit;?>" class="img-produit-panier"></td>
                            <td><?=$produit->titreproduit;?></td>
                            <td>&#8364; <?=$produit->prix;?></td>
                            <td>
                                <?=$produit->quantite;?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="col border bg-light mx-3">
            <h2 class="text-center">Votre historique d'achats</h2>
            <ul class="list-group list-group-flush">
                <?php
                foreach($this->historique as $commande) {
                    echo '<li>'.$commande->datecommande;
                    echo $commande->total;
                    echo '</li>';
                    }
                ?>
            </ul>
        <!-- select all produits: nom, reference, prix, catégorie, fournisseur
        en bas de la liste, un petit form pour l'ajout d'un nouveau produit-->
        </div>
    </div>
</div>

