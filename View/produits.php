<?php
// var_dump($_POST);
$listeProduits = $this->allProduits();
// $this->bonne_affichage($listeProduits);
?>
<div class="container">
    <!-- <div class="row"> -->
        <div class="col-xs-12 col-md-12"> 
        <?php foreach ($listeProduits as $value) { ?>
        <div class="prod-info-main prod-wrap clearfix">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="product-image">
                        <img src="<?=IMAGES;?><?=$value->imageproduit;?>" alt="Card image cap" class="card-img-top img-responsive">
                        <span class="tag2 hot">
                        PROMO
                        </span>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-deatil">
                        <h5 class="name">
                            <a href="#">
                                <?=$value->titreproduit;?>
                            </a>
                            <a href="#">
                                <span>Product Category</span>
                            </a>                           
                        </h5>
                        <p class="price-container">
                            <span><?=$value->prix;?></span>
                        </p>
                        <span class="tag1"></span>
                    </div>
                    <div class="description">
                        <p><?=$value->produit;?></p>
                    </div> 
                    <div class="product-info smart-form">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-danger">ajouter au panier</a>
                            <a href="javascript:void(0);" class="btn btn-info">détails</a>
                        </div>
                        <div class="col-md-12">
                            <div class="rating">Rating:
                                <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                                <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                                <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php } ?> 
</div>
</div>
<!-- </div> -->
</div>

<!-- <div class="row">
<?php foreach ($listeProduits as $value) { ?>
    <div class="col-sm-3 my-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?=IMAGES;?>palette.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$value->titreproduit;?></h5>
                <p class="card-text"><?=$value->produit;?></p>
                <a href="#" class="col btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
<?php } ?>
</div> -->


