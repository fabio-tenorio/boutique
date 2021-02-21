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
    <section id="bgsection1">

    </section>
    <section id="section2">
        <div>
            <h2>titre du produit</h2>
            <img src="#" alt="image du produit">
            <p>description du produit</p>
            <p>prix du produit</p>
            <a href="#">liens vers la page du produit</a>
        </div>
        <div>
            <h2>titre du produit</h2>
            <img src="#" alt="image du produit">
            <p>description du produit</p>
            <p>prix du produit</p>
            <a href="#">liens vers la page du produit</a>
        </div>
        <div>
            <h2>titre du produit</h2>
            <img src="#" alt="image du produit">
            <p>description du produit</p>
            <p>prix du produit</p>
            <a href="#">liens vers la page du produit</a>
        </div>
    </section>
</body>
</html>
