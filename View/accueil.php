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

<body>
    <section id="section1">
        <div id="bg-section1">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos vero voluptatibus modi possimus. Porro quas sunt, corrupti ratione praesentium exercitationem impedit repudiandae temporibus beatae reprehenderit eaque nam vero molestiae possimus.</p>
        </div>        
    </section>
    <section id="section2">
        <h2 class="h2">Nos produits</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="images/produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>&#8364; 19,90</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="images/produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>&#8364; 19,90</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card produit-box">
                    <img class="card-img-top" src="images/produit-vernis.png" alt="image du produit">
                    <div class="card-body">
                        <h5 class="card-title">Vernis rouge</h5>
                        <p class="card-text">description du produit</p>
                        <p>&#8364; 19,90</p>
                        <a href="#" class="btn btn-primary">détails</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section3">
        <h2 class="h2">pour les pro</h2>
    </section>
    <section id="section4">
        <h2 class="h2">le blog</h2>
        <div>

        </div>
        <div>

        </div>
    </section>
</body>
</html>
