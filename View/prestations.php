<?php
$listeProduits = $this->allProduits();
?>
<div class="container my-5">
    <div class="row">
    <?php foreach($listeProduits as $produit) {
    if ($produit->id_categorie == 1 || $produit->id_categorie == 10) {?>
    <div class="card col-3 mx-auto px-0" style="width: 18rem;">
        <img class="card-img-top prestation-img" src="<?=IMAGES;?><?=$produit->imageproduit;?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?=$produit->titreproduit;?></h5>
            <p class="card-text"><?=$produit->produit?></p>
            <a href="http://<?php echo PATH;?>/ControllerAgenda/index" class="btn btn-primary">prendre un RDV</a>
        </div>
    </div>
    <?php }
    } ?>
    </div>
</div>
