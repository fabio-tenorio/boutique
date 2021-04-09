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
    protected $nombreDeProduits;
    // il n'y a pas de colonne $adresse dans la table utilisateur;

    public function __construct()
    {
        $this->produit = new ModelProduits;
        // $this->user = new ModelProduits;
        // $_SESSION['panier'] = $this->panier;
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

    // public function setNombreDeProduits($nombreDeProduits) {
    //     $this->listeDesProduits = $this->produit->get_all_produits();

    // }

    public function calculerQuantiteProduit($id_produits) {
        // foreach($_POST
        // $id_produits = $_POST;
    }

    public function calculerProduitTotal ($prix, $fois) {
        return $this->produitTotal = $prix * $fois;
    }

    public function calculerSousTotal () {
        foreach($_POST as $produitId => $prix) {
            $produitId = explode('-', $produitId);
            var_dump($produitId);
        }
        // var_dump($panierId);
        foreach($_SESSION['panier'] as $produit) {
            var_dump($_POST);
            var_dump($produit->prix);
        }
        
        var_dump($_POST);
        $this->nombreDeProduits = sizeof($_SESSION['panier']);
        foreach($_POST as $value) {
            echo $value;
        }
    }

    public function ajouterAuPanier($id) {
        $this->listeDesProduits = $this->produit->get_all_produits();
        foreach ($this->listeDesProduits as $produit) {
            if ($id == $produit->id) {
                $_SESSION['panier'][] = $produit++;
            }
        }
        $this->nombreDeProduits = sizeof($_SESSION['panier']);
        $_SESSION['nombreDeProduits'] = $this->nombreDeProduits;
        $this->render('produits');
    }

    public function viderPanier() {
        if (isset($_SESSION['panier']) && $_SESSION['panier'] > 0) {
            unset($_SESSION['panier']);
        }
        $this->nombreDeProduits = 0;
        $this->render('produits');
    }

    public function panier() {
        var_dump($_SESSION['panier']);
        $this->render('panier');
    }

    public function commande() {
        $this->render('commandevalider');
    }

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