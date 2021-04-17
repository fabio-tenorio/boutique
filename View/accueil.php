<?php
/*
Page accueil qui présente le site, la boutique... accessible à tous
Personnaliser en fonction du user le menu sur le header
Sections qui permet de récupèrer les derniers articles, afficher le rdv, liens derniers messages...
*/

Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;
$listeProduits = $this->produits->allProduits();
?>

<div class="main-accueil">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 img-slide" src="<?php echo IMAGES; ?>lissage.jpeg" alt="First slide">
            <div class="carousel-caption text-slide-white d-none d-md-block">
                <h2>Votre salon en ligne</h2>
                <h3>bienvenue sur notre site!</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 img-slide" src="<?php echo IMAGES; ?>soinfetemeres.webp" alt="Second slide">
            <div class="carousel-caption text-slide-blue d-none d-md-block">
                <h2>Idée cadeau Fête des Mères</h2>
                <h3>N'hésitez pas à lui offrir un soin du corps dans notre institut</h3>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-caption text-slide-blue d-none d-md-block">
                <h2>Manucure et pédicure</h2>
                <h3>Découvrez nos nouvelles prestations</h3>
            </div>
            <img class="d-block w-100 img-slide" src="<?php echo IMAGES; ?>manucure.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>
<section id="section_prestations">
    <h2 class="h2 section_title">nos prestations</h2>
    <div class="container my-5">
        <div class="row">
            <?php foreach($listeProduits as $produit) {
            if ($produit->id_categorie == 1 || $produit->id_categorie == 10) {?>
            <div class="col-sm-3 mx-3">
                <div class="card produit-box" style="width: 18rem;">
                    <img class="card-img-top produit-img" src="<?=IMAGES;?><?=$produit->imageproduit;?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$produit->titreproduit;?></h5>
                        <p class="card-text"><?=$produit->produit?></p>
                        <a href="http://<?php echo PATH;?>/ControllerAgenda/index" class="btn btn-primary">prendre un RDV</a>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        </div>
    </div>
</section>
    
<section id="section_produits">
    <h2 class="h2 section_title">Nos produits</h2>
    <div class="container">
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
</section>
</html>
