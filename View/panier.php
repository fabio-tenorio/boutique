<?php
$listeproduits = $_SESSION['panier'];
$this->bonne_affichage($_POST);
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
                    <form action="http://<?php echo PATH; ?>/ControllerProduits/calculerSousTotal/" method="POST">
                        <?php foreach ($listeproduits as $produit) { ?>
                            <tr>
                            <th scope="row"><i class="bi bi-trash"></i></th>
                            <td><?=$produit->imageproduit;?></td>
                            <td><?=$produit->titreproduit;?></td>
                            <td>&#8364; <?=$produit->prix;?></td>
                            <td>
                                <input type="number" name="<?=$produit->id?>-quantite" value="1">
                            </td>
                            <td>
                                sous-total<!-- sous-total -->
                            </td>
                        </tr>
                        <?php } ?>
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
                    <td>total (sans TVA)</td>
                    <td>&#8364; 10000</td>
                </tr>
                <tr>
                    <td>total (avec TVA)</td>
                    <td>&#8364; 10000</td>
                </tr>
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