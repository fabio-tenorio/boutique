<?php

/*
Depuis panier, lien vers valider commande ou prévoir un onglet saisir commande
NE PAS OUBLIER DE RÉCUPÉRER LES INFOS D'UN PANIER ET LA POSSIBILITÉ DE MODIFIER UN PANIER DANS COMMANDE
*/
// var_dump($_SESSION);
require_once('../vendor/stripe/stripe-php/init.php');
// $stripe = new \Stripe\StripeClient('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
$customer = $stripe->customers->create([
    'description' => 'example customer',
    'email' => 'email@example.com',
    'payment_method' => 'pm_card_visa',
]);
echo $customer;
?>

<div class="container">
    <h2 class="text-center my-5">Commande</h2>
    <div class="row">
        <div class="col-sm-8 my-2">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" placeholder="votre prénom" required>
                </div>
                <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="votre nom" required>
                </div>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" placeholder="Numéro de voie et nom de la rue" required>
            </div>
            <div class="form-group">
                <label for="complement"></label>
                <input type="text" class="form-control" id="complement" placeholder="Bâtiment, appartement, lot, etc. (facultatif)">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" required>
                </div>
                <div class="form-group col-md-4">
                <label for="departement">Département</label>
                <select id="departement" class="form-control" required>
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="codepostal">Code postal</label>
                <input type="text" class="form-control" id="codepostal" required>
            </div>
            <div class="form-group">
                <label for="telephone">telephone</label>
                <input type="text" class="form-control" id="telephone">
            </div>
            <div class="form-group">
                <label for="commentaire">Note de commande (facultatif)</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
            </div>
            </form>
        </div>
        <div class="col my-2 commande">
            <form action='#' method="POST">
                <table class="table">
                    <thead class="thead-light">Votre commande</thead>
                    <tr>
                        <th>Produit</th>
                        <th>Sous-total</th>
                    </tr>
                    <?php foreach($_SESSION['panier'] as $produit) { ?>
                    <tr>
                        <td><?=$produit->titreproduit?><span> x <?=$produit->quantite?></span></td>
                        <td><?=$this->panierTotal[$produit->id];?> &#8364;</td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>total (sans TVA)</td>
                        <td><?=$this->total?> &#8364;</td>
                    </tr>
                    <!-- <tr>
                        <td>total (avec TVA)</td>
                        <td>&#8364; prix total</td>
                    </tr> -->
                </table>
                <!-- striper -->
                <button class="btn btn-primary col-sm-12 m-auto" type="submit" name="commander">commander</button>
            </form>
        </div>
    </div>
</div>