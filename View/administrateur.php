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
            <?php
                foreach($this->data['allusers'] as $user) {
                    echo '<li class="list-group-item product-list">';
                    echo '<input type="checkbox" value="'.$user->id.'" name="'.$user->id.'">';
                    echo '<span class="mx-2">'.$user->prenom.'</span>';
                    echo '<span class="mx-2">'.$user->nom.'</span>';
                    echo '<br>';
                    echo '<span class="mx-2">'.$user->login.'</span>';
                    echo '<span class="mx-2 badge badge-primary badge-pill">'.$user->id_droit.'</span>';
                    echo '<br>';
                    echo '<span class="mx-2">'.$user->mail.'</span>';
                    echo '<span class="mx-2">'.$user->telephone.'</span>';
                    echo '</li>';
                }
            ?>
        <!-- select all dans login, nom, prenom, mail, date de naissance, date d'inscription sur le site
            à côté de chaque utilisateur, il y aura un bouton qui bascule vers la page profil-->
                <button type="submit" name="supprimerUtilisateur" class="btn btn-danger col-sm-12 mx-auto my-4">supprimer des utilisateurs</button>
            </form>
        </div>
        <div class="col border bg-light mx-3">
            <h2 class="text-center">Liste des produits</h2>
            <ul class="list-group list-group-flush">
                <!-- <form action="#" method='POST'> -->
                <form action="http://<?php echo PATH; ?>/ControllerAdmin/supprimerProduit" method='POST'>
                <?php
                foreach($this->data['products'] as $product) {
                    echo '<li class="list-group-item product-list">';
                    echo '<input type="checkbox" value="'.$product->id.'" name="'.$product->id.'">';
                    echo '<span class="mx-2">'.$product->titreproduit.'</span>';
                    echo '<span class="mx-2">'.$product->prix.' &#8364;</span>';
                    echo '<span class="mx-2 badge badge-primary badge-pill">'.$product->stock.'</span>';
                    $date = explode (' ', $product->dateproduit);
                    echo '<span class="mx-2">'.$date[0].'</span>';
                    echo '</li>';
                    }
                    ?>
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
            <form action="http://<?php echo PATH; ?>/ControllerAdmin/nouveauProduit" method="POST">
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
                        <!-- <option value="#">soins internes</option>
                        <option value="#">soins externes</option>
                        <option value="#">produit de soin</option>
                        <option value="#">produit de beauté</option>
                        <option value="#">fantaise</option>
                        <option value="#">matériel</option> -->
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
                <form action="#" method="post">
                    <div class="input-group my-2">
                        <span class="input-group-text">nouvelle catégorie</span>
                        <input class="form-control" type="text" id="categorie" name="categorie">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 mx-auto">ajouter nouvelle catégorie</button>
                </form>
            </div>
        </div>
    </div>
</div>