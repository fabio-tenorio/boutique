<?php

Namespace App\Application\Controllers;
Use App\Application\Controller;
Use App\Application\Models\ModelProduits;
Use App;

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

    public function allProduits() {
        return $this->produit->get_all_produits();
    }

    public function verifierStock($produits) {
        $stock = $this->allPRoduits();
        $checkStock = true;
        foreach($produits as $key=>$produit) {
            foreach($stock as $produitDispo) {
                if ($key == $produitDispo->id) {
                    if ($produitDispo->stock - $produit < 0) {
                        $this->message = "Désolé. On n'est dispose pas de cette quantité de produits";
                        $checkStock = false;
                    } else {
                        $checkStock = true;
                    }
                }
            }
        }
        if ($checkStock === true) {
            return true;
        } else {
            return false;
        }
    }

    public function calculerSousTotal ($prix, $fois) {
        return $this->produitTotal = $prix * $fois;
    }

    public function panier () {
        if (isset($_POST['updatepanier']) and isset($_SESSION['panier'])) {
            $panier = $_POST;
            unset($panier['updatepanier']);
            if ($this->verifierStock($panier) === true) {
                $this->panierTotal = array();
                foreach($_SESSION['panier'] as $produit) {
                    foreach($panier as $produitId => $quantite) {
                        if ($produit->id == $produitId) {
                            $produit->quantite = $quantite;
                            $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $quantite);
                        }
                    }
                }
                $this->total = array_sum($this->panierTotal);
                $this->render('panier');
            } else {
                $panier = $_SESSION['panier'];
                $this->panierTotal = array();
                foreach($panier as $produit) {
                    $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
                }
                $this->total = array_sum($this->panierTotal);
                $this->render('panier');
            }
        } elseif (!isset($_POST['updatepanier']) and isset($_SESSION['panier'])) {
            $panier = $_SESSION['panier'];
            $this->panierTotal = array();
            foreach($panier as $produit) {
                $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
            }
            $this->total = array_sum($this->panierTotal);
            $this->render('panier');
        } else {
            $_SESSION['panier'] = array ();
            $this->panierTotal = array ();
            $this->total = 0;
            $this->render('panier');
        }
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
                $_SESSION['nombreDeProduits']--;
            }
        }
        $this->panier();
    }

    public function viderPanier() {
        if (isset($_SESSION['panier'])) {
            unset($_SESSION['panier']);
            unset($_SESSION['nombreDeProduits']);
        }
        $this->render('produits');
    }

    public function commande() {    
        if (isset($_SESSION['panier'])) {
            $panier = $_SESSION['panier'];
            $this->panierTotal = array();
            foreach($panier as $produit) {
                $this->panierTotal[$produit->id] = $this->calculerSousTotal($produit->prix, $produit->quantite);
            }
            $this->total = array_sum($this->panierTotal);
            $this->render('commandevalider');
        } else {
            $_SESSION['panier'] = array ();
            $this->panierTotal = array ();
            $this->total = 0;
            $this->render('commandevalider');
        }
        if (isset($_SESSION['user'])) {
            var_dump($_SESSION['user']);
        } else {
            $this->client = array();
            var_dump($this->client);
        }
    }

    public function stripe() {
        // define ('STRIPE', str_replace("/boutique/Application/Controllers/ControllerProduits.php", "/boutique/vendor/autoload.php", __NAMESPACE__));
        require './vendor/autoload.php';
        // var_dump(require './vendor/autoload.php');
        \Stripe\Stripe::setApiKey('sk_test_51If0n8GAVfFRDcyqyt7RWuzbgilod4eaJWk85bXVg8xTv1nu4XqTB0qgcfdtuINm84D5Jox1VsGdhhQe2D6XcOJu005WXivVx0');
        $this->data = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        $token = $this->data['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => 999,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token,
        ]);
        $this->charge = $charge;
        if ($this->charge->outcome->seller_message == "Payment complete.") {
            $this->message = '<h1 class="text-center">Paiement confirmé</h1><h2 class="text-center">Merci de votre visite!</h2>';
            $this->render('commandeconfirmation');
        } else {
            $this->message = '<h1 class="my-5 text-center">Paiement réfusé</h1><h2 class="my-5 text-center">Désolé. Un problème est survenu lors de la procedure de paiement.</h2>';
            $this->render('commandeconfirmation');
        }
    }

    public function produits()
    {
        $this->render('produits');
    }

    public function prestations() {
        $this->render('prestations');
    }

    public function produitfiche($id) {
        $this->ficheproduit = $this->produit->get_one_produit($id);
        $this->render('produitfiche');
    }
}
?>