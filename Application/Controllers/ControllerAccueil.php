<?php

/*
controller qui affiche par défault la page d'accueil
vérifie si il y a quelqun connecté
(c'est-à-dire, vérifie si il y a une session_start() initialisée et si il y a un objet affecté à $_SESSION)
si oui, il affiche la view (header) de l'accueil avec les données de la personne connectée
si non, il affiche la page d'accueil (header) par défault
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\View;

class ControllerAccueil extends Controller {

    

    public function select_user()
    {
        
    }
}

/* 
*/

?>