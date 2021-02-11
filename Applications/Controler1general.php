<?php

/*

UN CONTROLER GÉNÉRAL QUI PERMET L'ACCÈS À DES DONNÉES DIFFÉRENTES

EXCLUSIVEMENT DU PHP. Récupère les fichiers models. 
C'est ici que sont paramétrées des classes et les différentes fonctions avec 
les CONDITIONS pour le contrôle des droits et accès

Gestion de certaines erreurs

Récupérer les titres et l'accès aux pages

Déterminer les différents controlers :

1 controler users
1 controler accueil ou main 
1 controler agenda
1 controler blog
1 controler boutique (voir si nécessité de sous-controlers)
1 controler produits
   
*/

class Test {
    public function index()
    {
        echo 'Hello';
    }
}

?>
