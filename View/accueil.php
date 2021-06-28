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
    <!-- <a class="formcontact" id="call_to_action_link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
        </svg>
        Nous contacter
    </a> -->
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
                <h2>Bienvenue sur notre site!</h2><br>
                <h3>Rejoignez notre communauté <a href='https://www.instagram.com/s.nails_salonrouge/'><img id="instagram" src="<?php echo IMAGES; ?>instagram.png"></a></h3>
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
                        <a href="http://<?php echo PATH;?>/ControllerAgenda/index" class="btn btn-primary col-12 mx-auto button-produit">prendre un RDV</a>
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
                        <div class="product-detail">
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
