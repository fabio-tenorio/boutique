<?php
$listeProduits = $this->allProduits();
?>

<div class="container">
    <!-- <div class="row"> -->
        <div class="col-xs-12 col-md-12"> 
        <?php foreach ($listeProduits as $produit) {
            if ($produit->id_categorie !=1 and $produit->id_categorie !=10) { ?>
        <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="product-image">
                        <img src="<?=IMAGES;?><?=$produit->imageproduit;?>" alt="Card image cap" class="card-img-top img-responsive">
                        <!-- <span class="tag2 hot">
                        PROMO
                        </span> -->
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-deatil">
                        <h5 class="name">
                            <a href="#">
                                <?=$produit->titreproduit;?>
                            </a>
                            <a href="#">
                                <span>Product Category</span>
                            </a>                           
                        </h5>
                        <p class="price-container">
                            <span><?=$produit->prix;?> &#8364;</span>
                        </p>
                        <span class="tag1"></span>
                    </div>
                    <div class="description">
                        <p><?=$produit->produit;?></p>
                    </div> 
                    <div class="product-info smart-form">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="http://<?php echo PATH; ?>/ControllerProduits/ajouterAuPanier/<?php echo $produit->id;?>" class="btn btn-danger">ajouter au panier</a>
                            <a href="http://<?php echo PATH; ?>/ControllerProduits/produitfiche/<?php echo $produit->id;?>" class="btn btn-info">détails</a>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="rating">Rating:
                                <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                                <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                            </div>
                        </div>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php }
  } ?> 
</div>
</div>
</div>

