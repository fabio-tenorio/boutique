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
        if (isset($_SESSION['user']))
        {
            $this->id = $_SESSION['user']->id;
            $this->login = $_SESSION['user']->login;
            $this->message = '';
        }
    }

    // function verif_panier($ref_article)
    // {
    //     /* On initialise la variable de retour */
    //     $present = false;
    //     /* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */
    //     if( count($_SESSION['panier']['id_article']) > 0 && array_search($ref_article,$_SESSION['panier']['id_article']) !== false)
    //     {
    //         $present = true;
    //     }
    //     return $present;
    // } 

    public function allProduits() {
        return $this->produit->get_all_produits();
    }

    public function calculerSousTotal ($prix, $fois) {
        return $this->produitTotal = $prix * $fois;
    }

    public function calculerTotal () {
        // $this->panierTotal = array();
        // récuperer la quantité du produit en $_POST
        $quantiteProduits = $_POST;
        unset($quantiteProduits['updatepanier']);
        var_dump($quantiteProduits);
        foreach($_SESSION['panier'] as $produit) {
            foreach($quantiteProduits as $produitId => $quantite) {
                if ($produit->id == $produitId) {
                    $produit->quantite = $quantite;
                    $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $quantite);
                }
            }
        }
        $this->total = array_sum($this->panierTotal);
        return $this->render('panier', $this->total);
        // récuperer le prix du produit en $_SESSION['panier']
        // appeler la méthode qui calcule quantite * prix
        // retourner le résultat
        // calculer qte du produit * prix du produit
        //
        // faire l'addition de tous les résultats obtenus
        // returner la somme comme $this->panierTotal;
        
        // // var_dump($panierId);
        // foreach($_SESSION['panier'] as $produit) {
        //     var_dump($produit->prix);
        // }
        // $this->nombreDeProduits = sizeof($_SESSION['panier']);
        // foreach($_POST as $value) {
        //     echo $value;
        // }
    }

    public function ajouterAuPanier($id) {
        $this->listeDesProduits = $this->produit->get_all_produits();
        foreach ($this->listeDesProduits as $produit) {
            if ($id == $produit->id) {
                $produit->quantite = 1;
                $_SESSION['panier'][$produit->id] = $produit++;
            }
        }
        $this->nombreDeProduits = sizeof($_SESSION['panier']);
        $_SESSION['nombreDeProduits'] = $this->nombreDeProduits;
        $this->render('produits');
    }

    public function supprimerDuPanier($id) {
        foreach($_SESSION['panier'] as $produit) {
            if ($produit->id == $id) {
                unset($_SESSION['panier'][$id]);
            }
        }
        $this->render('panier');
    }

    public function viderPanier() {
        if (isset($_SESSION['panier']) && $_SESSION['panier'] > 0) {
            unset($_SESSION['panier']);
        }
        $this->nombreDeProduits = 0;
        $this->render('produits');
    }

    public function panier() {
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