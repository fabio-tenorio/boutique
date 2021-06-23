<div class="container my-5">
    <div class="row">
            <?php foreach($this->searchResult as $product) { ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top produit-img" src="<?=IMAGES;?><?=$product->imageproduit;?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$product->titreproduit;?></h5>
                        <p class="card-text"><?=$product->produit;?></p>
                        <?php if ($product->id_categorie == 1 || $product->id_categorie == 10) { ?>
                        <a href="http://<?php echo PATH;?>/ControllerAgenda/index" class="btn btn-primary">prendre un RDV</a>    
                        <?php } else { ?>
                            <div class="col-md-12">
                                <a href="http://<?php echo PATH; ?>/ControllerProduits/ajouterAuPanier/<?php echo $produit->id;?>" class="btn btn-danger">ajouter au panier</a>
                                <a href="http://<?php echo PATH; ?>/ControllerProduits/produitfiche/<?php echo $produit->id;?>" class="btn btn-info">détails</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php }
            ?>
    </div>
</div>