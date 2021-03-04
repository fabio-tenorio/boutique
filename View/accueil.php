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
    <section id="section1">
        <div id="bg-section1">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos vero voluptatibus modi possimus. Porro quas sunt, corrupti ratione praesentium exercitationem impedit repudiandae temporibus beatae reprehenderit eaque nam vero molestiae possimus.</p>
        </div>        
    </section>
    <section id="section_prestations">
        <h2 class="h2 section_title">nos prestations</h2>
        <div class="row">
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>prestation1.jpeg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Beauté des mains</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>prestation2.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Beauté des pieds</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>prestation3.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis semi-permanent ou classique</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card produit-box">
                    <img class="card-img-top" src="<?php echo IMAGES; ?>prestation4.jpg" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Massage des pieds</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>19,90 &#8364;</p>
                        <a href="#" class="btn btn-primary">détails</a>
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
                        <a href="#" class="btn btn-primary">détails</a>
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
                        <a href="#" class="btn btn-primary">détails</a>
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
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section_blog">
        <h2 class="h2">le blog de Sonia</h2>
        <div>

        </div>
        <div>

        </div>
    </section>
</div>
</html>
