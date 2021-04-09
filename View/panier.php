<?php
if (isset($_SESSION['panier'])) {
    $listeproduits = $_SESSION['panier'];
    // var_dump($listeproduits);
};
// $this->bonne_affichage($this->panierTotal);
// $this->bonne_affichage($this->produitTotal);
// var_dump($_POST);
?>
<div class="container">
    <div class="row table-panier">
        <div class="col-sm-12 my-5">
            <h2 class="text-center my-3">Mon panier</h2>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="http://<?php echo PATH;?>/ControllerProduits/calculerTotal/" method="POST">
                        <?php
                        if (isset($_SESSION['panier'])) {
                            foreach ($listeproduits as $produit) { ?>
                        <tr>
                            <th scope="row"><a href="http://<?php echo PATH;?>/ControllerProduits/supprimerDuPanier/<?=$produit->id;?>"><i class="bi bi-trash"></i></a></th>
                            <td><?=$produit->imageproduit;?></td>
                            <td><?=$produit->titreproduit;?></td>
                            <td>&#8364; <?=$produit->prix;?></td>
                            <td>
                                <input type="number" name="<?=$produit->id;?>" value="<?=$produit->quantite;?>">
                            </td>
                            <td>
                                <?php foreach ($this->panierTotal as $id => $sousTotal) {
                                    if ($produit->id == $id) {
                                        echo $sousTotal.' &#8364;';
                                    }
                                } ?>
                            </td>
                        </tr>
                        <?php }
                            } ?>
                        <tr>
                            <td colspan="6"><button type="submit" name="updatepanier" class="btn btn-warning float-right">Mettre à jour le panier</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6 my-5 table-total">
            <table class="table">
                <thead class="thead-light">
                Total
                </thead>
                <tr>
                    <!-- variable $this->panierTotal -->
                    <td>total (sans TVA)</td>
                    <td><?= $this->total.' &#8364';?></td>
                </tr>
                <!-- <tr>
                    <td>total (TVA incluse)</td>
                    <td>&#8364; 10000</td>
                </tr> -->
                <tr>
                    <td colspan="2">
                        <form action="http://<?php echo PATH;?>/ControllerProduits/commande" method="POST">
                            <button class="btn btn-primary col-sm-12 m-auto" type="submit" name="commander">valider la commande</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>