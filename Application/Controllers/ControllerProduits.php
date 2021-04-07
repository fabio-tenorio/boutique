<?php

/*
*/

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelProduits;

class ControllerProduits extends Controller 
{

    private $id;
    private $id_droit;
    protected $prenom;
    protected $nom;
    protected $motpasse;
    protected $mail;
    protected $login;
    protected $telephone;
    protected $dateanniversaire;
    // il n'y a pas de colonne $adresse dans la table utilisateur;

    public function __construct()
    {
        $this->produit = new ModelProduits;
        // $this->user = new ModelProduits;
        if (isset($_SESSION['user']))
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
            $this->message = '';
        }
    }

    public function allProduits() {
        return $this->produit->get_all_produits();
    }

    // public function index()
    // {
    //     //je vérifie si il y a quelqun connecté
    //     if (isset($_SESSION['user']))
    //     {
    //         $this->render('accueil', $_SESSION['user']);
    //     }
    //     else
    //     {
    //         $this->render('accueil');
    //     }
    // }




    public function index()
    {
        //je vérifie si il y a quelqun connecté
        if (isset($_SESSION['user']))
        {
            $this->render('produits', $_SESSION['user']);
        }
        else
        {
            $this->render('produits');
        }
    }

    public function prestations() {
        $this->render('prestations');
    }

    public function produitfiche() {
        $this->render('produitfiche');
    }
}

?>