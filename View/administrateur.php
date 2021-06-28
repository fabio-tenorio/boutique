<?php
/*
Déterminer l'ensemble des views de l'adminsitrateur
Permet l'accès à un page administration sur la page accueil
Permet l'accès aux pages admin et donc aux fonctions admin (supprimer un user, supprimer un message, mofifier des droits, )
Création du discussion sur blog
Nouvel article dans boutique
*/
if ($this->message !== '') {
    echo '<p class="btn btn-warning text-center">'.$this->message.'</p>';
}
?>

<div class="container">
    <h2 class="text-center my-4">Salut <?= $_SESSION['user']->login?>!</h2>
    <div class="row my-5">
        <div class="col border bg-primary text-white admin-carre mx-3 p-5">
            <h2 class="text-center">Valeur des commandes</h2>
            <div class="row">
                <div class="col-6 border">
                    <h2 class="text-center"><?=$this->moisPrecedent;?> &#8364;</h3>
                    <p class="text-center">le total du mois précédent</p>
                </div>
                <div class="col-6 border">
                    <h2 class="text-center"><?=$this->moisEnCours;?> &#8364;</h3>
                    <p class="text-center">le total du mois en cours</p>
                </div>
            </div>
        </div>
        <div class="col border admin-carre bg-warning mx-3">
            <h2 class="text-center admin-chiffre"><?=$this->valeurStock;?> &#8364;</h2>
            <p>C'est la valeur totale des produits dans votre stock actuellement</p>
        </div>
        <div class="col border bg-info text-white admin-carre mx-3">
            <h2 class="text-center admin-chiffre"><?=$this->stock;?></h2>
            <p>C'est la quantité totale de produits en stock actuellement</p>
        </div>
    </div>
    <div class="row my-5">
        <div class="col border bg-dark mx-3 py-5">
            <h2 class="text-center text-light">Liste des utilisateurs</h2>
            <form action="http://<?php echo PATH; ?>/ControllerAdmin/supprimerUtilisateur" method='POST'>
            <table class="table table-striped table-light table-hover">
                <tr>
                    <th></th>
                    <th>prénom</th>
                    <th>nom</th>
                    <th>login</th>
                    <th>email</th>
                    <th>tél</th>
                    <th>status</th>
                </tr>
            <?php
                foreach($this->data['allusers'] as $user) {
                    echo '<tr>';
                    // echo '<li class="list-group-item product-list">';
                    echo '<td><input type="checkbox" value="'.$user->id.'" name="'.$user->id.'"></td>';
                    echo '<td>'.$user->prenom.'</td>';
                    echo '<td>'.$user->nom.'</td>';
                    echo '<td>'.$user->login.'</td>';
                    echo '<td class="mx-2">'.$user->mail.'</td>';
                    echo '<td class="mx-2">'.$user->telephone.'</td>';
                    switch($user->id_droit) {
                        case 1:
                            echo '<td class="mx-2">membre</td>';
                            break;
                        case 10:
                            echo '<td class="mx-2">client</td>';
                            break;
                        case 200:
                            echo '<td class="mx-2">admin</td>';
                            break;
                    }
                    echo '</tr>';
                }
            ?>
            </table>
        <!-- select all dans login, nom, prenom, mail, date de naissance, date d'inscription sur le site
            à côté de chaque utilisateur, il y aura un bouton qui bascule vers la page profil-->
                <button type="submit" name="supprimerUtilisateur" class="btn btn-danger col-sm-12 mx-auto my-4">supprimer des utilisateurs</button>
            </form>
            <form action="http://<?php echo PATH; ?>/ControllerAdmin/change_droit" method='POST'>
                <select name="id" class="form-select" aria-label="utilisateur">
                    <option selected>selectionnez un utilisateur</option>
                    <?php foreach ($this->data['allusers'] as $user) {
                        echo '<option value='.$user->id.'>'.$user->login.'</option>';
                    };?>
                </select>
                <select name="id_droit" class="form-select" aria-label="id_droit">
                    <option selected>selectionnez son niveau d'accès au site</option>
                    <?php
                    foreach ($this->droit as $droit) {
                        echo '<option value='.$droit->id.'>'.$droit->nom.'</option>';
                    };?>
                </select>
                <button type="submit" class="btn btn-warning">valider</button>
            </form>
        </div>
        <div class="col border bg-light mx-3">
            <h2 class="text-center">Liste des produits</h2>
                <form action="http://<?php echo PATH; ?>/ControllerAdmin/supprimerProduit" method='POST'>
                <table class="table table-light table-hover">
                    <tr>
                        <th></th>
                        <th>nom</th>
                        <th>prix</th>
                        <th>quantité</th>
                        <th>date</th>
                    </tr>
                <?php
                foreach($this->data['products'] as $product) {
                    // echo '<li class="list-group-item product-list">';
                    echo '<tr>';
                    echo '<td><input type="checkbox" value="'.$product->id.'" name="'.$product->id.'"></td>';
                    echo '<td class="mx-2">'.$product->titreproduit.'</td>';
                    echo '<td class="mx-2">'.$product->prix.' &#8364;</td>';
                    echo '<td class="mx-2 badge badge-primary badge-pill">'.$product->stock.'</td>';
                    $date = explode (' ', $product->dateproduit);
                    echo '<td class="mx-2">'.$date[0].'</td>';
                    echo '</tr>';
                    }
                    ?>
                </table>
                <button class="btn btn-danger col-sm-12 mx-auto my-3" type="submit" name="supprimerProduit">supprimer le(s) produit(s)</button>
                </form>
            </ul>
        <!-- select all produits: nom, reference, prix, catégorie, fournisseur
        en bas de la liste, un petit form pour l'ajout d'un nouveau produit-->
        </div>
    </div>
    <div class="row my-5">
        <div class="col border mx-2">
            <h4 class="text-center">Nouveau produit</h4>
            <form enctype="multipart/form-data" action="http://<?php echo PATH; ?>/ControllerAdmin/nouveauProduit" method="POST">
                <div class="input-group my-2">
                    <span class="input-group-text" for="reference">Réference du produit</span>
                    <input class="form-control" type="text" id="reference" name="reference" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text" for="titreproduit">Le nom du produit</span>
                    <input class="form-control" type="text" id="titreproduit" name="titreproduit" required>
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text" for="produit">Description du produit</span>
                    <input class="form-control" type="text" id="produit" name="produit" required>
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text" for="stock">Quantité en stock</span>
                    <input class="form-control" type="number" id="stock" name="stock" required>
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text" for="prix">Prix du produit</span>
                    <input class="form-control" type="text" id="prix" name="prix" required>
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text" for="imageproduit">Image du produit</span>
                    <input class="form-control" type="file" id="imageproduit" name="imageproduit">
                </div>
                <div class="form-group">
                    <select class="form-select col-12 form-select-lg" id="id_categorie" name="id_categorie" aria-label="Default select example">
                        <option selected>la catégorie du produit</option>
                        <?php
                        foreach ($this->categories as $categorie) {
                            echo '<option value="';
                            echo $categorie->id; //l'id_catégorie
                            echo '">';
                            echo $categorie->titrecategorie; //le nom de la catégorie
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary col-12 mx-auto">ajouter le produit</button>
            </form>
        </div>
        <div class="col border mx-2">
            <h4 class="text-center">Nouveau fournisseur</h4>
            <div class="container">
                <form action="#" method="post">
                    <div class="input-group my-2">
                        <span class="input-group-text">nom</span>
                        <input class="form-control" type="text" id="nomfournisseur" name="nomfournisseur">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text">code postal</span>
                        <input class="form-control" type="text" id="codepostal" name="codepostal">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text">statut</span>
                        <select class="statut" name="statut" aria-label="statut" required>
                            <option value="" selected>statut</option>
                            <option value="nouveau">nouveau</option>
                            <option value="actif">actif</option>
                            <option value="inactif">inactif</option>
                            <option value="premium">premium</option>
                        </select>
                        <input class="form-control" type="text" id="nomfournisseur" name="nomfournisseur">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 mx-auto">ajouter nouveau fournisseur</button>
                </form>
            </div>
        </div>
        <div class="col border mx-2">
            <h4 class="text-center">Nouvelle catégorie produit</h4>
            <div class="container">
                <form action="http://<?php echo PATH; ?>/ControllerAdmin/nouvelleCategorie" method="POST">
                    <div class="input-group my-2">
                        <span class="input-group-text">nouvelle catégorie</span>
                        <input class="form-control" type="text" id="titrecategorie" name="titrecategorie">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 mx-auto">ajouter nouvelle catégorie</button>
                </form>
            </div>
        </div>
    </div>
</div>