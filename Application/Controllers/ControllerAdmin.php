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
Use App\Application\Models\ModelProduit;
use App\Application\Models\ModelUser;

class ControllerAdmin extends ControllerUser 
{
    private $id;
    private $id_droit;

    public function __construct()
    {
        $this->admin = new ModelUser();
        if(isset($_SESSION['user']->login) AND $_SESSION['user']->id_droit == 200 )
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
            $this->id_droit = $_SESSION['user']->id_droit;
            $this->message = '';
        }
    }
    
    public function admin_users()
    {
        return $this->admin->get_all_users();
    }


    public function index()
    {
        if(isset($_SESSION['user']->login) AND $_SESSION['user']->id_droit == 200 )
        {
            $this->data=[];
            $this->data[] = $_SESSION ['user'];
            $this->data[] = $this->admin_users();
            $this->render('administrateur', $this->data);
        }
        else
        {
            $this->render('accueil');
        }
    }

    

}        
    
