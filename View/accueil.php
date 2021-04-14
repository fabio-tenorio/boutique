<?php
/*
Page accueil qui présente le site, la boutique... accessible à tous
Personnaliser en fonction du user le menu sur le header
Sections qui permet de récupèrer les derniers articles, afficher le rdv, liens derniers messages...
*/

Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;
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
                <h3>Découvrez nos nouvelles prestations</h3>
            </div>
        </div>
        <div class="carousel-item">
        <img class="d-block w-100 img-slide" src="<?php echo IMAGES; ?>soinfetemeres.webp" alt="Second slide">
        </div>
        <div class="carousel-item">
            <div class="carousel-caption text-slide-blue d-none d-md-block">
                <h2>Votre salon en ligne</h2>
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
        <div class="row">
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top produit-img" src="<?php echo IMAGES; ?>prestation1.jpeg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Beauté des mains</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="http://<?= PATH;?>/ControllerProduits/produitfiche" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top produit-img" src="<?php echo IMAGES; ?>prestation2.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Beauté des pieds</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top produit-img" src="<?php echo IMAGES; ?>prestation3.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis semi-permanent ou classique</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top produit-img" src="<?php echo IMAGES; ?>prestation4.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Massage des pieds</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section2">
        <h2 class="h2 section_title">Nos produits</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary col-12 mx-auto">détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</html>
