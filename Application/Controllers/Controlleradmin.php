<?php

/* 
Permet l'accès à un page administration sur la page accueil
Gère les droits users
Permet l'accès aux pages admin et donc aux fonctions admin (supprimer un user, supprimer un message, mofifier des droits, )
Historique du panier
Accès aux infos du users (profil, panier, commande...)
Création du discussion sur blog
Nouvel article dans boutique

"Créer un Évenement dans agenda sur plusieurs heures ou jours"

*/

Namespace App\Application\Controllers;
Use App\Application\Controller;

class ControllerAdmin extends Controller {

    public function test()
    {
        echo "Je suis le fils de ".$this->index();
    }
}

?>