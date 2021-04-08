<?php

/*
Depuis panier, lien vers valider commande ou prévoir un onglet saisir commande
NE PAS OUBLIER DE RÉCUPÉRER LES INFOS D'UN PANIER ET LA POSSIBILITÉ DE MODIFIER UN PANIER DANS COMMANDE
*/
?>

<div class="container">
    <h2 class="text-center my-5">Commande</h2>
    <div class="row">
        <div class="col-sm-8 my-2">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" placeholder="votre prénom">
                </div>
                <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" placeholder="votre nom">
                </div>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" placeholder="Numéro de voie et nom de la rue">
            </div>
            <div class="form-group">
                <label for="complement"></label>
                <input type="text" class="form-control" id="complement" placeholder="Bâtiment, appartement, lot, etc. (facultatif)">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville">
                </div>
                <div class="form-group col-md-4">
                <label for="departement">Département</label>
                <select id="departement" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="codepostal">Code postal</label>
                <input type="text" class="form-control" id="codepostal">
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
            <table class="table">
                <thead class="thead-light">Votre commande</thead>
                <tr>
                    <th>Produit</th>
                    <th>Sous-total</th>
                </tr>
                <tr>
                    <td>nom du produit<span> x 1</span></td>
                    <td>&#8364; prix du produit</td>
                </tr>
                <tr>
                    <td>total (sans TVA)</td>
                    <td>&#8364; prix total</td>
                </tr>
                <tr>
                    <td>total (avec TVA)</td>
                    <td>&#8364; prix total</td>
                </tr>
            </table>
            <!-- striper -->
            <button class="btn btn-primary col-sm-12 m-auto" type="submit" name="commander">commander</button>
        </div>
    </div>
</div>