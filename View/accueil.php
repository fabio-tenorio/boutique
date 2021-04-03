<?php
/*
Page accueil qui présente le site, la boutique... accessible à tous
Personnaliser en fonction du user le menu sur le header
Sections qui permet de récupèrer les derniers articles, afficher le rdv, liens derniers messages...
*/
Namespace App\View;
Use App\Application\Controller;
Use App\Application\Controllers\ControllerAccueil as ControllerAccueil;
// $ControllerAccueil = new $ControllerAccueil;
?>

<div id="main_accueil">
    <!-- <section class="carousel" aria-label="Gallery">
        <h2>votre sallon en ligne</h2>
        <ol class="carousel__viewport">
            <li id="carousel__slide1"
                tabindex="0"
                class="carousel__slide">
                <div class="carousel__snapper">
                    <div class="container mt-5 carousel__text__slide">
                        <h2 class="text-center">Semaine Fête des Mères</h2>
                        <h3 class="text-center">Laissez-vous tenter par une cure ou un soin dans notre centre</h3>
                        <p class="text-center">Du 24/05 au 04/06</p>
                    </div>
                    <a href="#carousel__slide4"
                    class="carousel__prev">Go to last slide</a>
                    <a href="#carousel__slide2"
                    class="carousel__next">Go to next slide</a>
                </div>
            </li>
            <li id="carousel__slide2"
                tabindex="0"
                class="carousel__slide">
            <div class="carousel__snapper">
            <div class="carousel__snapper">
                    <div class="container mt-5 carousel__text__slide">
                        <h2 class="text-center">Soins mains et pieds</h2>
                        <h3 class="text-center">Découvrez nos nouvelles prestations</h3>
                    </div>
                    <a href="#carousel__slide4"
                    class="carousel__prev">Go to last slide</a>
                    <a href="#carousel__slide2"
                    class="carousel__next">Go to next slide</a>
                </div>
            </div>
            <a href="#carousel__slide1"
                class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide3"
                class="carousel__next">Go to next slide</a>
            </li>
            <li id="carousel__slide3"
                tabindex="0"
                class="carousel__slide">
            <div class="carousel__snapper">
            <div class="carousel__snapper">
                    <div class="container mt-5 carousel__text__slide">
                        <h2 class="text-center">Journées Fête des Mères</h2>
                        <h3 class="text-center">Laissez-vous tenter par une cure ou un soin dans notre centre</h3>
                    </div>
                    <a href="#carousel__slide4"
                    class="carousel__prev">Go to last slide</a>
                    <a href="#carousel__slide2"
                    class="carousel__next">Go to next slide</a>
                </div>
            </div>
            <a href="#carousel__slide2"
                class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide4"
                class="carousel__next">Go to next slide</a>
            </li>
            <li id="carousel__slide4"
                tabindex="0"
                class="carousel__slide">
            <div class="carousel__snapper">
                <div class="container mt-5 carousel__text__slide">
                    <h2 class="text-center">Soins mains et pieds</h2>
                    <h3 class="text-center">Découvrez nos nouvelles prestations</h3>
                </div>
            </div>
            <a href="#carousel__slide3"
                class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide1"
                class="carousel__next">Go to first slide</a>
            </li>
        </ol>
        <aside class="carousel__navigation">
            <ol class="carousel__navigation-list">
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide1"
                    class="carousel__navigation-button">Go to slide 1</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide2"
                    class="carousel__navigation-button">Go to slide 2</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide3"
                    class="carousel__navigation-button">Go to slide 3</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide4"
                    class="carousel__navigation-button">Go to slide 4</a>
                </li>
            </ol>
        </aside>
    </section> -->
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
</div>
</html>
